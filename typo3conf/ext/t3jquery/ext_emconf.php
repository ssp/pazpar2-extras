<?php

########################################################################
# Extension Manager/Repository config file for ext "t3jquery".
#
# Auto generated 15-09-2011 18:43
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'T3 jQuery',
	'description' => 'Provides a shared version of the jQuery Javascript framework for use in other extensions. See class.tx_t3jquery.php for API and usage. Includes BE module for configuring which parts of jQuery UI you want included.',
	'category' => 'misc',
	'shy' => 0,
	'version' => '2.0.0',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => 'mod1',
	'state' => 'stable',
	'uploadfolder' => 1,
	'createDirs' => '',
	'modify_tables' => '',
	'clearcacheonload' => 0,
	'lockType' => '',
	'author' => 'Juergen Furrer',
	'author_email' => 'juergen.furrer@gmail.com',
	'author_company' => '',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'cms' => '',
			'php' => '5.0.0-0.0.0',
			'typo3' => '4.3.0-4.99.999',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:321:{s:21:"class.tx_t3jquery.php";s:4:"d518";s:16:"ext_autoload.php";s:4:"50ce";s:21:"ext_conf_template.txt";s:4:"814d";s:12:"ext_icon.gif";s:4:"72a2";s:17:"ext_localconf.php";s:4:"9345";s:15:"ext_php_api.dat";s:4:"3fb6";s:14:"ext_tables.php";s:4:"cb3b";s:13:"locallang.xml";s:4:"13df";s:24:"compat/flashmessages.css";s:4:"4e2c";s:20:"compat/gfx/error.png";s:4:"e4dd";s:26:"compat/gfx/information.png";s:4:"3750";s:21:"compat/gfx/notice.png";s:4:"a882";s:17:"compat/gfx/ok.png";s:4:"8bfe";s:22:"compat/gfx/warning.png";s:4:"c847";s:14:"doc/manual.sxw";s:4:"715a";s:37:"lib/class.tx_t3jquery_tsparserext.php";s:4:"937d";s:31:"mod1/class.JavaScriptPacker.php";s:4:"67a1";s:36:"mod1/class.JavaScriptPacker_php5.php";s:4:"4e89";s:26:"mod1/class.analyzeJqJS.php";s:4:"b471";s:14:"mod1/clear.gif";s:4:"cc11";s:13:"mod1/conf.php";s:4:"91bc";s:14:"mod1/index.php";s:4:"a25b";s:18:"mod1/locallang.xml";s:4:"719d";s:22:"mod1/locallang_mod.xml";s:4:"b8cd";s:19:"mod1/moduleicon.gif";s:4:"72a2";s:15:"res/jqconfig.js";s:4:"384e";s:31:"res/jquery/core/1.2.x/jquery.js";s:4:"3436";s:32:"res/jquery/core/1.2.x/jquery.xml";s:4:"d12c";s:31:"res/jquery/core/1.3.x/jquery.js";s:4:"e4af";s:32:"res/jquery/core/1.3.x/jquery.xml";s:4:"8de6";s:31:"res/jquery/core/1.4.x/jquery.js";s:4:"ede3";s:32:"res/jquery/core/1.4.x/jquery.xml";s:4:"515a";s:31:"res/jquery/core/1.5.x/jquery.js";s:4:"8c40";s:32:"res/jquery/core/1.5.x/jquery.xml";s:4:"3484";s:31:"res/jquery/core/1.6.x/jquery.js";s:4:"4ab2";s:32:"res/jquery/core/1.6.x/jquery.xml";s:4:"28b5";s:33:"res/jquery/plugins/jquery.lint.js";s:4:"b3de";s:35:"res/jquery/plugins/jquery.mobile.js";s:4:"5f9a";s:39:"res/jquery/plugins/jquery.mousewheel.js";s:4:"ec36";s:39:"res/jquery/plugins/jquery.noConflict.js";s:4:"e206";s:33:"res/jquery/tools/1.1.x/jquery.xml";s:4:"079c";s:48:"res/jquery/tools/1.1.x/ui/flowplayer.controls.js";s:4:"c6cd";s:45:"res/jquery/tools/1.1.x/ui/flowplayer.embed.js";s:4:"5632";s:39:"res/jquery/tools/1.1.x/ui/flowplayer.js";s:4:"dc26";s:48:"res/jquery/tools/1.1.x/ui/flowplayer.playlist.js";s:4:"7f2f";s:41:"res/jquery/tools/1.1.x/ui/tools.expose.js";s:4:"a363";s:45:"res/jquery/tools/1.1.x/ui/tools.flashembed.js";s:4:"9bb3";s:48:"res/jquery/tools/1.1.x/ui/tools.overlay.apple.js";s:4:"0bbb";s:50:"res/jquery/tools/1.1.x/ui/tools.overlay.gallery.js";s:4:"79d0";s:42:"res/jquery/tools/1.1.x/ui/tools.overlay.js";s:4:"5c4b";s:56:"res/jquery/tools/1.1.x/ui/tools.scrollable.autoscroll.js";s:4:"9261";s:54:"res/jquery/tools/1.1.x/ui/tools.scrollable.circular.js";s:4:"3173";s:45:"res/jquery/tools/1.1.x/ui/tools.scrollable.js";s:4:"58f6";s:56:"res/jquery/tools/1.1.x/ui/tools.scrollable.mousewheel.js";s:4:"828f";s:55:"res/jquery/tools/1.1.x/ui/tools.scrollable.navigator.js";s:4:"4e14";s:47:"res/jquery/tools/1.1.x/ui/tools.tabs.history.js";s:4:"8af8";s:39:"res/jquery/tools/1.1.x/ui/tools.tabs.js";s:4:"0f5d";s:49:"res/jquery/tools/1.1.x/ui/tools.tabs.slideshow.js";s:4:"4fa9";s:50:"res/jquery/tools/1.1.x/ui/tools.tooltip.dynamic.js";s:4:"c38c";s:42:"res/jquery/tools/1.1.x/ui/tools.tooltip.js";s:4:"1c31";s:48:"res/jquery/tools/1.1.x/ui/tools.tooltip.slide.js";s:4:"0997";s:37:"res/jquery/tools/1.2.6-dev/jquery.xml";s:4:"7344";s:43:"res/jquery/tools/1.2.6-dev/ui/flowplayer.js";s:4:"fc41";s:47:"res/jquery/tools/1.2.6-dev/ui/form.dateinput.js";s:4:"e59e";s:48:"res/jquery/tools/1.2.6-dev/ui/form.rangeinput.js";s:4:"aeb7";s:47:"res/jquery/tools/1.2.6-dev/ui/form.validator.js";s:4:"e813";s:45:"res/jquery/tools/1.2.6-dev/ui/tools.expose.js";s:4:"7670";s:49:"res/jquery/tools/1.2.6-dev/ui/tools.flashembed.js";s:4:"87a1";s:46:"res/jquery/tools/1.2.6-dev/ui/tools.history.js";s:4:"77ae";s:49:"res/jquery/tools/1.2.6-dev/ui/tools.mousewheel.js";s:4:"eda7";s:52:"res/jquery/tools/1.2.6-dev/ui/tools.overlay.apple.js";s:4:"d6b5";s:46:"res/jquery/tools/1.2.6-dev/ui/tools.overlay.js";s:4:"8dc6";s:60:"res/jquery/tools/1.2.6-dev/ui/tools.scrollable.autoscroll.js";s:4:"5a25";s:49:"res/jquery/tools/1.2.6-dev/ui/tools.scrollable.js";s:4:"af26";s:59:"res/jquery/tools/1.2.6-dev/ui/tools.scrollable.navigator.js";s:4:"4b51";s:43:"res/jquery/tools/1.2.6-dev/ui/tools.tabs.js";s:4:"f172";s:53:"res/jquery/tools/1.2.6-dev/ui/tools.tabs.slideshow.js";s:4:"94bc";s:54:"res/jquery/tools/1.2.6-dev/ui/tools.tooltip.dynamic.js";s:4:"c673";s:46:"res/jquery/tools/1.2.6-dev/ui/tools.tooltip.js";s:4:"b59c";s:52:"res/jquery/tools/1.2.6-dev/ui/tools.tooltip.slide.js";s:4:"cf9e";s:33:"res/jquery/tools/1.2.x/jquery.xml";s:4:"968c";s:39:"res/jquery/tools/1.2.x/ui/flowplayer.js";s:4:"fc41";s:43:"res/jquery/tools/1.2.x/ui/form.dateinput.js";s:4:"7078";s:44:"res/jquery/tools/1.2.x/ui/form.rangeinput.js";s:4:"d10e";s:43:"res/jquery/tools/1.2.x/ui/form.validator.js";s:4:"483c";s:41:"res/jquery/tools/1.2.x/ui/tools.expose.js";s:4:"d8d5";s:45:"res/jquery/tools/1.2.x/ui/tools.flashembed.js";s:4:"e21f";s:42:"res/jquery/tools/1.2.x/ui/tools.history.js";s:4:"b2ac";s:45:"res/jquery/tools/1.2.x/ui/tools.mousewheel.js";s:4:"e30c";s:48:"res/jquery/tools/1.2.x/ui/tools.overlay.apple.js";s:4:"1372";s:42:"res/jquery/tools/1.2.x/ui/tools.overlay.js";s:4:"cafc";s:56:"res/jquery/tools/1.2.x/ui/tools.scrollable.autoscroll.js";s:4:"1663";s:45:"res/jquery/tools/1.2.x/ui/tools.scrollable.js";s:4:"3531";s:55:"res/jquery/tools/1.2.x/ui/tools.scrollable.navigator.js";s:4:"2ca8";s:39:"res/jquery/tools/1.2.x/ui/tools.tabs.js";s:4:"4ad1";s:49:"res/jquery/tools/1.2.x/ui/tools.tabs.slideshow.js";s:4:"85fc";s:50:"res/jquery/tools/1.2.x/ui/tools.tooltip.dynamic.js";s:4:"ef2c";s:42:"res/jquery/tools/1.2.x/ui/tools.tooltip.js";s:4:"d5b9";s:48:"res/jquery/tools/1.2.x/ui/tools.tooltip.slide.js";s:4:"dd50";s:30:"res/jquery/ui/1.6.x/jquery.xml";s:4:"9cdb";s:46:"res/jquery/ui/1.6.x/ui/jquery.effects.blind.js";s:4:"5b8f";s:47:"res/jquery/ui/1.6.x/ui/jquery.effects.bounce.js";s:4:"7e97";s:45:"res/jquery/ui/1.6.x/ui/jquery.effects.clip.js";s:4:"6490";s:45:"res/jquery/ui/1.6.x/ui/jquery.effects.core.js";s:4:"a6dc";s:45:"res/jquery/ui/1.6.x/ui/jquery.effects.drop.js";s:4:"21aa";s:48:"res/jquery/ui/1.6.x/ui/jquery.effects.explode.js";s:4:"c412";s:45:"res/jquery/ui/1.6.x/ui/jquery.effects.fold.js";s:4:"8e6a";s:50:"res/jquery/ui/1.6.x/ui/jquery.effects.highlight.js";s:4:"5a5f";s:48:"res/jquery/ui/1.6.x/ui/jquery.effects.pulsate.js";s:4:"a27b";s:46:"res/jquery/ui/1.6.x/ui/jquery.effects.scale.js";s:4:"688b";s:46:"res/jquery/ui/1.6.x/ui/jquery.effects.shake.js";s:4:"9b0f";s:46:"res/jquery/ui/1.6.x/ui/jquery.effects.slide.js";s:4:"1152";s:49:"res/jquery/ui/1.6.x/ui/jquery.effects.transfer.js";s:4:"05cc";s:45:"res/jquery/ui/1.6.x/ui/jquery.ui.accordion.js";s:4:"34eb";s:40:"res/jquery/ui/1.6.x/ui/jquery.ui.core.js";s:4:"8e89";s:46:"res/jquery/ui/1.6.x/ui/jquery.ui.datepicker.js";s:4:"7c0b";s:42:"res/jquery/ui/1.6.x/ui/jquery.ui.dialog.js";s:4:"d245";s:45:"res/jquery/ui/1.6.x/ui/jquery.ui.draggable.js";s:4:"f9e7";s:45:"res/jquery/ui/1.6.x/ui/jquery.ui.droppable.js";s:4:"4385";s:45:"res/jquery/ui/1.6.x/ui/jquery.ui.resizable.js";s:4:"47a9";s:46:"res/jquery/ui/1.6.x/ui/jquery.ui.selectable.js";s:4:"0bc2";s:42:"res/jquery/ui/1.6.x/ui/jquery.ui.slider.js";s:4:"8e23";s:44:"res/jquery/ui/1.6.x/ui/jquery.ui.sortable.js";s:4:"2a98";s:40:"res/jquery/ui/1.6.x/ui/jquery.ui.tabs.js";s:4:"e518";s:54:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-ar.js";s:4:"7a9f";s:54:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-bg.js";s:4:"cccf";s:54:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-ca.js";s:4:"b01a";s:54:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-cs.js";s:4:"0eb7";s:54:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-da.js";s:4:"af1c";s:54:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-de.js";s:4:"c0f7";s:54:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-eo.js";s:4:"163c";s:54:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-es.js";s:4:"42bf";s:54:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-fa.js";s:4:"b3df";s:54:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-fi.js";s:4:"d243";s:54:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-fr.js";s:4:"7edb";s:54:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-he.js";s:4:"11b6";s:54:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-hr.js";s:4:"efe1";s:54:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-hu.js";s:4:"acda";s:54:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-hy.js";s:4:"f0ce";s:54:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-id.js";s:4:"44b6";s:54:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-is.js";s:4:"b521";s:54:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-it.js";s:4:"5d15";s:54:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-ja.js";s:4:"d12b";s:54:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-ko.js";s:4:"60c9";s:54:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-lt.js";s:4:"e7ca";s:54:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-lv.js";s:4:"8027";s:54:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-nl.js";s:4:"2d0c";s:54:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-no.js";s:4:"3610";s:54:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-pl.js";s:4:"11ab";s:57:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-pt-BR.js";s:4:"cd10";s:54:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-ro.js";s:4:"11ff";s:54:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-ru.js";s:4:"7dee";s:54:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-sk.js";s:4:"868b";s:54:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-sl.js";s:4:"0eaa";s:54:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-sq.js";s:4:"76be";s:54:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-sv.js";s:4:"8093";s:54:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-th.js";s:4:"1b21";s:54:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-tr.js";s:4:"d3f4";s:54:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-uk.js";s:4:"fa7e";s:57:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-zh-CN.js";s:4:"d206";s:57:"res/jquery/ui/1.6.x/ui/i18n/jquery.ui.datepicker-zh-TW.js";s:4:"7fdd";s:30:"res/jquery/ui/1.7.x/jquery.xml";s:4:"3820";s:46:"res/jquery/ui/1.7.x/ui/jquery.effects.blind.js";s:4:"e21c";s:47:"res/jquery/ui/1.7.x/ui/jquery.effects.bounce.js";s:4:"af2b";s:45:"res/jquery/ui/1.7.x/ui/jquery.effects.clip.js";s:4:"c376";s:45:"res/jquery/ui/1.7.x/ui/jquery.effects.core.js";s:4:"f1b7";s:45:"res/jquery/ui/1.7.x/ui/jquery.effects.drop.js";s:4:"4af0";s:48:"res/jquery/ui/1.7.x/ui/jquery.effects.explode.js";s:4:"518f";s:45:"res/jquery/ui/1.7.x/ui/jquery.effects.fold.js";s:4:"f655";s:50:"res/jquery/ui/1.7.x/ui/jquery.effects.highlight.js";s:4:"aef8";s:48:"res/jquery/ui/1.7.x/ui/jquery.effects.pulsate.js";s:4:"f1a3";s:46:"res/jquery/ui/1.7.x/ui/jquery.effects.scale.js";s:4:"b7c5";s:46:"res/jquery/ui/1.7.x/ui/jquery.effects.shake.js";s:4:"50b8";s:46:"res/jquery/ui/1.7.x/ui/jquery.effects.slide.js";s:4:"5221";s:49:"res/jquery/ui/1.7.x/ui/jquery.effects.transfer.js";s:4:"dd4f";s:45:"res/jquery/ui/1.7.x/ui/jquery.ui.accordion.js";s:4:"4f83";s:40:"res/jquery/ui/1.7.x/ui/jquery.ui.core.js";s:4:"f1f8";s:46:"res/jquery/ui/1.7.x/ui/jquery.ui.datepicker.js";s:4:"cc54";s:42:"res/jquery/ui/1.7.x/ui/jquery.ui.dialog.js";s:4:"bb3f";s:45:"res/jquery/ui/1.7.x/ui/jquery.ui.draggable.js";s:4:"23d2";s:45:"res/jquery/ui/1.7.x/ui/jquery.ui.droppable.js";s:4:"74bb";s:47:"res/jquery/ui/1.7.x/ui/jquery.ui.progressbar.js";s:4:"3257";s:45:"res/jquery/ui/1.7.x/ui/jquery.ui.resizable.js";s:4:"4651";s:46:"res/jquery/ui/1.7.x/ui/jquery.ui.selectable.js";s:4:"157b";s:42:"res/jquery/ui/1.7.x/ui/jquery.ui.slider.js";s:4:"c7b9";s:44:"res/jquery/ui/1.7.x/ui/jquery.ui.sortable.js";s:4:"9176";s:40:"res/jquery/ui/1.7.x/ui/jquery.ui.tabs.js";s:4:"1a08";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-ar.js";s:4:"8e6e";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-bg.js";s:4:"b4aa";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-ca.js";s:4:"30ce";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-cs.js";s:4:"a1b6";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-da.js";s:4:"c9a6";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-de.js";s:4:"e002";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-el.js";s:4:"f248";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-eo.js";s:4:"a905";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-es.js";s:4:"07ab";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-fa.js";s:4:"fa63";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-fi.js";s:4:"105a";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-fr.js";s:4:"e86d";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-he.js";s:4:"87c7";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-hr.js";s:4:"51e4";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-hu.js";s:4:"804c";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-hy.js";s:4:"b5f2";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-id.js";s:4:"4daf";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-is.js";s:4:"c325";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-it.js";s:4:"c325";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-ja.js";s:4:"d174";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-ko.js";s:4:"6a15";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-lt.js";s:4:"90a5";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-lv.js";s:4:"9b63";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-ms.js";s:4:"5b84";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-nl.js";s:4:"1442";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-no.js";s:4:"706d";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-pl.js";s:4:"9335";s:57:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-pt-BR.js";s:4:"8322";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-ro.js";s:4:"91af";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-ru.js";s:4:"6876";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-sk.js";s:4:"9a73";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-sl.js";s:4:"9c95";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-sq.js";s:4:"db4f";s:57:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-sr-SR.js";s:4:"69fd";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-sr.js";s:4:"3084";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-sv.js";s:4:"5334";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-th.js";s:4:"5924";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-tr.js";s:4:"f80d";s:54:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-uk.js";s:4:"6f97";s:57:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-zh-CN.js";s:4:"6529";s:57:"res/jquery/ui/1.7.x/ui/i18n/jquery.ui.datepicker-zh-TW.js";s:4:"0330";s:30:"res/jquery/ui/1.8.x/jquery.xml";s:4:"2b70";s:46:"res/jquery/ui/1.8.x/ui/jquery.effects.blind.js";s:4:"31be";s:47:"res/jquery/ui/1.8.x/ui/jquery.effects.bounce.js";s:4:"2c82";s:45:"res/jquery/ui/1.8.x/ui/jquery.effects.clip.js";s:4:"5d43";s:45:"res/jquery/ui/1.8.x/ui/jquery.effects.core.js";s:4:"d634";s:45:"res/jquery/ui/1.8.x/ui/jquery.effects.drop.js";s:4:"5265";s:48:"res/jquery/ui/1.8.x/ui/jquery.effects.explode.js";s:4:"ed19";s:45:"res/jquery/ui/1.8.x/ui/jquery.effects.fade.js";s:4:"781a";s:45:"res/jquery/ui/1.8.x/ui/jquery.effects.fold.js";s:4:"bdea";s:50:"res/jquery/ui/1.8.x/ui/jquery.effects.highlight.js";s:4:"1c81";s:48:"res/jquery/ui/1.8.x/ui/jquery.effects.pulsate.js";s:4:"abd4";s:46:"res/jquery/ui/1.8.x/ui/jquery.effects.scale.js";s:4:"6156";s:46:"res/jquery/ui/1.8.x/ui/jquery.effects.shake.js";s:4:"5f32";s:46:"res/jquery/ui/1.8.x/ui/jquery.effects.slide.js";s:4:"6bbb";s:49:"res/jquery/ui/1.8.x/ui/jquery.effects.transfer.js";s:4:"f07a";s:45:"res/jquery/ui/1.8.x/ui/jquery.ui.accordion.js";s:4:"a6e5";s:48:"res/jquery/ui/1.8.x/ui/jquery.ui.autocomplete.js";s:4:"f2ee";s:42:"res/jquery/ui/1.8.x/ui/jquery.ui.button.js";s:4:"9e10";s:40:"res/jquery/ui/1.8.x/ui/jquery.ui.core.js";s:4:"189c";s:46:"res/jquery/ui/1.8.x/ui/jquery.ui.datepicker.js";s:4:"0900";s:42:"res/jquery/ui/1.8.x/ui/jquery.ui.dialog.js";s:4:"fa2d";s:45:"res/jquery/ui/1.8.x/ui/jquery.ui.draggable.js";s:4:"0dd1";s:45:"res/jquery/ui/1.8.x/ui/jquery.ui.droppable.js";s:4:"f9b1";s:41:"res/jquery/ui/1.8.x/ui/jquery.ui.mouse.js";s:4:"80ca";s:44:"res/jquery/ui/1.8.x/ui/jquery.ui.position.js";s:4:"bc7e";s:47:"res/jquery/ui/1.8.x/ui/jquery.ui.progressbar.js";s:4:"11da";s:45:"res/jquery/ui/1.8.x/ui/jquery.ui.resizable.js";s:4:"d6b5";s:46:"res/jquery/ui/1.8.x/ui/jquery.ui.selectable.js";s:4:"b08e";s:42:"res/jquery/ui/1.8.x/ui/jquery.ui.slider.js";s:4:"646c";s:44:"res/jquery/ui/1.8.x/ui/jquery.ui.sortable.js";s:4:"7e7f";s:40:"res/jquery/ui/1.8.x/ui/jquery.ui.tabs.js";s:4:"6563";s:42:"res/jquery/ui/1.8.x/ui/jquery.ui.widget.js";s:4:"c150";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-af.js";s:4:"3f6d";s:57:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-ar-DZ.js";s:4:"75fc";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-ar.js";s:4:"bd15";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-az.js";s:4:"d137";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-bg.js";s:4:"8098";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-bs.js";s:4:"1a61";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-ca.js";s:4:"b9f0";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-cs.js";s:4:"d974";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-da.js";s:4:"a20a";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-de.js";s:4:"ba8b";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-el.js";s:4:"46b8";s:57:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-en-AU.js";s:4:"4a38";s:57:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-en-GB.js";s:4:"24a2";s:57:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-en-NZ.js";s:4:"af98";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-eo.js";s:4:"ae01";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-es.js";s:4:"469e";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-et.js";s:4:"9894";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-eu.js";s:4:"80ad";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-fa.js";s:4:"09d5";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-fi.js";s:4:"c796";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-fo.js";s:4:"c236";s:57:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-fr-CH.js";s:4:"4c40";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-fr.js";s:4:"59cc";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-gl.js";s:4:"948d";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-he.js";s:4:"1ee7";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-hr.js";s:4:"593a";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-hu.js";s:4:"4e49";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-hy.js";s:4:"64b7";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-id.js";s:4:"cc32";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-is.js";s:4:"c1da";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-it.js";s:4:"b1dc";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-ja.js";s:4:"c38e";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-ko.js";s:4:"16ca";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-kz.js";s:4:"be24";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-lt.js";s:4:"ab35";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-lv.js";s:4:"2062";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-ml.js";s:4:"8037";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-ms.js";s:4:"85de";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-nl.js";s:4:"f754";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-no.js";s:4:"dcb1";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-pl.js";s:4:"fbe2";s:57:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-pt-BR.js";s:4:"4f41";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-pt.js";s:4:"2e4a";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-rm.js";s:4:"4158";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-ro.js";s:4:"f2c1";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-ru.js";s:4:"1789";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-sk.js";s:4:"8b44";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-sl.js";s:4:"72d8";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-sq.js";s:4:"3493";s:57:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-sr-SR.js";s:4:"1a58";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-sr.js";s:4:"4065";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-sv.js";s:4:"8c79";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-ta.js";s:4:"da76";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-th.js";s:4:"ac63";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-tj.js";s:4:"af2f";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-tr.js";s:4:"9718";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-uk.js";s:4:"9ae7";s:54:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-vi.js";s:4:"be31";s:57:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-zh-CN.js";s:4:"26ec";s:57:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-zh-HK.js";s:4:"3b93";s:57:"res/jquery/ui/1.8.x/ui/i18n/jquery.ui.datepicker-zh-TW.js";s:4:"ef1e";}',
);

?>