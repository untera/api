<?php

namespace RestResource;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;

class PersistenceImplementation implements ServiceLocatorAwareInterface, PersistenceInterface {
	protected $services = null;
	public function save(array $data) {
		echo 'save';
		die ();
	}
	public function fetch($id) {
		$query = $this->getEntityManager ()->createQuery ( 'SELECT obj FROM \\Mapper\\Entity\\Example obj' );
		$query->setHint ( \Doctrine\ORM\Query::HINT_INCLUDE_META_COLUMNS, true ); // Needed to get the foreign key too
		$result = $query->getResult ( \Doctrine\ORM\Query::HYDRATE_ARRAY );
		$obj = $result [0];
		return $obj;
	}
	public function fetchAll() {
		$query = $this->getEntityManager ()->createQuery ( 'SELECT obj FROM \\Mapper\\Entity\\Example obj' );
		$query->setHint ( \Doctrine\ORM\Query::HINT_INCLUDE_META_COLUMNS, true ); // Needed to get the foreign key too
		$result = $query->getResult ( \Doctrine\ORM\Query::HYDRATE_ARRAY );
		return $result;
	}
	private function getEntityManager() {
		return $this->getServiceLocator ()->get ( 'doctrine.entitymanager.orm_default' );
	}
	
	// SERVICE MANAGER STUFF
	public function setServiceLocator(ServiceLocatorInterface $serviceLocator) {
		$this->services = $serviceLocator;
	}
	public function getServiceLocator() {
		return $this->services;
	}
}
