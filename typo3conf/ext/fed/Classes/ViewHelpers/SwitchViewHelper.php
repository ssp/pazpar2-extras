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
 * Switch ViewHelper
 *
 * Fluid implementation of PHP's switch($var) construct
 *
 * @author Claus Due, Wildside A/S
 * @package Fed
 * @subpackage ViewHelpers
 */
class Tx_Fed_ViewHelpers_SwitchViewHelper extends Tx_Fed_Core_ViewHelper_AbstractViewHelper implements Tx_Fluid_Core_ViewHelper_Facets_ChildNodeAccessInterface {

	/**
	 * @var array
	 */
	private $childNodes = array();

	private $backup;

	/**
	 * Initialize
	 */
	public function initializeArguments() {
		$this->registerArgument('value', 'string', 'Variable on which to switch - string, integer or number', TRUE);
		$this->registerArgument('as', 'string', 'If specified, inserts the matched case tag content as variable using name from "as"');
	}

	/**
	 * @param array $childNodes
	 */
	public function setChildNodes(array $childNodes) {
		$this->childNodes = $childNodes;
	}

	/**
	 * Renders the case in the switch which matches variable, else default case
	 * @return string
	 */
	public function render() {
		$content = "";
		$context = $this->getRenderingContext();
		if ($context->getViewHelperVariableContainer()->exists('Tx_Fed_ViewHelpers_SwitchViewHelper', 'switchCaseValue')) {
			$this->storeBackup($context);
		}
		$context->getViewHelperVariableContainer()->addOrUpdate('Tx_Fed_ViewHelpers_SwitchViewHelper', 'switchCaseValue', $this->arguments['value']);
		$context->getViewHelperVariableContainer()->addOrUpdate('Tx_Fed_ViewHelpers_SwitchViewHelper', 'switchBreakRequested', FALSE);
		$context->getViewHelperVariableContainer()->addOrUpdate('Tx_Fed_ViewHelpers_SwitchViewHelper', 'switchContinueUntilBreak', FALSE);
		foreach ($this->childNodes as $childNode) {
			if ($childNode instanceof Tx_Fluid_Core_Parser_SyntaxTree_ViewHelperNode
				&& $childNode->getViewHelperClassName() === 'Tx_Fed_ViewHelpers_CaseViewHelper') {
				$content .= $childNode->evaluate($context);
				$shouldBreak = $this->determineBooleanOf($context, 'switchBreakRequested');
				if ($shouldBreak === TRUE) {
					return $content;
				}
			}
		}
		$context->getViewHelperVariableContainer()->remove('Tx_Fed_ViewHelpers_SwitchViewHelper', 'switchCaseValue');
		$context->getViewHelperVariableContainer()->remove('Tx_Fed_ViewHelpers_SwitchViewHelper', 'switchBreakRequested');
		$context->getViewHelperVariableContainer()->remove('Tx_Fed_ViewHelpers_SwitchViewHelper', 'switchContinueUntilBreak');
		if ($this->backup) {
			$this->restoreBackup($context);
		}
		if ($this->arguments['as']) {
			$this->templateVariableContainer->add($this->arguments['as'], $content);
		} else {
			return $content;
		}

	}

	protected function storeBackup($context) {
		$this->backup = array(
			$context->getViewHelperVariableContainer()->get('Tx_Fed_ViewHelpers_SwitchViewHelper', 'switchCaseValue'),
			$this->determineBooleanOf($context, 'switchBreakRequested'),
			$this->determineBooleanOf($context, 'switchContinueUntilBreak')
		);
	}

	protected function restoreBackup($context) {
		$context->getViewHelperVariableContainer()->add('Tx_Fed_ViewHelpers_SwitchViewHelper', 'switchCaseValue', $this->backup[0]);
		$context->getViewHelperVariableContainer()->add('Tx_Fed_ViewHelpers_SwitchViewHelper', 'switchBreakRequested', $this->backup[1]);
		$context->getViewHelperVariableContainer()->add('Tx_Fed_ViewHelpers_SwitchViewHelper', 'switchContinueUntilBreak', $this->backup[2]);
	}

	protected function determineBooleanOf($context, $var) {
		if ($context->getViewHelperVariableContainer()->exists('Tx_Fed_ViewHelpers_SwitchViewHelper', 'switchBreakRequested')) {
			return $context->getViewHelperVariableContainer()->get('Tx_Fed_ViewHelpers_SwitchViewHelper', 'switchBreakRequested');
		}
	}




}

?>