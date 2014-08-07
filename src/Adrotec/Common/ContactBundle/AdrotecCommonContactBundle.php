<?php

namespace Adrotec\Common\ContactBundle;

use Adrotec\Common\CoreBundle\AdrotecCommonCoreBundle;

class AdrotecCommonContactBundle extends AdrotecCommonCoreBundle {

    protected static function getEntityClasses() {
        return array(
            'Address',
            'Contact',
            'ContactAddress',
            'ContactMedium/ContactMedium',
            'ContactMedium/Email',
            'ContactMedium/InstantMessage',
            'ContactMedium/Phone',
            'ContactMedium/SocialProfile',
            'ContactMedium/Url',
//            'ContactType/ContactType',
            'ContactType/AddressType',            
            'ContactType/EmailType',
            'ContactType/InstantMessageType',
            'ContactType/PhoneType',
            'ContactType/SocialProfileType',
            'ContactType/UrlType',
            'Lookup/ContactLookup',
            'Lookup/District',
        );
    }

}
