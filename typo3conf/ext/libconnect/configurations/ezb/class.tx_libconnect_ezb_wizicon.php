<?php

class tx_libconnect_ezb_wizicon {

	function proc($wizardItems)	{
		global $LANG;


		$wizardItems['plugins_tx_libconnect_ezb'] = array(
			'icon'=>t3lib_extMgm::extRelPath('libconnect').'icons/wiz_icon.gif',
			'title'=> 'Plugin EZB',
			'description'=> 'Plugin zur Einbindung von EZB',
			'params'=>'&defVals[tt_content][CType]=list&defVals[tt_content][list_type]=libconnect_ezb'
		);

		return $wizardItems;
	}

}


if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/libconnect/configurations/ezb/class.tx_libconnect_ezb_wizicon.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/libconnect/configurations/ezb/class.tx_libconnect_ezb_wizicon.php']);
}

?>