<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2009 Ingmar Schlecht
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
 * Schema for a Domain Object.
 *
 * @package ExtbaseKickstarter
 * @version $ID:$
 */
class Tx_ExtbaseKickstarter_Domain_Model_DomainObject {

	/**
	 * Name of the domain object
	 * @var string
	 */
	protected $name;

	/**
	 * Description of the domain object
	 * @var string
	 */
	protected $description;

	/**
	 * If TRUE, this is an aggregate root.
	 * @var boolean
	 */
	protected $aggregateRoot;

	/**
	 * If TRUE, this is an entity. If false, it is a ValueObject
	 * @var boolean
	 */
	protected $entity;

	/**
	 * The extension this domain object belongs to.
	 * @var Tx_ExtbaseKickstarter_Domain_Model_Extension
	 */
	protected $extension;

	/**
	 * List of properties the domain object has
	 * @var array<Tx_ExtbaseKickstarter_Domain_Model_AbstractProperty>
	 */
	protected $properties = array();
	
	/**
	 * List of actions the domain object has
	 * @var array<Tx_ExtbaseKickstarter_Domain_Model_Action>
	 */
	protected $actions = array();
	
	/**
	 * Set name
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}
	
	/**
	 * Set name
	 * @param string $name Name
	 */
	public function setName($name) {
		$this->name = $name;
	}
	
	public function getClassName() {
		return 'Tx_' . Tx_Extbase_Utility_Extension::convertLowerUnderscoreToUpperCamelCase($this->extension->getExtensionKey()) . '_Domain_Model_' . $this->getName();
	}
	
	public function getControllerName() {
		return 'Tx_' . Tx_Extbase_Utility_Extension::convertLowerUnderscoreToUpperCamelCase($this->extension->getExtensionKey()) . '_Controller_' . $this->getName() . 'Controller';
	}

	public function getDatabaseTableName() {
		return 'tx_' . strtolower(Tx_Extbase_Utility_Extension::convertLowerUnderscoreToUpperCamelCase($this->extension->getExtensionKey())) . '_domain_model_' . strtolower($this->getName());
	}
	
	/**
	 * Get description
	 * @return string
	 */
	public function getDescription() {
		if($this->description){
			return $this->description;
		}else{
			return $this->getName();
		}
	}
	
	/**
	 * Set description
	 * @param string $description Description
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * get aggregate root
	 * @return boolean TRUE if it is an aggregate root, FALSE otherwise.
	 */
	public function getAggregateRoot() {
		return $this->aggregateRoot;
	}

	public function isAggregateRoot() {
		return $this->getAggregateRoot();
	}

	/**
	 * Setter for aggregate root flag
	 * @param boolean $aggregateRoot TRUE if Domain Object should be aggregate root.
	 */
	public function setAggregateRoot($aggregateRoot) {
		$this->aggregateRoot = (boolean)$aggregateRoot;
	}

	/**
	 *
	 * @return boolean TRUE if it is an entity, FALSE if it is a ValueObject
	 */
	public function getEntity() {
		return $this->entity;
	}

	/**
	 *
	 * @return boolean TRUE if it is an entity, FALSE if it is a ValueObject
	 */
	public function isEntity() {
		return $this->getEntity();
	}

	/**
	 *
	 * @param $entity $entity TRUE if it is an entity, FALSE if it is a ValueObject
	 */
	public function setEntity($entity) {
		$this->entity = (boolean)$entity;
	}
	
	/**
	 * Adding a new property
	 * @param Tx_ExtbaseKickstarter_Domain_Model_AbstractProperty $property The new property to add
	 */
	public function addProperty(Tx_ExtbaseKickstarter_Domain_Model_AbstractProperty $property) {
		$property->setDomainObject($this);
		$this->properties[] = $property;
	}

	/**
	 * Get all properties
	 * @return array<Tx_ExtbaseKickstarter_Domain_Model_AbstractProperty>
	 */
	public function getProperties() {
		return $this->properties;
	}
	
	/**
	 * Get all properties holding relations of type Property_Relation_ZeroToManyRelation
	 * @return array<Tx_ExtbaseKickstarter_Domain_Model_Property_Relation_ZeroToManyRelation>
	 */
	public function getZeroToManyRelationProperties() {
		$relationProperties = array();
		foreach ($this->properties as $property) {
			if (is_a($property, 'Tx_ExtbaseKickstarter_Domain_Model_Property_Relation_ZeroToManyRelation')) {
				$relationProperties[] = $property;
			}
		}
		return $relationProperties;
	}	
	
	/**
	 * Adding a new action
	 * @param Tx_ExtbaseKickstarter_Domain_Model_Action $action The new action to add
	 */
	public function addAction(Tx_ExtbaseKickstarter_Domain_Model_Action $action) {
		$action->setDomainObject($this);
		$this->actions[] = $action;
	}

	/**
	 * Get all actions
	 * @return array<Tx_ExtbaseKickstarter_Domain_Model_Action>
	 */
	public function getActions() {
		return $this->actions;
	}

	/**
	 * DO NOT CALL DIRECTLY! This is being called by addDomainModel() automatically.
	 * @param Tx_ExtbaseKickstarter_Domain_Model_Extension $extension the extension this domain model belongs to.
	 */
	public function setExtension(Tx_ExtbaseKickstarter_Domain_Model_Extension $extension) {
		$this->extension = $extension;
	}
	public function getExtension() {
		return $this->extension;
	}

	
	/**
	 * Get the base class for this Domain Object (different if it is entity or value object)
	 * @return string name of the base class
	 */
	public function getBaseClass() {
		if ($this->entity) {
			return 'Tx_Extbase_DomainObject_AbstractEntity';
		} else {
			return 'Tx_Extbase_DomainObject_AbstractValueObject';
		}
	}

	/**
	 * returns the name of the domain repository class name, if it is an aggregateroot.
	 */
	public function getDomainRepositoryClassName() {
		if (!$this->aggregateRoot) return '';
		return 'Tx_' . Tx_Extbase_Utility_Extension::convertLowerUnderscoreToUpperCamelCase($this->extension->getExtensionKey()) . '_Domain_Repository_' . $this->getName() . 'Repository';
	}

	public function getCommaSeparatedFieldList() {
		$fieldNames = array();
		foreach ($this->properties as $property) {
			$fieldNames[] = $property->getFieldName();
		}
		return implode(',', $fieldNames);
	}

	/**
	 * Get the label to display in the list module.
	 * TODO: Needs to be configurable. Currently, the first property is the label in the backend.
	 * @return <type> 
	 */
	public function getListModuleValueLabel() {
		if (isset($this->properties[0])) {
			return $this->properties[0]->getFieldName();
		} else {
			return 'uid';
		}
	}
	
	public function getLabelNamespace() {
		return $this->extension->getShorthandForTypoScript() . '_domain_model_' . strtolower($this->getName());
	}
}

?>