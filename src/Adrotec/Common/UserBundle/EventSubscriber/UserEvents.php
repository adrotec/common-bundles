<?php

namespace Adrotec\Common\UserBundle\EventSubscriber;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Adrotec\Common\UserBundle\Entity\User;

class UserEvents implements EventSubscriber
{

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
        if ($entity instanceof User) {
            $name = trim($entity->getFirstName() . ' ' . $entity->getLastName());
            $entity->setName($name);
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
