<?php

namespace Adrotec\Common\UserBundle\EventSubscriber;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Adrotec\Common\UserBundle\Entity\User;
use Adrotec\Common\UserBundle\CurrentUserAwareInterface;
use Adrotec\Common\UserBundle\Service\CurrentUserProvider;

use Symfony\Component\Security\Core\SecurityContextInterface;


use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class AuthorizationSubscriber implements EventSubscriber
{
    
    private $currentUserProvider;
    private $securityContext;
    private $container;

    public function __construct(CurrentUserProvider $currentUserProvider, $container)
    {
        $this->currentUserProvider = $currentUserProvider;
        $this->container = $container;
    }
    
    private function loadSecurityContext(){
        if($this->securityContext === null){
            $this->setSecurityContext($this->container->get('security.context'));
        }
    }


    public function setSecurityContext(SecurityContextInterface $securityContext){
        $this->securityContext = $securityContext;
    }

    public function getSubscribedEvents()
    {
        return array(
            'prePersist',
            'preUpdate',
            'preRemove',
            'postLoad',
        );
    }
    
    public function postLoad(LifecycleEventArgs $args)
    {
        $this->loadSecurityContext();
        $this->preSave($args);
    }

    protected function preSave(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
//        $res = $this->securityContext->isGranted('IS_AUTHENTICATED_ANONYMOUSLY');
//        $res = $this->securityContext->isGranted('ROLE_SUPER_ADMIN');
//        $allowed = $this->securityContext->isGranted('view', $entity);
//        if(!$allowed){
////            throw new AccessDeniedException('NO! ');
//        }
//        var_dump($res);
//        exit;
//        if(method_exists($entity, 'setUser')){
//            $entity->setUser($this->currentUserProvider->getUser());
//        }
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $this->loadSecurityContext();
        $this->preSave($args);
    }

    public function preUpdate(LifecycleEventArgs $args)
    {
        $this->loadSecurityContext();
        $this->preSave($args);
    }

    public function preRemove(LifecycleEventArgs $args)
    {
        $this->loadSecurityContext();
    }

}
