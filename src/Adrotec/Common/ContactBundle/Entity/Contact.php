<?php

namespace Adrotec\Common\ContactBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 */
class Contact
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $contactAddresses;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $phones;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $emails;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $socialProfiles;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $urls;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $instantMessages;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contactAddresses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->phones = new \Doctrine\Common\Collections\ArrayCollection();
        $this->emails = new \Doctrine\Common\Collections\ArrayCollection();
        $this->socialProfiles = new \Doctrine\Common\Collections\ArrayCollection();
        $this->urls = new \Doctrine\Common\Collections\ArrayCollection();
        $this->instantMessages = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add contactAddresses
     *
     * @param \Adrotec\Common\ContactBundle\Entity\ContactAddress $contactAddresses
     * @return Contact
     */
    public function addContactAddress(\Adrotec\Common\ContactBundle\Entity\ContactAddress $contactAddresses)
    {
        $this->contactAddresses[] = $contactAddresses;

        return $this;
    }

    /**
     * Remove contactAddresses
     *
     * @param \Adrotec\Common\ContactBundle\Entity\ContactAddress $contactAddresses
     */
    public function removeContactAddress(\Adrotec\Common\ContactBundle\Entity\ContactAddress $contactAddresses)
    {
        $this->contactAddresses->removeElement($contactAddresses);
    }

    /**
     * Get contactAddresses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContactAddresses()
    {
        return $this->contactAddresses;
    }

    /**
     * Add phones
     *
     * @param \Adrotec\Common\ContactBundle\Entity\ContactMedium\Phone $phones
     * @return Contact
     */
    public function addPhone(\Adrotec\Common\ContactBundle\Entity\ContactMedium\Phone $phones)
    {
        $this->phones[] = $phones;

        return $this;
    }

    /**
     * Remove phones
     *
     * @param \Adrotec\Common\ContactBundle\Entity\ContactMedium\Phone $phones
     */
    public function removePhone(\Adrotec\Common\ContactBundle\Entity\ContactMedium\Phone $phones)
    {
        $this->phones->removeElement($phones);
    }

    /**
     * Get phones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPhones()
    {
        return $this->phones;
    }

    /**
     * Add emails
     *
     * @param \Adrotec\Common\ContactBundle\Entity\ContactMedium\Email $emails
     * @return Contact
     */
    public function addEmail(\Adrotec\Common\ContactBundle\Entity\ContactMedium\Email $emails)
    {
        $this->emails[] = $emails;

        return $this;
    }

    /**
     * Remove emails
     *
     * @param \Adrotec\Common\ContactBundle\Entity\ContactMedium\Email $emails
     */
    public function removeEmail(\Adrotec\Common\ContactBundle\Entity\ContactMedium\Email $emails)
    {
        $this->emails->removeElement($emails);
    }

    /**
     * Get emails
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * Add socialProfiles
     *
     * @param \Adrotec\Common\ContactBundle\Entity\ContactMedium\SocialProfile $socialProfiles
     * @return Contact
     */
    public function addSocialProfile(\Adrotec\Common\ContactBundle\Entity\ContactMedium\SocialProfile $socialProfiles)
    {
        $this->socialProfiles[] = $socialProfiles;

        return $this;
    }

    /**
     * Remove socialProfiles
     *
     * @param \Adrotec\Common\ContactBundle\Entity\ContactMedium\SocialProfile $socialProfiles
     */
    public function removeSocialProfile(\Adrotec\Common\ContactBundle\Entity\ContactMedium\SocialProfile $socialProfiles)
    {
        $this->socialProfiles->removeElement($socialProfiles);
    }

    /**
     * Get socialProfiles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSocialProfiles()
    {
        return $this->socialProfiles;
    }

    /**
     * Add urls
     *
     * @param \Adrotec\Common\ContactBundle\Entity\ContactMedium\Url $urls
     * @return Contact
     */
    public function addUrl(\Adrotec\Common\ContactBundle\Entity\ContactMedium\Url $urls)
    {
        $this->urls[] = $urls;

        return $this;
    }

    /**
     * Remove urls
     *
     * @param \Adrotec\Common\ContactBundle\Entity\ContactMedium\Url $urls
     */
    public function removeUrl(\Adrotec\Common\ContactBundle\Entity\ContactMedium\Url $urls)
    {
        $this->urls->removeElement($urls);
    }

    /**
     * Get urls
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUrls()
    {
        return $this->urls;
    }

    /**
     * Add instantMessages
     *
     * @param \Adrotec\Common\ContactBundle\Entity\ContactMedium\InstantMessage $instantMessages
     * @return Contact
     */
    public function addInstantMessage(\Adrotec\Common\ContactBundle\Entity\ContactMedium\InstantMessage $instantMessages)
    {
        $this->instantMessages[] = $instantMessages;

        return $this;
    }

    /**
     * Remove instantMessages
     *
     * @param \Adrotec\Common\ContactBundle\Entity\ContactMedium\InstantMessage $instantMessages
     */
    public function removeInstantMessage(\Adrotec\Common\ContactBundle\Entity\ContactMedium\InstantMessage $instantMessages)
    {
        $this->instantMessages->removeElement($instantMessages);
    }

    /**
     * Get instantMessages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInstantMessages()
    {
        return $this->instantMessages;
    }
}
