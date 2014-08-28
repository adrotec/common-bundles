<?php

namespace Adrotec\Common\PaymentBundle;

use Adrotec\Common\CoreBundle\AdrotecCommonCoreBundle;

class AdrotecCommonPaymentBundle extends AdrotecCommonCoreBundle {

    static protected function getEntityClasses() {
        return array(
            'Bank',
            'CardPayment',
            'CashPayment',
            'ChequePayment',
            'Payment',
            'SlipPayment',
            'VoucherPayment',
            'PaymentTransaction',
        );
    }

}
