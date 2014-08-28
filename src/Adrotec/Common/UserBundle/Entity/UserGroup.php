<?php

namespace Adrotec\Common\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GroupUser
 */
class UserGroup {

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
     * @var \Adrotec\Common\UserBundle\Entity\UserAccount
     */
    private $userAccount;

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
