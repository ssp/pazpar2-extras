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
 * Page Content Service
 *
 * Service to interact with content elements - primarily FED's FCE content.
 *
 * @package Fed
 * @subpackage Service
 * @version
 */
class Tx_Fed_Service_Content implements t3lib_Singleton {

	/**
	 * Get an array of child element records from a parent FCE
	 *
	 * @param integer $id
	 * @return array
	 * @api
	 */
	public function getChildContentElementUids($id) {
		$rows = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('uid,tx_fed_fcecontentarea', 'tt_content', "tx_fed_fcecontentarea LIKE '%:" . $id . "'");
		return (array) $rows;
	}

	/**
	 * Gets a value for the field tx_fed_fcecontentarea based on $record and $id
	 *
	 * @param array $record
	 * @param integer $id
	 * @return string
	 * @api
	 */
	public function getFlexibleContentElementArea($record, $id=NULL) {
		$url = t3lib_div::_GET('returnUrl');
		$urlHashCutoffPoint = strrpos($url, '#');
		if ($urlHashCutoffPoint > 0) {
			$area = substr($url, 1 - (strlen($url)-$urlHashCutoffPoint));
		} else if ($record['pid'] < 0) {
			$afterContentElementUid = abs($record['pid']);
			$afterRecord = $GLOBALS['TYPO3_DB']->exec_SELECTgetSingleRow('pid,tx_fed_fcecontentarea', 'tt_content', "uid = '" . $afterContentElementUid . "'");
			$area = $afterRecord['tx_fed_fcecontentarea'];
		} else if ($id > 0) {
			if ($record['tx_fed_fcecontentarea']) {
				$area = $record['tx_fed_fcecontentarea'];
			} else if ($id !== 'NEW') {
					// we need the field's contents from DB since it is not provided in $record
				$existingRecord = $GLOBALS['TYPO3_DB']->exec_SELECTgetSingleRow('pid,tx_fed_fcecontentarea', 'tt_content', "uid = '" . $id . "'");
				$area = $existingRecord['tx_fed_fcecontentarea'];
			}
		}
		return $area;
	}

}

?>