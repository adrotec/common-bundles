<?php

namespace Adrotec\Common\UserBundle;

use Adrotec\Common\CoreBundle\AdrotecCommonCoreBundle;

class AdrotecCommonUserBundle extends AdrotecCommonCoreBundle {

    static protected function getEntityClasses() {
        return array(
            'Group',
            'GroupRole',
            'UserGroup',
            'Role',
            'User',
            'UserRole',
        );
    }

}
