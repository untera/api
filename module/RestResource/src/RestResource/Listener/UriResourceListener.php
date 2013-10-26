<?php
namespace RestResource;

use PhlyRestfully\Exception\CreationException;
use PhlyRestfully\Exception\DomainException;
use PhlyRestfully\ResourceEvent;
use Zend\EventManager\AbstractListenerAggregate;
use Zend\EventManager\EventManagerInterface;

class PasteResourceListener extends AbstractListenerAggregate
{
    protected $persistence;

    public function __construct(PersistenceInterface $persistence)
    {
        $this->persistence = $persistence;
    }

    public function attach(EventManagerInterface $events)
    {

        $this->listeners[] = $events->attach('create', array($this, 'onCreate'));
        $this->listeners[] = $events->attach('fetch', array($this, 'onFetch'));
        $this->listeners[] = $events->attach('fetchAll', array($this, 'onFetchAll'));
    }

    public function onCreate(ResourceEvent $e)
    {
        $data  = $e->getParam('data');
        $paste = $this->persistence->save($data);
        if (!$paste) {
            throw new CreationException();
        }
        return $paste;
    }

    public function onFetch(ResourceEvent $e)
    {
        $id = $e->getParam('id');
        $paste = $this->persistence->fetch($id);
        if (!$paste) {
            throw new DomainException('RestResource not found', 404);
        }
        return $paste;
    }

    public function onFetchAll(ResourceEvent $e)
    {
        return $this->persistence->fetchAll();
    }
}