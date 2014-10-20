<?php

// src/Acme/UserBundle/Entity/User.php

namespace Adrotec\Common\UserBundle\Entity;

/**
 * User
 */
class User extends Base\User {

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $userRoles;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $userGroups;

    /**
     * @var \Adrotec\Common\ContactBundle\Entity\Contact
     */
    private $contact;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var \Adrotec\Common\FSBundle\Entity\File
     */
    private $picture;

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
        $this->userGroups = new \Doctrine\Common\Collections\ArrayCollection();
        $this->userRoles = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * @return User
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

    /**
     * Set contact
     *
     * @param \Adrotec\Common\ContactBundle\Entity\Contact $contact
     * @return User
     */
    public function setContact(\Adrotec\Common\ContactBundle\Entity\Contact $contact = null)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return \Adrotec\Common\ContactBundle\Entity\Contact 
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set picture
     *
     * @param \Adrotec\Common\FSBundle\Entity\File $picture
     * @return User
     */
    public function setPicture(\Adrotec\Common\FSBundle\Entity\File $picture = null)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return \Adrotec\Common\FSBundle\Entity\File 
     */
    public function getPicture()
    {
        return $this->picture;
    }
    /**
     * @var string
     */
    private $name;


    /**
     * Set name
     *
     * @param string $name
     * @return User
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
     * @var boolean
     */
    private $isOrg;


    /**
     * Set isOrg
     *
     * @param boolean $isOrg
     * @return User
     */
    public function setIsOrg($isOrg)
    {
        $this->isOrg = $isOrg;

        return $this;
    }

    /**
     * Get isOrg
     *
     * @return boolean 
     */
    public function getIsOrg()
    {
        return $this->isOrg;
    }
}
