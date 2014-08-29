<?php

namespace Adrotec\Common\PaymentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Payment
 */
class Payment
{
    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var float
     */
    private $amount;

    /**
     * @var float
     */
    private $amountDefaultCurrency;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Adrotec\Common\CoreBundle\Entity\Currency
     */
    private $currency;

    /**
     * @var \Adrotec\Common\UserBundle\Entity\User
     */
    private $cachier;

    /**
     * @var \Adrotec\Common\PaymentBundle\Entity\PaymentTransaction
     */
    private $paymentTransaction;


    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Payment
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
     * @return Payment
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
     * Set amountDefaultCurrency
     *
     * @param float $amountDefaultCurrency
     * @return Payment
     */
    public function setAmountDefaultCurrency($amountDefaultCurrency)
    {
        $this->amountDefaultCurrency = $amountDefaultCurrency;

        return $this;
    }

    /**
     * Get amountDefaultCurrency
     *
     * @return float 
     */
    public function getAmountDefaultCurrency()
    {
        return $this->amountDefaultCurrency;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Payment
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
     * @param \Adrotec\Common\CoreBundle\Entity\Currency $currency
     * @return Payment
     */
    public function setCurrency(\Adrotec\Common\CoreBundle\Entity\Currency $currency = null)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return \Adrotec\Common\CoreBundle\Entity\Currency 
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set cachier
     *
     * @param \Adrotec\Common\UserBundle\Entity\User $cachier
     * @return Payment
     */
    public function setCachier(\Adrotec\Common\UserBundle\Entity\User $cachier = null)
    {
        $this->cachier = $cachier;

        return $this;
    }

    /**
     * Get cachier
     *
     * @return \Adrotec\Common\UserBundle\Entity\User 
     */
    public function getCachier()
    {
        return $this->cachier;
    }

    /**
     * Set paymentTransaction
     *
     * @param \Adrotec\Common\PaymentBundle\Entity\PaymentTransaction $paymentTransaction
     * @return Payment
     */
    public function setPaymentTransaction(\Adrotec\Common\PaymentBundle\Entity\PaymentTransaction $paymentTransaction = null)
    {
        $this->paymentTransaction = $paymentTransaction;

        return $this;
    }

    /**
     * Get paymentTransaction
     *
     * @return \Adrotec\Common\PaymentBundle\Entity\PaymentTransaction 
     */
    public function getPaymentTransaction()
    {
        return $this->paymentTransaction;
    }
}
