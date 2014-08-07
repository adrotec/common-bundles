<?php

namespace Adrotec\Common\FSBundle;

use Adrotec\Common\CoreBundle\AdrotecCommonCoreBundle;

class AdrotecCommonFSBundle extends AdrotecCommonCoreBundle {
    static protected function getEntityClasses() {
        return array(
            'File',
//            'FileContent',
        );
    }
}