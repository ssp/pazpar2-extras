<?php

if (!defined ('TYPO3_MODE')) die ('Access denied.');

/**
 * Registers a Plugin to be listed in the Backend. You also have to configure the Dispatcher in ext_localconf.php.
 */
Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,// The extension name (in UpperCamelCase) or the extension key (in lower_underscore)
	'Pi1',				// A unique name of the plugin in UpperCamelCase
	'pazpar2'	// A title shown in the backend dropdown field
);

?>

