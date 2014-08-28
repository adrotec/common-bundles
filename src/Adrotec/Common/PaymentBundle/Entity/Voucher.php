<?php

namespace Adrotec\Common\PaymentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Voucher
 */
class Voucher
{
    /**
     * @var string
     */
    private $voucherNumber;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var float
     */
    private $amount;

    /**
     * @var \DateTime
     */
    private $validFrom;

    /**
     * @var \DateTime
     */
    private $validUntil;

    /**
     * @var string
     */
    private $securityCode;

    /**
     * @var string
     */
    private $description;

    /**
     * @var boolean
     */
    private $isUsed;

    /**
     * @var boolean
     */
    private $isCancelled;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Adro\Common\CoreBundle\Entity\Currency
     */
    private $currency;

    /**
     * @var \Adrotec\Common\UserBundle\Entity\User
     */
    private $user;


    /**
     * Set voucherNumber
     *
     * @param string $voucherNumber
     * @return Voucher
     */
    public function setVoucherNumber($voucherNumber)
    {
        $this->voucherNumber = $voucherNumber;

        return $this;
    }

    /**
     * Get voucherNumber
     *
     * @return string 
     */
    public function getVoucherNumber()
    {
        return $this->voucherNumber;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Voucher
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set amount
     *
     * @param float $amount
     * @return Voucher
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return float 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set validFrom
     *
     * @param \DateTime $validFrom
     * @return Voucher
     */
    public function setValidFrom($validFrom)
    {
        $this->validFrom = $validFrom;

        return $this;
    }

    /**
     * Get validFrom
     *
     * @return \DateTime 
     */
    public function getValidFrom()
    {
        return $this->validFrom;
    }

    /**
     * Set validUntil
     *
     * @param \DateTime $validUntil
     * @return Voucher
     */
    public function setValidUntil($validUntil)
    {
        $this->validUntil = $validUntil;

        return $this;
    }

    /**
     * Get validUntil
     *
     * @return \DateTime 
     */
    public function getValidUntil()
    {
        return $this->validUntil;
    }

    /**
     * Set securityCode
     *
     * @param string $securityCode
     * @return Voucher
     */
    public function setSecurityCode($securityCode)
    {
        $this->securityCode = $securityCode;

        return $this;
    }

    /**
     * Get securityCode
     *
     * @return string 
     */
    public function getSecurityCode()
    {
        return $this->securityCode;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Voucher
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set isUsed
     *
     * @param boolean $isUsed
     * @return Voucher
     */
    public function setIsUsed($isUsed)
    {
        $this->isUsed = $isUsed;

        return $this;
    }

    /**
     * Get isUsed
     *
     * @return boolean 
     */
    public function getIsUsed()
    {
        return $this->isUsed;
    }

    /**
     * Set isCancelled
     *
     * @param boolean $isCancelled
     * @return Voucher
     */
    public function setIsCancelled($isCancelled)
    {
        $this->isCancelled = $isCancelled;

        return $this;
    }

    /**
     * Get isCancelled
     *
     * @return boolean 
     */
    public function getIsCancelled()
    {
        return $this->isCancelled;
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
     * Set currency
     *
     * @param \Adro\Common\CoreBundle\Entity\Currency $currency
     * @return Voucher
     */
    public function setCurrency(\Adro\Common\CoreBundle\Entity\Currency $currency = null)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return \Adro\Common\CoreBundle\Entity\Currency 
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set user
     *
     * @param \Adrotec\Common\UserBundle\Entity\User $user
     * @return Voucher
     */
    public function setUser(\Adrotec\Common\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Adrotec\Common\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
