<?php

namespace Adrotec\Common\ContactBundle\Entity\ContactMedium;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContactMedium
 */
abstract class ContactMedium {
    /**
     * @var string
     */
    protected $value;

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var \Adrotec\Common\ContactBundle\Entity\Contact
     */
    protected $contact;


    /**
     * Set value
     *
     * @param string $value
     * @return ContactMedium
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
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
     * @return ContactMedium
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
}
