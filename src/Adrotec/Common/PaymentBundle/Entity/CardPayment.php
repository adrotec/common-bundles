<?php

namespace Adrotec\Common\PaymentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CardPayment
 */
class CardPayment extends AbstractBankPayment
{
    /**
     * @var string
     */
    private $cardNo;


    /**
     * Set cardNo
     *
     * @param string $cardNo
     * @return CardPayment
     */
    public function setCardNo($cardNo)
    {
        $this->cardNo = $cardNo;

        return $this;
    }

    /**
     * Get cardNo
     *
     * @return string 
     */
    public function getCardNo()
    {
        return $this->cardNo;
    }
}
