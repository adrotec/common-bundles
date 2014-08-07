<?php

namespace Adrotec\Common\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GroupUser
 */
class UserGroup
{
    /**
     * @var integer
     */
    private $groupId;

    /**
     * @var integer
     */
    private $userId;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Adrotec\Common\UserBundle\Entity\Group
     */
    private $group;

    /**
     * @var \Adrotec\Common\UserBundle\Entity\User
     */
    private $user;


    /**
     * Set groupId
     *
     * @param integer $groupId
     * @return GroupUser
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
     * Set userId
     *
     * @param integer $userId
     * @return GroupUser
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
     * @return GroupUser
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
     * Set user
     *
     * @param \Adrotec\Common\UserBundle\Entity\UserAccount $user
     * @return GroupUser
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
     * @return UserGroup
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
     * @return UserGroup
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
