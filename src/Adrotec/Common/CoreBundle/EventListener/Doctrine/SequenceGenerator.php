<?php

namespace Adrotec\Common\CoreBundle\EventListener\Doctrine;

use Doctrine\ORM\Event\LifecycleEventArgs;
//use Adrotec\Common\CoreBundle\EventListener\Doctrine\HasSequenceInterface;

class SequenceGenerator {

    public function prePersist(LifecycleEventArgs $args) {
//        exit('testing event');
        $entity = $args->getEntity();

        if ($entity instanceof HasSequenceInterface) {
            $alias = 'e';
            $entityManager = $args->getEntityManager();
            $whereCondition = $entity->sequenceConditionWhere($alias);
            $params = $entity->sequenceConditionParameters();
            $sequenceProperty = $entity->getSequenceProperty();
            $dql = 'SELECT MAX(' . $alias . '.' . ($sequenceProperty ? $sequenceProperty 
                    : 'sequenceNo') . ') AS maxSequence FROM ' . get_class($entity) . ' '.$alias
                    . ($whereCondition ? ' WHERE ' . $whereCondition : '');

            $query = $entityManager->createQuery($dql);
            if (!empty($params)) {
                $query->setParameters($params);
            }

            $maxSequence = $query->getSingleScalarResult();
//            40/18 park road colombo 5;
            if ($maxSequence) {
                $entity->setSequenceValue($maxSequence + 1);
            } else {
                $entity->setSequenceValue(1);
            }
        }
    }

}