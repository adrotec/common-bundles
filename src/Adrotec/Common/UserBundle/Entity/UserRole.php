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
     * @param \Adrotec\Common\UserBundle\Entity\User $user
     * @return UserRole
     */
    public function setUser(\Adrotec\Common\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Adrotec\Common\UserBundle\Entity\User 
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
    
}
