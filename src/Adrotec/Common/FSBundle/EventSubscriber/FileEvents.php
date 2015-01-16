<?php

namespace Adrotec\Common\FSBundle\EventSubscriber;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Adrotec\Common\FSBundle\Entity\AbstractFile as FileInterface;
use Adrotec\Common\FSBundle\Entity\FileContent;

class FileEvents implements EventSubscriber
{

    const PRE_PERSIST = 'prePersist';
    const PRE_UPDATE = 'preUpdate';
    const POST_PERSIST = 'postPersist';
    const POST_UPDATE = 'postUpdate';
    const PRE_REMOVE = 'preRemove';
    const POST_REMOVE = 'postRemove';
    const POST_LOAD = 'postLoad';

    private $fileManager;

    public function __construct(FileManager $fileManager)
    {
        $this->fileManager = $fileManager;
    }

    public function getSubscribedEvents()
    {
        return array(
            self::PRE_PERSIST,
            self::PRE_UPDATE,
            self::POST_PERSIST,
            self::POST_UPDATE,
            self::PRE_REMOVE,
            self::POST_REMOVE,
            self::POST_LOAD,
        );
    }

    public function getFileManager()
    {
        if ($this->fileManager === null) {
            $this->fileManager = new FileManager();
        }
        return $this->fileManager;
    }

    protected function invoke($method, LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $entityManager = $args->getEntityManager();
        if ($entity instanceof FileInterface) {
            $fileManager = $this->getFileManager();
//            if($method == self::PRE_PERSIST 
//                    && !$entity->getFileContent() && $entity->getContentBase64()){
//                $fileContent = new FileContent();
//                $fileContent->setContentBase64($entity->getContentBase64());
//                $entity->setFileContent($fileContent);
//                $entityManager->persist($fileContent);
//            }
            $fileManager->$method($entity);
        }
    }
    
    public function __call($name, $arguments)
    {
        $events = $this->getSubscribedEvents();
        if(in_array($name, $events)){
            $this->invoke($name, $arguments[0]);
        }
    }

    /*
    public function prePersist(LifecycleEventArgs $args)
    {
        $this->invoke(self::PRE_PERSIST, $args);
    }

    public function preUpdate(LifecycleEventArgs $args)
    {
        $this->invoke(self::PRE_UPDATE, $args);
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $this->invoke(self::POST_PERSIST, $args);
    }

    public function postUpdate(LifecycleEventArgs $args)
    {
        $this->invoke(self::POST_UPDATE, $args);
    }

    public function preRemove(LifecycleEventArgs $args)
    {
        $this->invoke(self::PRE_REMOVE, $args);
    }

    public function postRemove(LifecycleEventArgs $args)
    {
        $this->invoke(self::POST_REMOVE, $args);
    }

    public function postLoad(LifecycleEventArgs $args)
    {
        $this->invoke(self::POST_LOAD, $args);
    } 
    //*/

}
