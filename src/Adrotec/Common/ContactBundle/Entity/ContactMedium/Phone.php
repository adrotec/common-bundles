<?php

namespace Adrotec\Common\ContactBundle\Entity\ContactMedium;

use Doctrine\ORM\Mapping as ORM;

/**
 * Phone
 */
class Phone extends ContactMedium {
    /**
     * @var \Adrotec\Common\ContactBundle\Entity\ContactType\PhoneType
     */
    private $phoneType;


    /**
     * Set phoneType
     *
     * @param \Adrotec\Common\ContactBundle\Entity\ContactType\PhoneType $phoneType
     * @return Phone
     */
    public function setPhoneType(\Adrotec\Common\ContactBundle\Entity\ContactType\PhoneType $phoneType = null)
    {
        $this->phoneType = $phoneType;

        return $this;
    }

    /**
     * Get phoneType
     *
     * @return \Adrotec\Common\ContactBundle\Entity\ContactType\PhoneType 
     */
    public function getPhoneType()
    {
        return $this->phoneType;
    }
}
