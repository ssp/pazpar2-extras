<?php
/***************************************************************
*  Copyright notice
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

class Tx_ExtbaseKickstarter_Scaffolding_AbstractScaffoldingController extends Tx_Extbase_MVC_Controller_ActionController {
	/**
	 * Name of the Domain Object this Controller should provide CRUD functionality for. Example: "Blog".
	 *
	 * If not set, this is divised from the name of the Controller
	 * (by using the last part of the controller class name without "Controller")
	 *
	 * @api
	 * @var string
	 */
	protected $domainObjectName = NULL;

	/**
	 * Full class name of the Domain Object this controller should provide CRUD functionality for.
	 * Example: "Tx_BlogExample_Domain_Model_Blog"
	 *
	 * If not set, this is divised from $domainObjectName and $extensionName.
	 * 
	 * @var string
	 */
	protected $domainObjectClassName = NULL;

	/**
	 * Class name of the repository to be used. If NULL, we derive it from the $domainObjectName
	 *
	 * @var string
	 */
	protected $repositoryClassName = NULL;

	/**
	 * Repository
	 *
	 * @var Tx_Extbase_Persistence_RepositoryInterface
	 */
	protected $repository;

	/**
	 * Constructor.
	 */
	public function __construct() {
		parent::__construct();
		$this->setNameOfAssociatedDomainObject();
	}

	/**
	 * Set the name of associated domain object, based on the controller
	 * name.
	 * 
	 * @return void
	 */
	protected function setNameOfAssociatedDomainObject() {
		$controllerClassName = get_class($this);

		if ($this->domainObjectName === NULL) {
			$this->domainObjectName = substr(array_pop(explode('_', $controllerClassName)), 0, - strlen('Controller'));
		}

		if ($this->domainObjectClassName === NULL) {
			$this->domainObjectClassName = Tx_ExtbaseKickstarter_Utility_Naming::getDomainObjectClassName($this->extensionName, $this->domainObjectName);
		}

		if ($this->repositoryClassName === NULL) {
			$this->repositoryClassName = 'Tx_' . $this->extensionName . '_Domain_Repository_' . $this->domainObjectName . 'Repository';
		}
	
		if (!class_exists($this->domainObjectClassName)) {
			throw new Exception('The domain object "' . $this->domainObjectClassName . '" does not exist.');
		}
		
		if (!class_exists($this->repositoryClassName)) {
			throw new Exception('The repository class "' . $this->repositoryClassName . '" does not exist.');
		}

		$this->repository = t3lib_div::makeInstance($this->repositoryClassName);
	}

	/**
	 * Object name of view.
	 * 
	 * @return string
	 */
	protected function resolveViewObjectName() {
		if (class_exists(parent::resolveViewObjectName())) {
			return parent::resolveViewObjectName();
		} else {
			return 'Tx_ExtbaseKickstarter_Scaffolding_ScaffoldingView';
		}
	}

	/**
	 * Initializes the view before invoking an action method.
	 *
	 * @param Tx_Extbase_View_ViewInterface $view The view to be initialized
	 * @return void
	 */
	protected function initializeView(Tx_Extbase_MVC_View_ViewInterface $view) {
		if ($view instanceof Tx_ExtbaseKickstarter_Scaffolding_ScaffoldingView) {
			$view->setDomainObjectName($this->domainObjectName);
		}
	}

	/**
	 * SECTION: CRUD Actions
	 */

	/**
	 * Index action for this controller. Displays a list of domain objects.
	 *
	 * @return string The rendered view
	 */
	public function indexAction() {
		$lowercasedAndPluralizedDomainObjectName = Tx_ExtbaseKickstarter_Utility_Inflector::pluralize(t3lib_div::lcfirst($this->domainObjectName));
		$this->view->assign($lowercasedAndPluralizedDomainObjectName, $this->repository->findAll());
	}

	/**
	 * Initialize the NEW Action; Adds a parameter without validation.
	 *
	 * @return void
	 */
	public function initializeNewAction() {
		$this->arguments->addNewArgument('new' . $this->domainObjectName, $this->domainObjectClassName, FALSE);
	}

	/**
	 * Displays a form for creating a new domain object
	 *
	 * @return string An HTML form for creating a new domain object
	 */
	public function newAction() {
		$this->view->assign('new' . $this->domainObjectName, $this->arguments['new' . $this->domainObjectName]->getValue());
	}

	/**
	 * Initialize the "CREATE" action which should actually CREATE the object.
	 *
	 * @return void
	 */
	public function initializeCreateAction() {
		$argument = $this->arguments->addNewArgument('new' . $this->domainObjectName, $this->domainObjectClassName, TRUE);
		$argument->setValidator($this->validatorResolver->getBaseValidatorConjunction($this->domainObjectClassName));
	}
	
	/**
	 * Creates a new domain object
	 *
	 * @return void
	 */
	public function createAction() {
		$this->repository->add($this->arguments['new' . $this->domainObjectName]->getValue());
		$this->flashMessageContainer->add('Your new ' . $this->domainObjectName . ' was created.');
		$this->redirect('index');
	}

	/**
	 * Initialize the EDIT action which displays the edit form.
	 *
	 * @return void
	 */
	public function initializeEditAction() {
		$this->arguments->addNewArgument(t3lib_div::lcfirst($this->domainObjectName), $this->domainObjectClassName, FALSE);
	}

	/**
	 * Displays an EDIT form for an existing domain object
	 *
	 * @return string Form for editing the existing object
	 */
	public function editAction() {
		$this->view->assign(t3lib_div::lcfirst($this->domainObjectName), $this->arguments[t3lib_div::lcfirst($this->domainObjectName)]->getValue());
	}

	/**
	 * Initialize the UPDATE action, which actually UPDATES the object.
	 *
	 * @return void
	 */
	public function initializeUpdateAction() {
		$argument = $this->arguments->addNewArgument(t3lib_div::lcfirst($this->domainObjectName), $this->domainObjectClassName, TRUE);
		$argument->setValidator($this->validatorResolver->getBaseValidatorConjunction($this->domainObjectClassName));
	}

	/**
	 * Updates an existing domain object.
	 *
	 * @return void
	 */
	public function updateAction() {
		$this->repository->update($this->arguments[t3lib_div::lcfirst($this->domainObjectName)]->getValue());
		$this->flashMessageContainer->add('Your ' . $this->domainObjectName . ' has been updated.');
		$this->redirect('index');
	}

	/**
	 * Initializes the DELETE action.
	 *
	 * @return void
	 */
	public function initializeDeleteAction() {
		$this->arguments->addNewArgument(t3lib_div::lcfirst($this->domainObjectName), $this->domainObjectClassName, TRUE);
	}
	
	/**
	 * Deletes an existing domain object
	 *
	 * @return void
	 */
	public function deleteAction() {
		$this->repository->remove($this->arguments[t3lib_div::lcfirst($this->domainObjectName)]->getValue());
		$this->flashMessageContainer->add('Your ' . $this->domainObjectName . ' has been removed.');
		$this->redirect('index');
	}

	/**
	 * Initialize the SHOW action which displays the object.
	 *
	 * @return void
	 */
	public function initializeShowAction() {
		$this->arguments->addNewArgument(t3lib_div::lcfirst($this->domainObjectName), $this->domainObjectClassName, FALSE);
	}

	/**
	 * Displays the existing domain object
	 *
	 * @return string
	 */
	public function showAction() {
		$this->view->assign(t3lib_div::lcfirst($this->domainObjectName), $this->arguments[t3lib_div::lcfirst($this->domainObjectName)]->getValue());
	}
}

?>