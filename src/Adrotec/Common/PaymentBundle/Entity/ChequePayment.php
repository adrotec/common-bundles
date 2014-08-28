<?php

namespace Adrotec\Common\PaymentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ChequePayment
 */
class ChequePayment extends AbstractBankPayment
{
    /**
     * @var string
     */
    private $chequeNo;

    /**
     * @var \DateTime
     */
    private $chequeDate;


    /**
     * Set chequeNo
     *
     * @param string $chequeNo
     * @return ChequePayment
     */
    public function setChequeNo($chequeNo)
    {
        $this->chequeNo = $chequeNo;

        return $this;
    }

    /**
     * Get chequeNo
     *
     * @return string 
     */
    public function getChequeNo()
    {
        return $this->chequeNo;
    }

    /**
     * Set chequeDate
     *
     * @param \DateTime $chequeDate
     * @return ChequePayment
     */
    public function setChequeDate($chequeDate)
    {
        $this->chequeDate = $chequeDate;

        return $this;
    }

    /**
     * Get chequeDate
     *
     * @return \DateTime 
     */
    public function getChequeDate()
    {
        return $this->chequeDate;
    }
}
