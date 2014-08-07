<?php

// src/Acme/UserBundle/Entity/User.php

namespace Adrotec\Common\UserBundle\Entity;

//use FOS\UserBundle\Model\User as BaseUser;
use Adrotec\Common\UserBundle\Entity\Base\User as BaseUser;

/**
 * User
 */
class UserAccount extends BaseUser {

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $userRoles;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Add userRoles
     *
     * @param \Adrotec\Common\UserBundle\Entity\UserRole $userRoles
     * @return User
     */
    public function addUserRole(\Adrotec\Common\UserBundle\Entity\UserRole $userRoles) {
        $this->userRoles[] = $userRoles;

        return $this;
    }

    /**
     * Remove userRoles
     *
     * @param \Adrotec\Common\UserBundle\Entity\UserRole $userRoles
     */
    public function removeUserRole(\Adrotec\Common\UserBundle\Entity\UserRole $userRoles) {
        $this->userRoles->removeElement($userRoles);
    }

    /**
     * Get userRoles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUserRoles() {
        return $this->userRoles;
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $userGroups;

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
        $this->userGroups = new \Doctrine\Common\Collections\ArrayCollection();
        $this->userRoles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add userGroups
     *
     * @param \Adrotec\Common\UserBundle\Entity\UserGroup $userGroups
     * @return User
     */
    public function addGroupUser(\Adrotec\Common\UserBundle\Entity\UserGroup $userGroups) {
        $this->userGroups[] = $userGroups;

        return $this;
    }

    /**
     * Remove userGroups
     *
     * @param \Adrotec\Common\UserBundle\Entity\UserGroup $userGroups
     */
    public function removeGroupUser(\Adrotec\Common\UserBundle\Entity\UserGroup $userGroups) {
        $this->userGroups->removeElement($userGroups);
    }

    /**
     * Get userGroups
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUserGroups() {
        return $this->userGroups;
    }

    public function getGroups() {
        if ($this->getUserGroups()) {
            if (!$this->groups || empty($this->groups)) {
                $this->groups = new \Doctrine\Common\Collections\ArrayCollection();
            }
            foreach ($this->getUserGroups() as $groupUser) {
                $this->groups[] = $groupUser->getGroup();
            }
        }
        $groups = parent::getGroups();
//        print_r($roles);
//        exit;
        return $groups;
    }

    public function getRoles() {
        if (!$this->roles || empty($this->roles)) {
            $this->roles = array();
        }
        if ($this->getUserRoles()) {
            foreach ($this->getUserRoles() as $userRole) {
                $this->roles[] = $userRole->getRole()->getRole();
            }
        }
        $roles = parent::getRoles();
//        print_r($roles);
//        exit;
        return array_values($roles);
    }

    private $credentials;

    public function getCredentials() {
        
    }

    public function setCredentials($credentials) {
        $credentials = explode('}{', $credentials);
        if (isset($credentials[0]) && !empty($credentials[0])) {
            $this->setSalt($credentials[0]);
        }
        if (isset($credentials[1]) && !empty($credentials[1])) {
            $this->setPassword($credentials[1]);
        }
//        $this->credentials = $credentials;
    }

    /**
     * Add userGroups
     *
     * @param \Adrotec\Common\UserBundle\Entity\UserGroup $userGroups
     * @return UserAccount
     */
    public function addUserGroup(\Adrotec\Common\UserBundle\Entity\UserGroup $userGroups) {
        $this->userGroups[] = $userGroups;

        return $this;
    }

    /**
     * Remove userGroups
     *
     * @param \Adrotec\Common\UserBundle\Entity\UserGroup $userGroups
     */
    public function removeUserGroup(\Adrotec\Common\UserBundle\Entity\UserGroup $userGroups) {
        $this->userGroups->removeElement($userGroups);
    }

}
