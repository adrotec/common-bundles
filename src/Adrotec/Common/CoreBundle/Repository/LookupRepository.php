<?php

namespace Adrotec\Common\CoreBundle\Repository;

use Doctrine\ORM\EntityRepository;

use Doctrine\ORM\NoResultException;

class LookupRepository extends EntityRepository {

    public function findOneByCode($code) {
        $qb = $this->createQueryBuilder('lookup');
        $qb->where('lookup.code = :code')
                ->setMaxResults(1)
                ->setParameter('code', $code);
        $query = $qb->getQuery();
        try {
            $result = $query->getSingleResult();
        }
        catch(NoResultException $e){
            $result = new $this->_class->name();
            $result->setCode($code);
            $this->_em->persist($result);
            $this->_em->flush($result);
        }
        return $result;
    }

}