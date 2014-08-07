<?php

namespace Adrotec\Common\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Role
 */
class Role
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
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
     * Set name
     *
     * @param string $name
     * @return Role
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set role
     *
     * @param string $role
     * @return Role
     */
    public function setRole($role)
    {
        $this->role = $role;
    
        return $this;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->role;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $userRoles;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->userRoles = new \Doctrine\Common\Collections\ArrayCollection();
        $this->groupRoles = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function __toString() {
        return $this->getRole();
    }

        /**
     * Add userRoles
     *
     * @param \Adrotec\Common\UserBundle\Entity\UserRole $userRoles
     * @return Role
     */
    public function addUserRole(\Adrotec\Common\UserBundle\Entity\UserRole $userRoles)
    {
        $this->userRoles[] = $userRoles;
    
        return $this;
    }

    /**
     * Remove userRoles
     *
     * @param \Adrotec\Common\UserBundle\Entity\UserRole $userRoles
     */
    public function removeUserRole(\Adrotec\Common\UserBundle\Entity\UserRole $userRoles)
    {
        $this->userRoles->removeElement($userRoles);
    }

    /**
     * Get userRoles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUserRoles()
    {
        return $this->userRoles;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $groupRoles;


    /**
     * Add groupRoles
     *
     * @param \Adrotec\Common\UserBundle\Entity\GroupRole $groupRoles
     * @return Role
     */
    public function addGroupRole(\Adrotec\Common\UserBundle\Entity\GroupRole $groupRoles)
    {
        $this->groupRoles[] = $groupRoles;
    
        return $this;
    }

    /**
     * Remove groupRoles
     *
     * @param \Adrotec\Common\UserBundle\Entity\GroupRole $groupRoles
     */
    public function removeGroupRole(\Adrotec\Common\UserBundle\Entity\GroupRole $groupRoles)
    {
        $this->groupRoles->removeElement($groupRoles);
    }

    /**
     * Get groupRoles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGroupRoles()
    {
        return $this->groupRoles;
    }
}
