<?php

namespace Adrotec\Common\PaymentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbstractBankPayment
 */
abstract class AbstractBankPayment extends Payment {
    /**
     * @var \Adrotec\Common\PaymentBundle\Entity\Bank
     */
    private $bank;


    /**
     * Set bank
     *
     * @param \Adrotec\Common\PaymentBundle\Entity\Bank $bank
     * @return AbstractBankPayment
     */
    public function setBank(\Adrotec\Common\PaymentBundle\Entity\Bank $bank = null)
    {
        $this->bank = $bank;

        return $this;
    }

    /**
     * Get bank
     *
     * @return \Adrotec\Common\PaymentBundle\Entity\Bank 
     */
    public function getBank()
    {
        return $this->bank;
    }
}
