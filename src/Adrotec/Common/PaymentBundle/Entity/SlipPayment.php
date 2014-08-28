<?php

namespace Adrotec\Common\PaymentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SlipPayment
 */
class SlipPayment extends AbstractBankPayment
{
    /**
     * @var string
     */
    private $slipNo;


    /**
     * Set slipNo
     *
     * @param string $slipNo
     * @return SlipPayment
     */
    public function setSlipNo($slipNo)
    {
        $this->slipNo = $slipNo;

        return $this;
    }

    /**
     * Get slipNo
     *
     * @return string 
     */
    public function getSlipNo()
    {
        return $this->slipNo;
    }
}
