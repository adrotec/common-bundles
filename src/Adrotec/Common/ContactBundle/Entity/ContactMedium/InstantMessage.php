<?php

namespace Adrotec\Common\ContactBundle\Entity\ContactMedium;

use Doctrine\ORM\Mapping as ORM;

/**
 * InstantMessage
 */
class InstantMessage extends ContactMedium {
    /**
     * @var \Adrotec\Common\ContactBundle\Entity\ContactType\InstantMessageType
     */
    private $instanMessageType;

    protected $contact;

    /**
     * Set instanMessageType
     *
     * @param \Adrotec\Common\ContactBundle\Entity\ContactType\InstantMessageType $instanMessageType
     * @return InstantMessage
     */
    public function setInstanMessageType(\Adrotec\Common\ContactBundle\Entity\ContactType\InstantMessageType $instanMessageType = null)
    {
        $this->instanMessageType = $instanMessageType;

        return $this;
    }

    /**
     * Get instanMessageType
     *
     * @return \Adrotec\Common\ContactBundle\Entity\ContactType\InstantMessageType 
     */
    public function getInstanMessageType()
    {
        return $this->instanMessageType;
    }
}
