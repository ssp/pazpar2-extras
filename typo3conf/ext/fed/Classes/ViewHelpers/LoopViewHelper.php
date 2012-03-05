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
 * Repeats rendering of children $count times while updating $iteration
 *
 * @author Claus Due, Wildside A/S
 * @package Fed
 * @subpackage ViewHelpers
 *
 */
class Tx_Fed_ViewHelpers_LoopViewHelper extends Tx_Fluid_ViewHelpers_ImageViewHelper {

	/**
	 * Initialize
	 */
	public function initializeArguments() {
		$this->registerArgument('count', 'integer', 'Number of times to render child content', TRUE);
		$this->registerArgument('minimum', 'integer', 'Minimum number of loops before stopping', FALSE, 0);
		$this->registerArgument('iteration', 'string', 'Variable name to insert result into, suppresses output', FALSE, NULL);
	}

	/**
	 * @return string
	 */
	public function render() {
		$max = $this->arguments['count'];
		$i = 0;
		$content = '';
		while ($i < $max) {
			if ($this->arguments['iteration']) {
				$iteration = array(
					'cycle' => $i+1,
					'index' => $i,
					'isOdd' => ($i%2 == 0 ? 1 : 0),
					'isEven' => $i%2,
					'isFirst' => ($i === 0 ? 1 : 0),
					'isLast' => ($i === ($max-1) ? 1 : 0)
				);
				if ($this->templateVariableContainer->exists('iteration')) {
					$this->templateVariableContainer->remove('iteration');
				}
				$this->templateVariableContainer->add($this->arguments['iteration'], $iteration);
				$content .= $this->renderChildren() . LF;
				$this->templateVariableContainer->remove($this->arguments['iteration']);
			} else {
				$content .= $this->renderChildren() . LF;
			}
			$i++;
		}
		return $content;
	}

}

?>
