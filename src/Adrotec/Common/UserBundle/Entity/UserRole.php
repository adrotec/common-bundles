<?php

namespace Adrotec\Common\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserRole
 */
class UserRole {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Adrotec\Common\UserBundle\Entity\User
     */
    private $user;

    /**
     * @var \Adrotec\Common\UserBundle\Entity\Role
     */
    private $role;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set user
     *
     * @param \Adrotec\Common\UserBundle\Entity\UserAccount $user
     * @return UserRole
     */
    public function setUser(\Adrotec\Common\UserBundle\Entity\UserAccount $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Adrotec\Common\UserBundle\Entity\UserAccount 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set role
     *
     * @param \Adrotec\Common\UserBundle\Entity\Role $role
     * @return UserRole
     */
    public function setRole(\Adrotec\Common\UserBundle\Entity\Role $role = null)
    {
        $this->role = $role;
    
        return $this;
    }

    /**
     * Get role
     *
     * @return \Adrotec\Common\UserBundle\Entity\Role 
     */
    public function getRole()
    {
        return $this->role;
    }
 
    /**
     * @var \Adrotec\Common\UserBundle\Entity\UserAccount
     */
    private $userAccount;

    /**
     * Set userAccount
     *
     * @param \Adrotec\Common\UserBundle\Entity\UserAccount $userAccount
     * @return UserRole
     */
    public function setUserAccount(\Adrotec\Common\UserBundle\Entity\UserAccount $userAccount = null)
    {
        $this->userAccount = $userAccount;

        return $this;
    }

    /**
     * Get userAccount
     *
     * @return \Adrotec\Common\UserBundle\Entity\UserAccount 
     */
    public function getUserAccount()
    {
        return $this->userAccount;
    }
}
