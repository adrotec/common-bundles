<?php

namespace Adrotec\Common\ContactBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContactAddress
 */
class ContactAddress {
    /**
     * @var integer
     */
    private $contactId;

    /**
     * @var integer
     */
    private $addressId;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Adrotec\Common\ContactBundle\Entity\Contact
     */
    private $contact;

    /**
     * @var \Adrotec\Common\ContactBundle\Entity\Address
     */
    private $address;


    /**
     * Set contactId
     *
     * @param integer $contactId
     * @return ContactAddress
     */
    public function setContactId($contactId)
    {
        $this->contactId = $contactId;

        return $this;
    }

    /**
     * Get contactId
     *
     * @return integer 
     */
    public function getContactId()
    {
        return $this->contactId;
    }

    /**
     * Set addressId
     *
     * @param integer $addressId
     * @return ContactAddress
     */
    public function setAddressId($addressId)
    {
        $this->addressId = $addressId;

        return $this;
    }

    /**
     * Get addressId
     *
     * @return integer 
     */
    public function getAddressId()
    {
        return $this->addressId;
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
     * Set contact
     *
     * @param \Adrotec\Common\ContactBundle\Entity\Contact $contact
     * @return ContactAddress
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
     * Set address
     *
     * @param \Adrotec\Common\ContactBundle\Entity\Address $address
     * @return ContactAddress
     */
    public function setAddress(\Adrotec\Common\ContactBundle\Entity\Address $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \Adrotec\Common\ContactBundle\Entity\Address 
     */
    public function getAddress()
    {
        return $this->address;
    }
    /**
     * @var integer
     */
    private $addressTypeId;

    /**
     * @var \Adrotec\Common\ContactBundle\Entity\ContactType\AddressType
     */
    private $addressType;


    /**
     * Set addressTypeId
     *
     * @param integer $addressTypeId
     * @return ContactAddress
     */
    public function setAddressTypeId($addressTypeId)
    {
        $this->addressTypeId = $addressTypeId;

        return $this;
    }

    /**
     * Get addressTypeId
     *
     * @return integer 
     */
    public function getAddressTypeId()
    {
        return $this->addressTypeId;
    }

    /**
     * Set addressType
     *
     * @param \Adrotec\Common\ContactBundle\Entity\ContactType\AddressType $addressType
     * @return ContactAddress
     */
    public function setAddressType(\Adrotec\Common\ContactBundle\Entity\ContactType\AddressType $addressType = null)
    {
        $this->addressType = $addressType;

        return $this;
    }

    /**
     * Get addressType
     *
     * @return \Adrotec\Common\ContactBundle\Entity\ContactType\AddressType 
     */
    public function getAddressType()
    {
        return $this->addressType;
    }
}
