<?php

// src/Acme/UserBundle/Entity/UserRepository.php

namespace Adrotec\Common\UserBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

class UserRepository extends EntityRepository {

    private $usernameColumn = 'usernameCanonical';

//    public function findAll() {
//        return parent::findAll();
//    }
    public function findOneBy(array $criteria, array $orderBy = null) {
        $usernameColumn = $this->usernameColumn;
        if (count($criteria) === 1 && isset($criteria[$usernameColumn])) {
            return $this->findByUsernameColumn($criteria[$usernameColumn], true, true);
        }
        return parent::findOneBy($criteria, $orderBy);
    }

    public function findByUsernameColumn($username, $joinRoles = false, $joinGroups = false) {
        $usernameColumn = $this->usernameColumn;
        $queryBuilder = $this
                ->createQueryBuilder('u')
//                ->select('u, ur, ug, r, g')
                ->where('u.' . $usernameColumn . ' = :username')
                ->setParameter('username', $username);
        if ($joinRoles && $joinGroups) {
            $queryBuilder->select('u, ur, r, ug, g');
        }
        else if($joinRoles){
            $queryBuilder->select('u, ur, r');
        }
        else if($joinGroups){
            $queryBuilder->select('u, ug, g');
        }
        else {
            $queryBuilder->select('u');
        }
        if ($joinRoles) {
            $queryBuilder->leftJoin('u.userRoles', 'ur')
                    ->leftJoin('ur.role', 'r');
        }
        if ($joinGroups) {
            $queryBuilder->leftJoin('u.userGroups', 'ug')
                    ->leftJoin('ug.group', 'g');
        }
        $query = $queryBuilder->getQuery();
        try {
            return $query->getSingleResult();
        } catch (NoResultException $e) {
            return null;
        }
    }

}