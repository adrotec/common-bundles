<?php

namespace Adrotec\Common\UserBundle\Controller;

use Adro\Breeze\Doctrine2ProviderBundle\Adapter\ClassInfo;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Adrotec\Common\UserBundle\AdrotecCommonUserBundle;

use Adrotec\Common\WebApiBundle\Controller\WebApiController;

class ApiController extends WebApiController {
    
    public function getClientNamespace() {
        return 'Adro.Api';
    }
    
    public function getClientClasses() {
        $classes = AdrotecCommonUserBundle::getAllEntityClasses();
        return $classes;
    }
}
