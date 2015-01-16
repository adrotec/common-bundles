<?php

namespace Adrotec\Common\UserBundle\EventSubscriber;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Adrotec\Common\UserBundle\Entity\User;
use Adrotec\Common\UserBundle\CurrentUserAwareInterface;
use Adrotec\Common\UserBundle\Service\CurrentUserProvider;

class CurrentUserEvents implements EventSubscriber
{
    
    private $currentUserProvider;
    
    public function __construct(CurrentUserProvider $currentUserProvider)
    {
        $this->currentUserProvider = $currentUserProvider;
    }

    public function getSubscribedEvents()
    {
        return array(
            'prePersist',
            'preUpdate',
        );
    }

    protected function preSave(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        if(method_exists($entity, 'setUser')){
            $entity->setUser($this->currentUserProvider->getUser());
        }
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $this->preSave($args);
    }

    public function preUpdate(LifecycleEventArgs $args)
    {
        $this->preSave($args);
    }

}
