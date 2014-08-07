<?php

namespace Adrotec\Common\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Currency
 */
class Currency
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $symbol;

    /**
     * @var boolean
     */
    private $symbolEncoded;

    /**
     * @var integer
     */
    private $countryId;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Adrotec\Common\CoreBundle\Entity\Country
     */
    private $country;


    /**
     * Set code
     *
     * @param string $code
     * @return Currency
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
     * @return Currency
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
     * Set symbol
     *
     * @param string $symbol
     * @return Currency
     */
    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;

        return $this;
    }

    /**
     * Get symbol
     *
     * @return string 
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * Set symbolEncoded
     *
     * @param boolean $symbolEncoded
     * @return Currency
     */
    public function setSymbolEncoded($symbolEncoded)
    {
        $this->symbolEncoded = $symbolEncoded;

        return $this;
    }

    /**
     * Get symbolEncoded
     *
     * @return boolean 
     */
    public function getSymbolEncoded()
    {
        return $this->symbolEncoded;
    }

    /**
     * Set countryId
     *
     * @param integer $countryId
     * @return Currency
     */
    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;

        return $this;
    }

    /**
     * Get countryId
     *
     * @return integer 
     */
    public function getCountryId()
    {
        return $this->countryId;
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
     * Set country
     *
     * @param \Adrotec\Common\CoreBundle\Entity\Country $country
     * @return Currency
     */
    public function setCountry(\Adrotec\Common\CoreBundle\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \Adrotec\Common\CoreBundle\Entity\Country 
     */
    public function getCountry()
    {
        return $this->country;
    }
}
