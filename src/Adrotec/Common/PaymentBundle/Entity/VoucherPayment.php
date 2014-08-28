<?php

namespace Adrotec\Common\PaymentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VoucherPayment
 */
class VoucherPayment extends Payment {
    /**
     * @var string
     */
    private $number;

    /**
     * @var string
     */
    private $code;

    /**
     * @var \Adrotec\Common\PaymentBundle\Entity\Voucher
     */
    private $voucher;


    /**
     * Set number
     *
     * @param string $number
     * @return VoucherPayment
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return VoucherPayment
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
     * Set voucher
     *
     * @param \Adrotec\Common\PaymentBundle\Entity\Voucher $voucher
     * @return VoucherPayment
     */
    public function setVoucher(\Adrotec\Common\PaymentBundle\Entity\Voucher $voucher = null)
    {
        $this->voucher = $voucher;

        return $this;
    }

    /**
     * Get voucher
     *
     * @return \Adrotec\Common\PaymentBundle\Entity\Voucher 
     */
    public function getVoucher()
    {
        return $this->voucher;
    }
}
