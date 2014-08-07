<?php

namespace Adrotec\Common\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GroupRole
 */
class GroupRole
{
    /**
     * @var integer
     */
    private $groupId;

    /**
     * @var integer
     */
    private $roleId;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Adrotec\Common\UserBundle\Entity\Group
     */
    private $group;

    /**
     * @var \Adrotec\Common\UserBundle\Entity\Role
     */
    private $role;


    /**
     * Set groupId
     *
     * @param integer $groupId
     * @return GroupRole
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;
    
        return $this;
    }

    /**
     * Get groupId
     *
     * @return integer 
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * Set roleId
     *
     * @param integer $roleId
     * @return GroupRole
     */
    public function setRoleId($roleId)
    {
        $this->roleId = $roleId;
    
        return $this;
    }

    /**
     * Get roleId
     *
     * @return integer 
     */
    public function getRoleId()
    {
        return $this->roleId;
    }

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
     * Set group
     *
     * @param \Adrotec\Common\UserBundle\Entity\Group $group
     * @return GroupRole
     */
    public function setGroup(\Adrotec\Common\UserBundle\Entity\Group $group = null)
    {
        $this->group = $group;
    
        return $this;
    }

    /**
     * Get group
     *
     * @return \Adrotec\Common\UserBundle\Entity\Group 
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set role
     *
     * @param \Adrotec\Common\UserBundle\Entity\Role $role
     * @return GroupRole
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
