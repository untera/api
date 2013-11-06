<?php
namespace Paste\Hydrator;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\Stdlib\Hydrator\HydratorPluginManager;

abstract class ResourceHydrator implements ServiceLocatorAwareInterface {

	protected $pluginManager;
	protected $serviceLocator;
	
	public function setPluginManager(HydratorPluginManager $pluginManager) {
		if (! isset ( $this->pluginManager )) {
			$this->pluginManager = $pluginManager;
			$this->setServiceLocator ( $this->getPluginManager ()->getServiceLocator () );
		}
		return $this;
	}
	
	public function getPluginManager() {
		return $this->pluginManager;
	}
	
	public function setServiceLocator(ServiceLocatorInterface $serviceLocator) {
		if (! isset ( $this->serviceLocator )) {
			$this->serviceLocator = $serviceLocator;
		}
		return $this;
	}
	
	public function getServiceLocator() {
		return $this->serviceLocator;
	}
}
