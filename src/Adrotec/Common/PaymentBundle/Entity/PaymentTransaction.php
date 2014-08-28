<?php

namespace Adrotec\Common\PaymentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PaymentTransaction
 */
class PaymentTransaction
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $cardPayments;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $slipPayments;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $chequePayments;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $voucherPayments;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $cashPayments;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $payments;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cardPayments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->slipPayments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->chequePayments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->voucherPayments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cashPayments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->payments = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add cardPayments
     *
     * @param \Adrotec\Common\PaymentBundle\Entity\CardPayment $cardPayments
     * @return PaymentTransaction
     */
    public function addCardPayment(\Adrotec\Common\PaymentBundle\Entity\CardPayment $cardPayments)
    {
        $this->cardPayments[] = $cardPayments;

        return $this;
    }

    /**
     * Remove cardPayments
     *
     * @param \Adrotec\Common\PaymentBundle\Entity\CardPayment $cardPayments
     */
    public function removeCardPayment(\Adrotec\Common\PaymentBundle\Entity\CardPayment $cardPayments)
    {
        $this->cardPayments->removeElement($cardPayments);
    }

    /**
     * Get cardPayments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCardPayments()
    {
        return $this->cardPayments;
    }

    /**
     * Add slipPayments
     *
     * @param \Adrotec\Common\PaymentBundle\Entity\SlipPayment $slipPayments
     * @return PaymentTransaction
     */
    public function addSlipPayment(\Adrotec\Common\PaymentBundle\Entity\SlipPayment $slipPayments)
    {
        $this->slipPayments[] = $slipPayments;

        return $this;
    }

    /**
     * Remove slipPayments
     *
     * @param \Adrotec\Common\PaymentBundle\Entity\SlipPayment $slipPayments
     */
    public function removeSlipPayment(\Adrotec\Common\PaymentBundle\Entity\SlipPayment $slipPayments)
    {
        $this->slipPayments->removeElement($slipPayments);
    }

    /**
     * Get slipPayments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSlipPayments()
    {
        return $this->slipPayments;
    }

    /**
     * Add chequePayments
     *
     * @param \Adrotec\Common\PaymentBundle\Entity\ChequePayment $chequePayments
     * @return PaymentTransaction
     */
    public function addChequePayment(\Adrotec\Common\PaymentBundle\Entity\ChequePayment $chequePayments)
    {
        $this->chequePayments[] = $chequePayments;

        return $this;
    }

    /**
     * Remove chequePayments
     *
     * @param \Adrotec\Common\PaymentBundle\Entity\ChequePayment $chequePayments
     */
    public function removeChequePayment(\Adrotec\Common\PaymentBundle\Entity\ChequePayment $chequePayments)
    {
        $this->chequePayments->removeElement($chequePayments);
    }

    /**
     * Get chequePayments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChequePayments()
    {
        return $this->chequePayments;
    }

    /**
     * Add voucherPayments
     *
     * @param \Adrotec\Common\PaymentBundle\Entity\VoucherPayment $voucherPayments
     * @return PaymentTransaction
     */
    public function addVoucherPayment(\Adrotec\Common\PaymentBundle\Entity\VoucherPayment $voucherPayments)
    {
        $this->voucherPayments[] = $voucherPayments;

        return $this;
    }

    /**
     * Remove voucherPayments
     *
     * @param \Adrotec\Common\PaymentBundle\Entity\VoucherPayment $voucherPayments
     */
    public function removeVoucherPayment(\Adrotec\Common\PaymentBundle\Entity\VoucherPayment $voucherPayments)
    {
        $this->voucherPayments->removeElement($voucherPayments);
    }

    /**
     * Get voucherPayments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVoucherPayments()
    {
        return $this->voucherPayments;
    }

    /**
     * Add cashPayments
     *
     * @param \Adrotec\Common\PaymentBundle\Entity\CashPayment $cashPayments
     * @return PaymentTransaction
     */
    public function addCashPayment(\Adrotec\Common\PaymentBundle\Entity\CashPayment $cashPayments)
    {
        $this->cashPayments[] = $cashPayments;

        return $this;
    }

    /**
     * Remove cashPayments
     *
     * @param \Adrotec\Common\PaymentBundle\Entity\CashPayment $cashPayments
     */
    public function removeCashPayment(\Adrotec\Common\PaymentBundle\Entity\CashPayment $cashPayments)
    {
        $this->cashPayments->removeElement($cashPayments);
    }

    /**
     * Get cashPayments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCashPayments()
    {
        return $this->cashPayments;
    }

    /**
     * Add payments
     *
     * @param \Adrotec\Common\PaymentBundle\Entity\Payment $payments
     * @return PaymentTransaction
     */
    public function addPayment(\Adrotec\Common\PaymentBundle\Entity\Payment $payments)
    {
        $this->payments[] = $payments;

        return $this;
    }

    /**
     * Remove payments
     *
     * @param \Adrotec\Common\PaymentBundle\Entity\Payment $payments
     */
    public function removePayment(\Adrotec\Common\PaymentBundle\Entity\Payment $payments)
    {
        $this->payments->removeElement($payments);
    }

    /**
     * Get payments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPayments()
    {
        return $this->payments;
    }
}
