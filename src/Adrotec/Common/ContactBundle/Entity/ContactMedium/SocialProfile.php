<?php

namespace Adrotec\Common\ContactBundle\Entity\ContactMedium;

use Doctrine\ORM\Mapping as ORM;

/**
 * SocialProfile
 */
class SocialProfile extends ContactMedium {
    /**
     * @var \Adrotec\Common\ContactBundle\Entity\ContactType\SocialProfileType
     */
    private $socialProfileType;

    protected $contact;

    /**
     * Set socialProfileType
     *
     * @param \Adrotec\Common\ContactBundle\Entity\ContactType\SocialProfileType $socialProfileType
     * @return SocialProfile
     */
    public function setSocialProfileType(\Adrotec\Common\ContactBundle\Entity\ContactType\SocialProfileType $socialProfileType = null)
    {
        $this->socialProfileType = $socialProfileType;

        return $this;
    }

    /**
     * Get socialProfileType
     *
     * @return \Adrotec\Common\ContactBundle\Entity\ContactType\SocialProfileType 
     */
    public function getSocialProfileType()
    {
        return $this->socialProfileType;
    }
}
