<?php/*************************************************************** * Copyright notice * * Based on t3mootools from Peter Klein <peter@umloud.dk> * (c) 2007-2010 Juergen Furrer (juergen.furrer@gmail.com) * All rights reserved * * This script is part of the TYPO3 project. The TYPO3 project is * free software; you can redistribute it and/or modify * it under the terms of the GNU General Public License as published by * the Free Software Foundation; either version 2 of the License, or * (at your option) any later version. * * The GNU General Public License can be found at * http://www.gnu.org/copyleft/gpl.html. * A copy is found in the textfile GPL.txt and important notices to the license * from the author is found in LICENSE.txt distributed with these scripts. * * * This script is distributed in the hope that it will be useful, * but WITHOUT ANY WARRANTY; without even the implied warranty of * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the * GNU General Public License for more details. * * This copyright notice MUST APPEAR in all copies of the script! ***************************************************************/$confArr = tx_t3jquery::getConf();define('T3JQUERYVERSION', $confArr['jQueryVersion']."-".$confArr['jQueryUiVersion'].($confArr['jQueryTOOLSVersion'] ? "-".$confArr['jQueryTOOLSVersion'] : ""));if (file_exists(PATH_site . tx_t3jquery::getJqPath() . "jquery-".T3JQUERYVERSION.".js")) {	// check if dontIntegrateOnUID fit to the actual page	if (! $confArr['dontIntegrateOnUID'] || ! is_object($GLOBALS['TSFE']) || ! in_array($GLOBALS['TSFE']->id, array_values(t3lib_div::trimExplode(',', $confArr['dontIntegrateOnUID'], true)))) {		define('T3JQUERY', true);	}}/** * jQuery Javascript Loader functions * * You are encouraged to use this library in your own scripts! * * USE: * The class is intended to be used without creating an instance of it. * So: Don't instantiate - call functions with "tx_t3jquery::" prefixed the function name. * So use tx_t3jquery::[method-name] to refer to the functions, eg. 'tx_t3jquery::addJqJS()' * * Example: * * if (t3lib_extMgm::isLoaded('t3jquery')) { *   require_once(t3lib_extMgm::extPath('t3jquery').'class.tx_t3jquery.php'); * } * * * if (T3JQUERY === true) { *   tx_t3jquery::addJqJS(); * } else { *   // Here you add your own version of jQuery library, which is used if the *   // "t3jquery" extension is not installed. *   $GLOBALS['TSFE']->additionalHeaderData[] = .. * } * * @author Juergen Furrer (juergen.furrer@gmail.com) * @package TYPO3 * @subpackage t3jquery */class tx_t3jquery{	/**	 * @var object	 */	var $cObj;	/**	 * Adds the jquery script tag to the page headers first place	 * For frontend usage only.	 * @return	void	 */	function addJqJS()	{		if (t3lib_div::int_from_ver(TYPO3_version) >= 4003000) {			$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_pagerenderer.php']['render-preProcess']['t3jquery'] = "EXT:t3jquery/class.tx_t3jquery.php:&tx_t3jquery->addJqJsByHook";		} else {			// Override the headerdata, THX to S. Delcroix (RVVN -  sdelcroix@rvvn.org)			$GLOBALS['TSFE']->additionalHeaderData['t3jquery.lib'] = tx_t3jquery::getJqJS();		}	}	/**	 * Hook function for adding script	 *	 * @param	array	Params for hook	 * @return	void	 */	function addJqJsByHook($params)	{		$confArr = tx_t3jquery::getConf();		if (! $confArr['dontIntegrateOnUID'] || ! is_object($GLOBALS['TSFE']) || ! in_array($GLOBALS['TSFE']->id, array_values(t3lib_div::trimExplode(',', $confArr['dontIntegrateOnUID'], true)))) {			$params['jsLibs']['jQuery'] = array(				'file'        => tx_t3jquery::getJqJS(true),				'type'        => 'text/javascript',				'section'     => 1,				'compress'    => false,				'forceOnTop'  => true,				'allWrap'     => ''			);			define('T3JQUERY', true);		} else {			t3lib_div::devLog("PID '{$GLOBALS['TSFE']->id}' in dontIntegrateOnUID", 't3jquery', 1);			define('T3JQUERY', false);		}	}	/**	 * Returns the path configuration and JS	 * @return string	 */	function getJqPath()	{		$confArr = tx_t3jquery::getConf();		$configDir = $confArr['configDir'] . (preg_match("/\/$/", $confArr['configDir']) ? "" : "/");		return $configDir;	}	/**	 * Get the jQuery UI script tag.	 * For frontend usage only.	 * @param	boolean		If true, only the URL is returned, not a full script tag	 * @return	string		HTML Script tag to load the jQuery JavaScript library	 */	function getJqJS($urlOnly = false)	{		$url = tx_t3jquery::getJqPath() . "jquery-".T3JQUERYVERSION.".js";		if (file_exists(PATH_site . $url)) {			return $urlOnly ? $url : '<script type="text/javascript" src="'.$url.'"></script>';		} else {			t3lib_div::devLog("'jquery-".T3JQUERYVERSION.".js' does not exists!", 't3jquery', 3);		}		return false;	}	/**	 * Get the jquery script tag.	 * For backend usage only.	 * @param	boolean		If true, only the URL is returned, not a full script tag	 * @return	string		HTML Script tag to load the jQuery JavaScript library	 */	function getJqJSBE($urlOnly = false)	{		$file = tx_t3jquery::getJqPath() . "jquery-".T3JQUERYVERSION.".js";		if (file_exists(PATH_site . $file)) {			$url = t3lib_div::resolveBackPath($GLOBALS['BACK_PATH'] . "../" . $file);			return $urlOnly ? $url : '<script type="text/javascript" src="' . $url . '"></script>';		} else {			t3lib_div::devLog("'jquery-" . T3JQUERYVERSION . ".js' does not exists!", 't3jquery', 3);		}		return false;	}	/**	 * Get the configuration of t3jquery	 * @return array	 */	function getConf()	{		return unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['t3jquery']);	}	/**	 * Function to be used from TypoScript to add Javascript after the jquery.js	 *	 * This is a small wrapper for adding javascripts script after the jQuery Library.	 * This is needed in some situations because headerdata added with "page.headerData"	 * is placed BEFORE the headerdata which is added using PHP.	 *	 * Usage:	 *	 * includeLibs.t3jquery = EXT:t3jquery/class.tx_t3jquery.php	 * page.10 = USER	 * page.10.userFunc = tx_t3jquery->addJS	 * page.10.jsfile = fileadmin/testscript.js	 * page.10.jsurl = https://ssl.google-analytics.com/urchin.js	 * page.10.jsdata = alert('Hello World!');	 * page.10.forceOnTop = 0	 * page.10.compress = 0	 * page.10.type = text/javascript	 * page.10.allWrap = 	 * page.10.jsinline = 0	 * page.10.tofooter = 1	 * 	 * @param	string		$content: Content input, ignore (just put blank string)	 * @param	array		$conf: TypoScript configuration of the plugin!	 * @return	void	 */	function addJS($content, $conf)	{		// If the jQuery lib is not added to page yet, add it!		tx_t3jquery::addJqJS();		// where should be he data stored (footer or header) / Fix moveJsFromHeaderToFooter (add all scripts to the footer)		$conf['tofooter'] = ($conf['tofooter'] || $GLOBALS['TSFE']->config['config']['moveJsFromHeaderToFooter'] ? 'footer' : 'header');		$conf['compress'] = ($conf['compress'] || $conf['jsminify']);		$conf['type']     = $conf['type'] ? $conf['type'] : 'text/javascript';		// Append JS file		if ($conf['jsfile'] || $conf['jsfile.']) {			$jsfile = preg_replace('|^'.PATH_site.'|i','', t3lib_div::getFileAbsFileName($this->cObj->stdWrap($conf['jsfile'], $conf['jsfile.'])));			// Add the Javascript if file exists			if ($jsfile != '' && file_exists(PATH_site . $jsfile)) {				tx_t3jquery::addJsFile($jsfile, $conf);			} else {				t3lib_div::devLog("'{$jsfile}' does not exists!", 't3jquery', 2);			}		}		// add JS URL		if ($conf['jsurl'] || $conf['jsurl.']) {			tx_t3jquery::addJsFile($this->cObj->stdWrap($conf['jsurl'], $conf['jsurl.']), $conf);		}		// add JS data		if ($conf['jsdata'] || $conf['jsdata.']) {			$jsdata = trim($this->cObj->stdWrap($conf['jsdata'], $conf['jsdata.']));			if ($jsdata != '') {				tx_t3jquery::addJsInlineCode(md5($jsdata), $jsdata, $conf);			}		}		// add JS ready code		if ($conf['jsready'] || $conf['jsready.']) {			$jsready = trim($this->cObj->stdWrap($conf['jsready'], $conf['jsready.']));			if ($jsready != '') {				$temp_js = "jQuery(document).ready(function() {" . $jsready . "});";				tx_t3jquery::addJsInlineCode(md5($jsready), $temp_js, $conf);			}		}	}	/**	 * Add JS-File to the HTML	 * 	 * @param string $file	 * @param boolean $conf	 * @return void	 */	function addJsFile($file, $conf=array())	{		if (t3lib_div::int_from_ver(TYPO3_version) >= 4003000) {			$pagerender = $GLOBALS['TSFE']->getPageRenderer();			if ($conf['tofooter'] == 'footer') {				$pagerender->addJsFooterFile($file, $conf['type'], $conf['compress'], $conf['forceOnTop'], $conf['allWrap']);			} else {				$pagerender->addJsFile($file, $conf['type'], $conf['compress'], $conf['forceOnTop'], $conf['allWrap']);			}		} else {			$temp_file = '<script type="text/javascript" src="'.$file.'"></script>';			if ($conf['tofooter'] == 'footer') {				$GLOBALS['TSFE']->additionalFooterData['t3jquery.jsfile.' . $file] = $temp_file;			} else {				$GLOBALS['TSFE']->additionalHeaderData['t3jquery.jsfile.' . $file] = $temp_file;			}		}	}	/**	 * Add inline code to the HTML	 * 	 * @param string $name	 * @param string $block	 * @param boolean $conf	 * @return void	 */	function addJsInlineCode($name, $block, $conf=array())	{		if ($conf['jsinline']) {			$GLOBALS['TSFE']->inlineJS['t3jquery.jsdata.' . $name] = $block;		} elseif (t3lib_div::int_from_ver(TYPO3_version) >= 4003000) {			$pagerender = $GLOBALS['TSFE']->getPageRenderer();			if ($conf['tofooter'] == 'footer') {				$pagerender->addJsFooterInlineCode($name, $block, $conf['compress'], $conf['forceOnTop']);			} else {				$pagerender->addJsInlineCode($name, $block, $conf['compress'], $conf['forceOnTop']);			}		} else {			if ($conf['compress']) {				$block = t3lib_div::minifyJavaScript($block);			}			if ($conf['tofooter'] == 'footer') {				$GLOBALS['TSFE']->additionalFooterData['t3jquery.jsdata.' . $name] = t3lib_div::wrapJS($block, true);			} else {				$GLOBALS['TSFE']->additionalHeaderData['t3jquery.jsdata.' . $name] = t3lib_div::wrapJS($block, true);			}		}	}}if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3jquery/class.tx_t3jquery.php']) {	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3jquery/class.tx_t3jquery.php']);}?>