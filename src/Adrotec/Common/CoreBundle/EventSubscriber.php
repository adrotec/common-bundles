<?php

namespace Adrotec\Common\CoreBundle;

use Doctrine\Common\EventSubscriber as EventSubscriberInterface;
use Doctrine\ORM\Event\LifecycleEventArgs;

class EventSubscriber implements EventSubscriberInterface
{

    protected $manager;

    const PRE_PERSIST = 'prePersist';
    const POST_PERSIST = 'postPersist';
    const PRE_UPDATE = 'preUpdate';
    const POST_UPDATE = 'postUpdate';
    const PRE_REMOVE = 'preRemove';
    const POST_REMOVE = 'postRemove';
    const POST_LOAD = 'postLoad';

    public function getManager()
    {
        return $this->getManager();
    }

    public function getSubscribedEvents()
    {
        return array(
//            self::PRE_PERSIST,
//            self::POST_PERSIST,
//            self::PRE_UPDATE,
//            self::POST_UPDATE,
//            self::PRE_REMOVE,
//            self::POST_REMOVE,
//            self::POST_LOAD
        );
    }

    protected function preSave(LifecycleEventArgs $args, $mode = 'update')
    {
        $entity = $args->getEntity();
        if ($entity instanceof Complaint) {
            $listener = new \Adro\ComplaintBoxBundle\Listener\ComplaintListener
                    ($args->getEntityManager());
            $listener->prePersist($entity);
        }
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $this->preSave($args, 'persist');
    }

    public function preUpdate(LifecycleEventArgs $args)
    {
//        $this->preSave($args, 'update');
    }

    public function __call($name, $arguments)
    {
        $events = $this->getSubscribedEvents();
        if (in_array($name, $events)) {
            if(!$this->manager){
//                $this->manager = $
            }
            return call_user_func_array(array($this, $name), $arguments);
        }
    }

}
