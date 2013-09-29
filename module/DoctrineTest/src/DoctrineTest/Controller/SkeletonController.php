<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/DoctrineTest for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace DoctrineTest\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Doctrine\ORM\EntityManager;
use DoctrineTest\ontroller\Cmyclase;

class SkeletonController extends AbstractActionController implements ServiceLocatorAwareInterface
{
	
    public function indexAction()
    {
    	var_dump($this->getAll());
    	echo 'hello';die;
        return array();
    }
    
    public function getAll() {
    	$query = $this->getEntityManager()->createQuery('SELECT obj FROM \\Mapper\\Entity\\Example obj');
    	$query->setHint(\Doctrine\ORM\Query::HINT_INCLUDE_META_COLUMNS, true); //Needed to get the foreign key too
    	$result = $query->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
    	return $result;
    }

    public function fooAction()
    {
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /skeleton/skeleton/foo
        return array();
    }
    
    //SERVICE MANAGER STUFF
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator) {
    	$this->services = $serviceLocator;
    	//$this->entityManager = $serviceLocator->get('doctrine_entity_manager');
    }
    
    public function getServiceLocator() {
    	return $this->services;
    }
    
    private function getEntityManager(){
    	return $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
    }
}
