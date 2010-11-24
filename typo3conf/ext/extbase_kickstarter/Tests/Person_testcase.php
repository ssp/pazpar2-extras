<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2009 Jochen Rau <jochen.rau@typoplanet.de>
 *  All rights reserved
 *
 *  This class is a backport of the corresponding class of FLOW3.
 *  All credits go to the v5 team.
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

require_once('BaseTestCase.php');
class  Tx_ExtbaseKickstarter_Domain_Model_Person_testcase extends Tx_ExtbaseKickstarter_BaseTestCase {

	protected $person;

	function setUp() {
		$this->person=t3lib_div::makeInstance('Tx_ExtbaseKickstarter_Domain_Model_Person');
	}

	/**
	 * @test
	 */
	function GettersSettersTest () {
		$name="Christoph D�hne";
		$role="Tester";
		$email="e@mail.com";
		$company="none";

		$this->person->setName($name);
		$this->person->setRole($role);
		$this->person->setEmail($email);
		$this->person->setCompany($company);

		$this->assertEquals($this->person->getName(), $name, 'Persons name was set wrong.');
		$this->assertEquals($this->person->getRole(), $role, 'Persons role was set wrong.');
		$this->assertEquals($this->person->getEmail(), $email, 'Persons email was set wrong.');
		$this->assertEquals($this->person->getCompany(), $company, 'Persons company was set wrong.');

	}
}
?>
