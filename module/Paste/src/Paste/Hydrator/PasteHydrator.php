<?php 
namespace Paste\Hydrator;
use Zend\Stdlib\Hydrator\HydratorInterface;
use Zend\Stdlib\Hydrator\HydratorProviderInterface;
use Mapper\Entity\Item;

class PasteHydrator extends ResourceHydrator implements HydratorInterface
{
	
	public function extract($object){
		$sol=array();
		$sol['id']=$object->getId();
		$sol['uri']=$object->getUri();
		$sol['description']=$object->getDescription();
		$sol['description']=$object->getDescription();
		$sol['date']=$object->getDate();
		$sol['metadataItem']=$object->getMetadataItem();
		return $sol;
	}

	public function hydrate(array $data, $object){
		$object->setId($data['id']);
		$object->setUri($data['uri']);
		$object->setDescription($data['description']);
		$object->setDescription($data['description']);
		$object->setDate($data['date']);
		$object->setMetadataItem($data['metadataItem']);
		return $object;
	}
}
