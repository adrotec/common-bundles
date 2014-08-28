<?php

namespace Adrotec\Common\UserBundle\Entity;

/**
 * User
 */
class Group extends Base\Group {

    /**
     * @var integer
     */
    protected $id;
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $groupRoles;


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
     * Add groupRoles
     *
     * @param \Adrotec\Common\UserBundle\Entity\GroupRole $groupRoles
     * @return Group
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

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $userGroups;

    /**
     * Constructor
     */
        public function __construct($name = null, $roles = array())
    {
        parent::__construct($name, $roles);
        $this->userGroups = new \Doctrine\Common\Collections\ArrayCollection();
        $this->groupRoles = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add userGroups
     *
     * @param \Adrotec\Common\UserBundle\Entity\UserGroup $userGroups
     * @return Group
     */
    public function addGroupUser(\Adrotec\Common\UserBundle\Entity\UserGroup $userGroups)
    {
        $this->userGroups[] = $userGroups;
    
        return $this;
    }

    /**
     * Remove userGroups
     *
     * @param \Adrotec\Common\UserBundle\Entity\UserGroup $userGroups
     */
    public function removeGroupUser(\Adrotec\Common\UserBundle\Entity\UserGroup $userGroups)
    {
        $this->userGroups->removeElement($userGroups);
    }

    /**
     * Get userGroups
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUserGroups()
    {
        return $this->userGroups;
    }
    
    
    public function getRoles() {
        $this->roles = (array) $this->roles;
        if ($this->getGroupRoles()) {
            foreach ($this->getGroupRoles() as $groupRole) {
                $this->roles[] = $groupRole->getRole()->getRole();
            }
        }
        $roles = parent::getRoles();
//        print_r($roles);
//        exit;
        return $roles;
    }

    /**
     * Add userGroups
     *
     * @param \Adrotec\Common\UserBundle\Entity\UserGroup $userGroups
     * @return Group
     */
    public function addUserGroup(\Adrotec\Common\UserBundle\Entity\UserGroup $userGroups)
    {
        $this->userGroups[] = $userGroups;

        return $this;
    }

    /**
     * Remove userGroups
     *
     * @param \Adrotec\Common\UserBundle\Entity\UserGroup $userGroups
     */
    public function removeUserGroup(\Adrotec\Common\UserBundle\Entity\UserGroup $userGroups)
    {
        $this->userGroups->removeElement($userGroups);
    }
}
