<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 Claus Due <claus@wildside.dk>, Wildside A/S
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
 * Class that renders a Page template selection field.
 *
 * @package	TYPO3
 * @subpackage	fed
 */
class Tx_Fed_Backend_PageLayoutSelector {

	/**
	 * @var Tx_Fed_Configuration_ConfigurationManager
	 */
	protected $configurationManager;

	/**
	 * @var array
	 */
	protected $recognizedFormats = array('html', 'xml', 'txt', 'json', 'js', 'css');

	/**
	 * @var Tx_Fed_Service_Page
	 */
	protected $pageService;

	/**
	 * CONSTRUCTOR
	 */
	public function __construct() {
		$objectManager = t3lib_div::makeInstance('Tx_Extbase_Object_ObjectManager');
		$this->configurationManager = $objectManager->get('Tx_Fed_Configuration_ConfigurationManager');
		$this->pageService = $objectManager->get('Tx_Fed_Service_Page');
	}

	/**
	 * Renders a Fluid Page Layout file selector
	 *
	 * @param array $parameters
	 * @param mixed $pObj
	 * @return string
	 */
	public function renderField(&$parameters, &$pObj) {
		$name = $parameters['itemFormElName'];
		$value = $parameters['itemFormElValue'];
		$availableTemplates = $this->configurationManager->getAvailablePageTemplateFiles();
		if (strpos($name, 'tx_fed_controller_action_sub') === FALSE) {
			$onChange = 'onchange="if (confirm(TBE_EDITOR.labels.onChangeAlert) && TBE_EDITOR.checkSubmit(-1)){ TBE_EDITOR.submitForm() };"';
		}
		if ($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['fed']['setup']['enableFallbackFluidPageTemplate'] && empty($value) === TRUE) {
			$fallbackTemplatePathAndFilename = $this->pageService->getFallbackPageTemplatePathAndFilename();
			#die($fallbackTemplatePathAndFilename);
			if (strpos($fallbackTemplatePathAndFilename, '->')) {
				list ($extensionName, $templateFileBase) = explode('->', $fallbackTemplatePathAndFilename);
				$fallbackTemplateIdentifier = trim($fallbackTemplatePathAndFilename, '.html');
			} else {
				$extensionName = NULL;
				$fallbackTemplateIdentifier = $fallbackTemplatePathAndFilename;
			}
			$value = $fallbackTemplateIdentifier;
			$emptyLabel = $this->configurationManager->getPageTemplateLabel($extensionName, $fallbackTemplateIdentifier);
		}
		$selector = '<select name="' . $name . '" class="formField select" ' . $onChange . '>' . LF;
		$selector .= '<option value="">' . $emptyLabel . '</option>' . LF;
		foreach ($availableTemplates as $extension=>$group) {
			if (!t3lib_extMgm::isLoaded($extension)) {
				$groupTitle = ucfirst($extension);
			} else {
				$emConfigFile = t3lib_extMgm::extPath($extension, 'ext_emconf.php');
				require $emConfigFile;
				$groupTitle = $EM_CONF['']['title'];
			}
			$selector .= '<optgroup label="' . $groupTitle . '">' . LF;
			foreach ($group as $template) {
				$optionValue = $extension . '->' . $template;
				$label = $this->configurationManager->getPageTemplateLabel($extension, $template);
				$selected = ($optionValue == $value ? ' selected="formField selected"' : '');
				$option = '<option value="' . $optionValue . '"' . $selected . '>' . $label . '</option>';
				$selector .= $option . LF;
			}
			$selector .= '</optgroup>' . LF;
		}
		$selector .= '</select>' . LF;
		return $selector;
	}

}

?>