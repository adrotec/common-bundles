<?php

namespace Adrotec\Common\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserRole
 */
class UserRole
{
    /**
     * @var integer
     */
    private $userId;

    /**
     * @var integer
     */
    private $roleId;

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
     * Set userId
     *
     * @param integer $userId
     * @return UserRole
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    
        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set roleId
     *
     * @param integer $roleId
     * @return UserRole
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
     * @var integer
     */
    private $userAccountId;

    /**
     * @var \Adrotec\Common\UserBundle\Entity\UserAccount
     */
    private $userAccount;


    /**
     * Set userAccountId
     *
     * @param integer $userAccountId
     * @return UserRole
     */
    public function setUserAccountId($userAccountId)
    {
        $this->userAccountId = $userAccountId;

        return $this;
    }

    /**
     * Get userAccountId
     *
     * @return integer 
     */
    public function getUserAccountId()
    {
        return $this->userAccountId;
    }

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
