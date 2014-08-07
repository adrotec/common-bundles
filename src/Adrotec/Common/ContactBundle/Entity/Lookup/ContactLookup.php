<?php

namespace Adrotec\Common\ContactBundle\Entity\Lookup;

use Adrotec\Common\CoreBundle\Model\LookupInterface;

class ContactLookup implements LookupInterface {
    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var integer
     */
    protected $id;


    /**
     * Set code
     *
     * @param string $code
     * @return ContactLookup
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return ContactLookup
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
