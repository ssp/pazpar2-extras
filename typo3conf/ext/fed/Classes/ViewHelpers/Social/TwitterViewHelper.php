<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2010 Georg Ringer <typo3@ringerge.org>
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
 * ViewHelper to add a twitter button
 * Details: http://twitter.com/about/resources/tweetbutton
 *
 * Examples
 * ==============
 *
 * <fed:social.twitter>Twitter</fed:social.twitter>
 * Result: Twitter widget
 *
 * <fed:social.twitter datacount="vertical" datalang="de"
 * dataurl="http://www.mydomain.tld">Twitter</fed:social.twitter>
 * Result: Twitter widget to share www.mydomain.tld with a german twitter text
 *
 * @package Fed
 * @subpackage ViewHelpers
 */
class Tx_Fed_ViewHelpers_Social_TwitterViewHelper extends Tx_Fed_Core_ViewHelper_AbstractViewHelper {
	/**
	 * @var	string
	 */
	protected $tagName = 'a';

	/**
	 * Arguments initialization
	 *
	 * @return void
	 */
	public function initializeArguments() {
		$this->registerTagAttribute('class', 'string', 'Class of link');
		$this->registerTagAttribute('datacount', 'string', 'Button style. Can be "horizontal", "vertical" or "none"');
		$this->registerTagAttribute('datavia', 'string', 'Preferred twitter account.');
		$this->registerTagAttribute('datarelated', 'string', 'Related twitter account.');
		$this->registerTagAttribute('datatext', 'string', 'This is the text that people will include in their Tweet when they share from your website. Default is title of the page');
		$this->registerTagAttribute('dataurl', 'string', 'Suggest a4 default Tweet for users. Default is current page title.');
		$this->registerTagAttribute('datalang', 'string', 'Language of the twitter button. Can either be fr, it, de, es, ko or ja');
		$this->registerArgument('javaScript', 'string', 'JS URL. If not set, default is used, if set to -1 no Js is loaded', FALSE, '');
	}

	/**
	 * Render twitter viewhelper
	 *
	 * @return string
	 */
	public function render() {
		$this->tag->addAttribute('href', 'http://twitter.com/share');
		$this->tag->addAttribute('class', (!empty($this->arguments['class'])) ? $this->arguments['class'] : 'twitter-share-button');

			// rewrite tags as it seems that it is not possible to have tags with a '-'.
		$rewriteTags = array('datacount', 'datavia', 'datarelated', 'datatext', 'dataurl', 'datalang');
		foreach ($rewriteTags as $tag) {
			if (!empty($this->arguments[$tag])) {
				$newTag = str_replace('data', 'data-', $tag);
				$this->tag->addAttribute($newTag, $this->arguments[$tag]);
				$this->tag->removeAttribute($tag);
			}
		}

			// -1 means no JS
		if ($this->arguments['javaScript'] != '-1') {
			if (empty($this->arguments['javaScript'])) {
				$file = 'http://platform.twitter.com/widgets.js';
			} else {
				$file = htmlspecialchars($this->arguments['javaScript']);
			}
			$this->documentHead->includeFile($file);
		}
		$this->tag->setContent($this->renderChildren());

		return $this->tag->render();
	}
}

?>