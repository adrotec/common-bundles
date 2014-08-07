<?php

namespace Adrotec\Common\ContactBundle\Entity\ContactMedium;

use Doctrine\ORM\Mapping as ORM;

/**
 * Email
 */
class Email extends ContactMedium {
    
    /**
     * @var \Adrotec\Common\ContactBundle\Entity\ContactType\EmailType
     */
    private $emailType;


    /**
     * Set emailType
     *
     * @param \Adrotec\Common\ContactBundle\Entity\ContactType\EmailType $emailType
     * @return Email
     */
    public function setEmailType(\Adrotec\Common\ContactBundle\Entity\ContactType\EmailType $emailType = null)
    {
        $this->emailType = $emailType;

        return $this;
    }

    /**
     * Get emailType
     *
     * @return \Adrotec\Common\ContactBundle\Entity\ContactType\EmailType 
     */
    public function getEmailType()
    {
        return $this->emailType;
    }
}
