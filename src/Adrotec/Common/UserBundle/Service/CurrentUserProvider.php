<?php

namespace Adrotec\Common\UserBundle\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;

use Adrotec\Common\UserBundle\Entity\User;

class CurrentUserProvider
{

    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function getToken(){
        return $this->container->get('security.context')->getToken();
    }

    /**
     * @return User the current (logged in) user
     */
    public function getUser(){
        return $this->getToken()->getUser();
    }

}
