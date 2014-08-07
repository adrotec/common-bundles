<?php

namespace Adrotec\Common\ContactBundle\Entity\ContactMedium;

use Doctrine\ORM\Mapping as ORM;

/**
 * Url
 */
class Url extends ContactMedium {
    /**
     * @var \Adrotec\Common\ContactBundle\Entity\ContactType\UrlType
     */
    private $urlType;


    /**
     * Set urlType
     *
     * @param \Adrotec\Common\ContactBundle\Entity\ContactType\UrlType $urlType
     * @return Url
     */
    public function setUrlType(\Adrotec\Common\ContactBundle\Entity\ContactType\UrlType $urlType = null)
    {
        $this->urlType = $urlType;

        return $this;
    }

    /**
     * Get urlType
     *
     * @return \Adrotec\Common\ContactBundle\Entity\ContactType\UrlType 
     */
    public function getUrlType()
    {
        return $this->urlType;
    }
}
