<?php
$typo_db_extTableDef_script = 'extTables.php';

## INSTALL SCRIPT EDIT POINT TOKEN - all lines after this points may be changed by the install script!
$TYPO3_CONF_VARS['SYS']['sitename'] = 'Lib AAC';	//  Modified or inserted by TYPO3 Install Tool.
$TYPO3_CONF_VARS['SYS']['compat_version'] = '4.5';	// Modified or inserted by TYPO3 Install Tool.
$TYPO3_CONF_VARS['SYS']['displayErrors'] = 2;
$TYPO3_CONF_VARS['SYS']['devIPmask'] = '127.0.0.1,::1,134.76.162.165';
$TYPO3_CONF_VARS['SYS']['encryptionKey'] = 'eff43017a2a82314f23139d9daf0e129a20af589316ec80bd0084f268b67125e5a14a2b2a9e0527657b4059ebd41f44e';	// Modified or inserted by TYPO3 Install Tool.
$TYPO3_CONF_VARS['SYS']['enable_DLOG'] = '1';	//  Modified or inserted by TYPO3 Install Tool.
$TYPO3_CONF_VARS['SYS']['UTF8filesystem'] = '1';	//  Modified or inserted by TYPO3 Install Tool.
$TYPO3_CONF_VARS['SYS']['setDBinit'] = 'SET NAMES utf8;';	// Modified or inserted by TYPO3 Install Tool.

$typo_db_host = 'localhost';	//  Modified or inserted by TYPO3 Install Tool.
$typo_db = 'typo3';	//  Modified or inserted by TYPO3 Install Tool.
$typo_db_username = 'root';	//  Modified or inserted by TYPO3 Install Tool.
$typo_db_password = '';	//  Modified or inserted by TYPO3 Install Tool.

$TYPO3_CONF_VARS['BE']['installToolPassword'] = '7c68019aff42ab5929c42aea9a441bcd';	//  Modified or inserted by TYPO3 Install Tool.
$TYPO3_CONF_VARS['BE']['disable_exec_function'] = '0';	//  Modified or inserted by TYPO3 Install Tool.
$TYPO3_CONF_VARS['BE']['versionNumberInFilename'] = '0';	//  Modified or inserted by TYPO3 Install Tool.

$TYPO3_CONF_VARS['FE']['logfile_dir'] = '/var/log/typo3/';	//  Modified or inserted by TYPO3 Install Tool.
$TYPO3_CONF_VARS['FE']['addRootLineFields'].= ',tx_realurl_pathsegment';

$TYPO3_CONF_VARS['EXT']['extList'] = 'extbase,css_styled_content,version,tsconfig_help,context_help,extra_page_cm_options,impexp,sys_note,tstemplate,tstemplate_ceditor,tstemplate_info,tstemplate_objbrowser,tstemplate_analyzer,func_wizards,wizard_crpages,wizard_sortpages,lowlevel,install,belog,beuser,aboutmodules,setup,taskcenter,info_pagetsconfig,viewpage,rtehtmlarea,t3skin,reports,realurl,cag_linkchecker,static_info_tables,cshmanual,recycler,fluid,beko_debugster,scheduler,t3editor,devlog,pazpar2,t3jquery,ezbrequest,kickstarter,filelist,info,nkwgok,perm';	// Modified or inserted by TYPO3 Extension Manager. Modified or inserted by TYPO3 Core Update Manager. 
$TYPO3_CONF_VARS['EXT']['extList_FE'] = 'extbase,css_styled_content,version,install,rtehtmlarea,t3skin,realurl,cag_linkchecker,static_info_tables,fluid,beko_debugster,devlog,pazpar2,t3jquery,ezbrequest,kickstarter,nkwgok';	// Modified or inserted by TYPO3 Extension Manager.

$TYPO3_CONF_VARS['EXTCONF']['dbal']['handlerCfg'] = array('_DEFAULT' => array('type' => 'adodb','config' => array('driver' => '',)));;	// Modified or inserted by TYPO3 Install Tool.

$TYPO3_CONF_VARS['EXTCONF']['realurl']['_DEFAULT'] = array(
	'init' => array (
		'appendMissingSlash' => 'ifNotFile',
		'postVarSet_failureMode' => 'redirect_goodUpperDir',
		'emptyUrlReturnValue' => TRUE,
		'respectSimulateStaticURLs' => 1,
		'enableCHashCache' => 1,
		'enableUrlDecodeCache' => 1,
		'enableUrlEncodeCache' => 1,
	),
	'redirects' => array (),
	'preVars' => array (
		array (
			'GETvar' => 'L',
			'valueMap' => array (
				'en' => 2,
			),
			'noMatch' => 'bypass'
		),
		array (
			'GETvar' => 'no_cache',
			'valueMap' => array (
				'no_cache' => 1,
			),
			'noMatch' => 'bypass'
		),
	),
	'pagePath' => array(
		'type' => 'user',
		'userFunc' => 'EXT:realurl/class.tx_realurl_advanced.php:&tx_realurl_advanced->main',
		'spaceCharacter' => '-',
		'segTitleFieldList' => 'tx_realurl_pathsegment,nav_title,title',
		'languageGetVar' => 'L',
		'expireDays' => 3,
		'rootpage_id' => '12',
	),
/*	'fileName' => array (
		'index' => array (
			'index.html' => array (
				'keyValues' => array (
					'type' => 1,
				),
			),
			'atom.xml' => array (
				'keyValues' => array (
					'type' => 35,
				),
			),
		),
		'_DEFAULT' => array(
			'keyValues' => array( )
		),
	),
*/	
	'postVarSets' => array(
		'_DEFAULT' => array (
			'artikel' => array(
				array(
					'GETvar' => 'tx_ttnews[tt_news]',
				),
				array(
					'GETvar' => 'tx_ttnews[backPid]',
				),
			),
			'kategorie' => array(
				array(
					'GETvar' => 'tx_ttnews[cat]',
				),
			),
			'eintrag' => array(
				array(
					'GETvar' => 'tx_ttnews[pointer]',
				),
			),
		),
	),

);

$TYPO3_CONF_VARS['EXT']['extConf']['cag_linkchecker'] = 'a:1:{s:15:"setPageTSconfig";s:1:"1";}';	// Modified or inserted by TYPO3 Extension Manager. 
$TYPO3_CONF_VARS['EXT']['extConf']['realurl'] = 'a:5:{s:10:"configFile";s:26:"typo3conf/realurl_conf.php";s:14:"enableAutoConf";s:1:"1";s:14:"autoConfFormat";s:1:"0";s:12:"enableDevLog";s:1:"0";s:19:"enableChashUrlDebug";s:1:"0";}';	//  Modified or inserted by TYPO3 Extension Manager.
$TYPO3_CONF_VARS['EXT']['extConf']['t3jquery'] = 'a:11:{s:15:"alwaysIntegrate";s:1:"1";s:18:"dontIntegrateOnUID";s:0:"";s:9:"configDir";s:19:"uploads/tx_t3jquery";s:13:"jQueryVersion";s:5:"1.6.2";s:15:"jQueryUiVersion";s:6:"1.8.16";s:18:"jQueryTOOLSVersion";s:0:"";s:17:"integrateToFooter";s:1:"0";s:23:"dontIntegrateInRootline";s:0:"";s:13:"jqLibFilename";s:23:"jquery-###VERSION###.js";s:16:"integrateFromCDN";s:1:"0";s:11:"locationCDN";s:6:"google";}';	// Modified or inserted by TYPO3 Extension Manager. 
$TYPO3_CONF_VARS['EXT']['extConf']['beko_debugster'] = 'a:2:{s:7:"ip_mask";s:38:"134.76.*, 127.0.0.1, 10.0.*, 192.168.*";s:10:"steps_back";s:1:"3";}';	// Modified or inserted by TYPO3 Extension Manager. 
$TYPO3_CONF_VARS['EXT']['extConf']['nkwgok'] = 'a:2:{s:11:"opacBaseURL";s:39:"http://opac.sub.uni-goettingen.de/DB=1/";s:7:"CSSPath";s:0:"";}';	// Modified or inserted by TYPO3 Extension Manager.opac.sub.uni-goettingen.de/DB=1/";s:7:"CSSPath";s:0:"";}';	//
$TYPO3_CONF_VARS['EXT']['extConf']['devlog'] = 'a:11:{s:10:"maxLogRuns";s:2:"15";s:14:"entriesPerPage";s:2:"25";s:7:"maxRows";s:4:"1000";s:8:"optimize";s:1:"0";s:8:"dumpSize";s:7:"1000000";s:11:"minLogLevel";s:1:"0";s:11:"excludeKeys";s:0:"";s:14:"highlightStyle";s:60:"padding: 2px; background-color: #fc3; border: 1px solid #666";s:16:"refreshFrequency";s:1:"2";s:13:"prototypePath";s:0:"";s:11:"autoCleanup";s:1:"0";}';	// Modified or inserted by TYPO3 Extension Manager.

$TYPO3_CONF_VARS['GFX']['gdlib_png'] = '1';	// Modified or inserted by TYPO3 Install Tool.
$TYPO3_CONF_VARS['GFX']['im'] = '0';	//  Modified or inserted by TYPO3 Install Tool.
$TYPO3_CONF_VARS['GFX']['im_combine_filename'] = '';	//  Modified or inserted by TYPO3 Install Tool.
$TYPO3_CONF_VARS['GFX']['im_path'] = '';	//  Modified or inserted by TYPO3 Install Tool.
$TYPO3_CONF_VARS['GFX']['im_path_lzw'] = '';	//  Modified or inserted by TYPO3 Install Tool.

// Updated by TYPO3 Extension Manager 26-08-11 15:26:17
?>
