<?php
namespace Paste\Dao;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Mapper\Entity\Item;

use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as PaginatorAdapter;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
use Zend\Paginator\Paginator as ZendPaginator;

class PersistenceImplementation extends Item implements ServiceLocatorAwareInterface,PersistenceInterface {

	protected $services = null;

    public function save($data){
    	$entity = new Item();
    	$entity->setDescription('desc');
    	$entity->setDate(new \Datetime());
    	$entity->setUri('http://megusta.com');
    	$this->getEntityManager()->persist($entity);
    	$this->getEntityManager()->flush();
    	return $entity;
    }
    
    public function fetch($id){
    	$res = $this->getEntityManager()->find('\\Mapper\\Entity\\Item',$id);
    	return $res;
    }

    public function delete($id){
    		$res = $this->getEntityManager()->find('\\Mapper\\Entity\\Item',$id);
    		$this->getEntityManager()->remove($res);
    		$this->getEntityManager()->flush();
    		return true;			
    }
    
    public function update( $data){
    	$res = $this->getEntityManager()->find('\\Mapper\\Entity\\Item',$id);
    	return $res;
    }
    
    public function fetchAll(){
    	$qb = $this->getEntityManager()->createQueryBuilder();
    	$qb->select('i')->from('Mapper\\Entity\\Item', 'i')->where('1 = 1');
    	$paginator = new ZendPaginator(new PaginatorAdapter(new ORMPaginator($qb)));
    	return $paginator;
    }
    
    private function getEntityManager(){
    	return $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
    }
    
	//SERVICE MANAGER STUFF
	public function setServiceLocator(ServiceLocatorInterface $serviceLocator) {
		$this->services = $serviceLocator;
	}
	
	public function getServiceLocator() {
		return $this->services;
	}
}
