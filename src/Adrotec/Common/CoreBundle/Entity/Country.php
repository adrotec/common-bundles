<?php

namespace Adrotec\Common\CoreBundle\Entity;

/**
 * Country
 */
class Country {
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
    protected $telephoneCountryCode;

    /**
     * @var integer
     */
    protected $telephoneExitCode;

    /**
     * @var integer
     */
    protected $telephoneTrunkCode;

    /**
     * @var integer
     */
    protected $id;


    /**
     * Set code
     *
     * @param string $code
     * @return Country
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
     * @return Country
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
     * Set telephoneCountryCode
     *
     * @param integer $telephoneCountryCode
     * @return Country
     */
    public function setTelephoneCountryCode($telephoneCountryCode)
    {
        $this->telephoneCountryCode = $telephoneCountryCode;

        return $this;
    }

    /**
     * Get telephoneCountryCode
     *
     * @return integer 
     */
    public function getTelephoneCountryCode()
    {
        return $this->telephoneCountryCode;
    }

    /**
     * Set telephoneExitCode
     *
     * @param integer $telephoneExitCode
     * @return Country
     */
    public function setTelephoneExitCode($telephoneExitCode)
    {
        $this->telephoneExitCode = $telephoneExitCode;

        return $this;
    }

    /**
     * Get telephoneExitCode
     *
     * @return integer 
     */
    public function getTelephoneExitCode()
    {
        return $this->telephoneExitCode;
    }

    /**
     * Set telephoneTrunkCode
     *
     * @param integer $telephoneTrunkCode
     * @return Country
     */
    public function setTelephoneTrunkCode($telephoneTrunkCode)
    {
        $this->telephoneTrunkCode = $telephoneTrunkCode;

        return $this;
    }

    /**
     * Get telephoneTrunkCode
     *
     * @return integer 
     */
    public function getTelephoneTrunkCode()
    {
        return $this->telephoneTrunkCode;
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
