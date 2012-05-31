<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2011 Claus Due <claus@wildside.dk>, Wildside A/S
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
 * ************************************************************* */

/**
 *
 *
 * @author Claus Due, Wildside A/S
 * @package Fed
 * @subpackage ViewHelpers/Form
 */
class Tx_Fed_ViewHelpers_Form_OptionViewHelper extends Tx_Fluid_ViewHelpers_Form_AbstractFormFieldViewHelper {

	/**
	 * @var string
	 */
	protected $tagName = 'option';

	/**
	 * Initialize
	 * return void
	 * @author Claus Due <claus@wildside.dk>
	 */
	public function initializeArguments() {
		parent::initializeArguments();
		$this->registerUniversalTagAttributes();
		$this->registerArgument('selected', 'boolean', 'Set to "selected" to mark field as selected. If not present, selected status will be determined by select value');
	}

	/**
	 * @return string
	 * @author Claus Due <claus@wildside.dk>
	 */
	public function render() {
		if (!$this->viewHelperVariableContainer->exists('Tx_Fed_ViewHelpers_Form_SelectViewHelper', 'options')) {
			throw new Exception('Options can only be added inside select tags, optionally inside optgroup tag(s) inside the select tag', 1313937196);
		}
		if ($this->arguments['selected']) {
			$selected = 'selected';
		} else if ($this->viewHelperVariableContainer->exists('Tx_Fed_ViewHelpers_Form_SelectViewHelper', 'value')) {
			$value = $this->viewHelperVariableContainer->get('Tx_Fed_ViewHelpers_Form_SelectViewHelper', 'value');
			
			if (is_string($this->arguments['value'])) {
				$selected = $this->arguments['value'] == $value ? 'selected' : '';
            }
            if (is_array($this->arguments['value'])) {
				$selected = in_array($this->arguments['value'], $value) ? 'selected' : '';
            }
		}
		$tagContent = $this->renderChildren();
		$options = $this->viewHelperVariableContainer->get('Tx_Fed_ViewHelpers_Form_SelectViewHelper', 'options');
		$options[$tagContent] = $this->arguments['value'];
		$this->viewHelperVariableContainer->addOrUpdate('Tx_Fed_ViewHelpers_Form_SelectViewHelper', 'options', $options);
		if ($selected) {
			$this->tag->addAttribute('selected', 'selected');
		} else {
			$this->tag->removeAttribute('selected');
		}
		$this->tag->setContent($tagContent);
		if ($this->arguments['value']) {
			$this->tag->addAttribute('value', $this->arguments['value']);
		}
		return $this->tag->render();
	}


}
?>