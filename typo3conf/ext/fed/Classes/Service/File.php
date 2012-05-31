<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2010 Claus Due <claus@wildside.dk>, Wildside A/S
*
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * File service
 *
 * Upload, move, copy etc. files. File operations are considered
 * critical, which means that failure results in an Exception. Use try/catch to
 * detect the particular type of error if you want to report it as a FlashMessage.
 *
 * @author Claus Due, Wildside A/S
 * @package Fed
 * @subpackage Service
 */
class Tx_Fed_Service_File implements t3lib_Singleton {

	/**
	 * @var Tx_Extbase_Object_ObjectManager
	 */
	protected $objectManager;

	/**
	 * @var Tx_Fed_Utility_DomainObjectInfo
	 */
	protected $infoService;

	/**
	 * @param Tx_Extbase_Object_ObjectManager $objectManager
	 */
	public function injectObjectManager(Tx_Extbase_Object_ObjectManager $objectManager) {
		$this->objectManager = $objectManager;
	}

	/**
	 * @param Tx_Fed_Utility_DomainObjectInfo $infoService
	 */
	public function injectInfoService(Tx_Fed_Utility_DomainObjectInfo $infoService) {
		$this->infoService = $infoService;
	}

	/**
	 * Automatically upload files for $domainObject based on $propertyName. Uses
	 * uploadfolder from $domainObject if specified. Can be overridden with
	 * $basePath - which means files will be uploaded to that path AND THE FULL
	 * RELATIVE PATH IS SAVED to the $domainObject $propertyName.
	 * Returns TRUE on upload success.
	 * If you do not specify a particular $propertyName then the fields are taken
	 * from your DomainObject using the @file (className of resource type) annotation.
	 *
	 * See documentation for further instructions on integrating files.
	 *
	 * @param Tx_Extbase_DomainObject_DomainObjectInterface $domainObject
	 * @param string $propertyName
	 * @param string $basePath
	 * @throws Exception
	 * @return boolean
	 * @api
	 */
	public function autoUpload(Tx_Extbase_DomainObject_DomainObjectInterface &$domainObject, $propertyName=NULL, $basePath=NULL) {
		if ($propertyName === NULL) {
			$propertyNames = $this->infoService->getPropertiesByAnnotation($domainObject, 'file', TRUE, FALSE);
			foreach ($propertyNames as $propertyName) {
				if ($this->autoUpload($domainObject, $propertyName) === FALSE) {
					return FALSE;
				}
			}
			return TRUE;
		}
		$uploadFolder = $this->infoService->getUploadFolder($domainObject, $propertyName);
		$uploadedFileObjectStorage = $this->objectManager->get('Tx_Fed_Persistence_FileObjectStorage');
		$uploadedFileObjectStorage->setBasePath($uploadFolder);

		$objectType = array_pop($this->infoService->getAnnotationValuesByProperty($domainObject, $propertyName, 'file'));
		if (!$objectType) {
			$objectType = 'Tx_Fed_Resource_File';
		}
		$fileObjectStorage = $this->getUploadedFiles($domainObject, $propertyName, $objectType);

		foreach ($fileObjectStorage as $fileObject) {
			$source = $fileObject->getAbsolutePath();
			$destination = $uploadFolder . DIRECTORY_SEPARATOR . $fileObject->getTargetFilename();
			$newFilename = $this->move($source, $destination);
			$fileObject->setAbsolutePath(PATH_site . $newFilename);
			$uploadedFileObjectStorage->attach($fileObject);
		}

		$setter = 'set' . ucfirst($propertyName);
		$valueToSet = (string) $uploadedFileObjectStorage;
		$domainObject->$setter($valueToSet);
		return TRUE;
	}

	/**
	 * Gets files uploaded through field name $name
	 *
	 * @param Tx_Extbase_DomainObject_DomainObjectInterface $domainObject
	 * @param string $propertyName Index name of the files in $_FILES
	 * @return Tx_Fed_Persistence_FileObjectStorage
	 * @api
	 */
	public function getUploadedFiles(Tx_Extbase_DomainObject_DomainObjectInterface &$domainObject, $propertyName, $objectType=NULL) {
		if ($objectType === NULL) {
			$objectType = 'Tx_Fed_Resource_File';
		}
		$namespace = $this->infoService->getPluginNamespace($domainObject);
		$fileObjectStorage = $this->objectManager->get('Tx_Fed_Persistence_FileObjectStorage');
		$postFiles = $_FILES[$namespace]['tmp_name'][$propertyName];
		if (is_array($postFiles) === FALSE) {
			$filename = $postFiles;
			$targetFilename = $_FILES[$namespace]['name'][$propertyName];
			if($targetFilename && $targetFilename != '') {
				$object = $this->objectManager->get($objectType, $filename);
				$object->setTargetFilename($targetFilename);
				$fileObjectStorage->attach($object);
				return $fileObjectStorage;
			}
		}
		$numFiles = count($postFiles);
		for ($i=0; $i<$numFiles; $i++) {
			$filename = $_FILES[$namespace]['tmp_name'][$propertyName][$i];
			$targetFilename = $_FILES[$namespace]['name'][$propertyName][$i];
			if($targetFilename && $targetFilename != '') {
				if (is_file($filename)) {
					$object = $this->objectManager->get($objectType, $filename);
					$object->setTargetFilename($targetFilename);
					$fileObjectStorage->attach($object);
				}
			}
		}
		return $fileObjectStorage;
	}

	/**
	 * ALIAS OF "move()"
	 *
	 * Uploads a file from absolute path $uploadedFilename into $destinationPath,
	 * giving the file a proper unique name using TYPO3's file features. Returns
	 * the resulting path-stripped destination filename as string
	 * @param string $uploadedFilename
	 * @param string $destinationPath
	 * @throws Exception
	 * @return string
	 * @api
	 */
	public function upload($uploadedFilename, $destinationPath) {
		return $this->move($uploadedFilename, $destinationPath);
	}

	/**
	 * Moves $sourceFilename to $destinationFilename, returns boolean success/failure
	 *
	 * @param mixed $sourceFilename FileObjectStorage, File Resource or string filename
	 * @param string $destinationFilename Destination filename or path
	 * @throws Exception
	 * @return boolean
	 * @api
	 */
	public function move($sourceFilename, $destinationFilename) {
		$newFilename = $this->copy($sourceFilename, $destinationFilename);
		if ($newFilename) {
			$this->unlink($sourceFilename);
			return $newFilename;
		} else {
			throw new Exception('Could not move file ' . $sourceFilename . ' to ' . $destinationFilename, 1311895077);
			return FALSE;
		}
	}

	/**
	 * Copies $sourceFilename to $destinationFilename, returns new filename
	 *
	 * @param mixed $sourceFile FileObjectStorage, File Resource or string filename
	 * @param string $destinationFilename Destination filename or path
	 * @throws Tx_Extbase_Exception
	 * @return mixed
	 * @api
	 */
	public function copy($sourceFile, $destinationFilename) {
		$pathinfo = pathinfo($destinationFilename);
		if ($sourceFile instanceof Tx_Fed_Persistence_FileObjectStorage) {
			foreach ($sourceFile as $childFile) {
				$this->copy($childFile, $pathinfo['dirname']);
			}
		} else if ($sourceFile instanceof Tx_Fed_Resource_File) {
			$sourceFilename = $sourceFile->getAbsolutePath();
		} else {
			$sourceFilename = $sourceFile;
		}
		if (is_file($sourceFilename) === FALSE) {
			$sourceFilename = PATH_site . $sourceFilename;
		}
		$fileFunctions = $this->objectManager->get('t3lib_basicFileFunctions');
		$pathinfo = pathinfo($destinationFilename);
		$desiredFilename = $pathinfo['basename'] != '' ? $pathinfo['basename'] : basename($sourceFilename);
		$newFilename = $fileFunctions->getUniqueName($desiredFilename, $pathinfo['dirname']);
		$targetFile = $newFilename;
		$copied = copy($sourceFilename, $targetFile);
		if ($copied === FALSE) {
			throw new Exception('Could not copy file ' . $sourceFilename . ' to ' . $targetFile, 1311895454);
			return FALSE;
		}
		return $newFilename;
	}

	/**
	 * Deletes a file
	 *
	 * @param mixed $fileOrFileObjectStorage
	 * @throws Exception
	 * @return boolean
	 * @api
	 */
	public function unlink($fileOrFileObjectStorage) {
		if ($fileOrFileObjectStorage instanceof Tx_Fed_Persistence_FileObjectStorage) {
			foreach ($fileOrFileObjectStorage as $filename) {
				$this->unlink($filename->getAbsolutePath());
			}
			return TRUE;
		} else if ($fileOrFileObjectStorage instanceof Tx_Fed_Resource_File) {
			$this->unlink($fileOrFileObjectStorage->getAbsolutePath());
		} else if (is_file($fileOrFileObjectStorage) === FALSE) {
			$fileOrFileObjectStorage = PATH_site . $fileOrFileObjectStorage;
			$this->unlink($fileOrFileObjectStorage);
		} else {
			$unlinked = unlink($fileOrFileObjectStorage);
			if ($unlinked === FALSE) {
				throw new Exception('Could not delete file ' . $fileOrFileObjectStorage, 1311895247);
			}
			return $unlinked;
		}
	}

	/**
	 * @param string $sourceFilename
	 * @param string $targetDir
	 * @param string $filename The target filename to be written
	 * @param integer $chunk If doing chunked read/write uses append mode if $chunk > 0
	 * @return array
	 */
	public function getFileCopyPointers($sourceFileName, $targetDir, $filename, $chunk=0) {
		$in = fopen($sourceFileName, "rb");
		$out = fopen($targetDir . DIRECTORY_SEPARATOR . $filename, $chunk == 0 ? "wb" : "ab");
		if ($out === FALSE) {
			throw new Exception('Failed to open output stream', 102);
		} else if ($in === FALSE) {
			throw new Exception('Failed to open input stream', 101);
		}
		return array($in, $out);
	}

	/**
	 * @param type $sourceFileName
	 * @param type $targetDir
	 * @param type $filename
	 * @param type $chunk
	 */
	public function copyChunk($sourceFileName, $targetDir, $filename, $chunk) {
		list ($in, $out) = $this->getFileCopyPointers($sourceFileName, $targetDir, $filename, $chunk);
		while ($buff = fread($in, 4096)) {
			fwrite($out, $buff);
		}
		fclose($in);
		fclose($out);
	}

}

?>