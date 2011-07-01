<?php

########################################################################
# Extension Manager/Repository config file for ext "pagenotfoundhandling".
#
# Auto generated 30-06-2011 17:46
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => '404 Page not found handling',
	'description' => 'Highly configurable 404 page handling. Supports multi domain systems with multiple languages.',
	'category' => 'fe',
	'shy' => 0,
	'version' => '0.2.1',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'beta',
	'uploadfolder' => 1,
	'createDirs' => '',
	'modify_tables' => 'sys_domain',
	'clearcacheonload' => 1,
	'lockType' => '',
	'author' => 'Christian Futterlieb',
	'author_email' => 'development@agenturamwasser.ch',
	'author_company' => 'Agentur am Wasser | Maeder & Partner AG',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:13:{s:9:"ChangeLog";s:4:"24c5";s:10:"README.txt";s:4:"42ba";s:33:"class.tx_pagenotfoundhandling.php";s:4:"7749";s:48:"class.tx_pagenotfoundhandling_LanguageSelect.php";s:4:"e6a0";s:21:"ext_conf_template.txt";s:4:"dd0e";s:12:"ext_icon.gif";s:4:"9d5d";s:17:"ext_localconf.php";s:4:"da82";s:14:"ext_tables.php";s:4:"cc94";s:14:"ext_tables.sql";s:4:"1448";s:17:"locallang_404.xml";s:4:"fd81";s:16:"locallang_db.xml";s:4:"601d";s:14:"doc/manual.sxw";s:4:"c0e7";s:24:"res/defaultTemplate.tmpl";s:4:"c28a";}',
);

?>