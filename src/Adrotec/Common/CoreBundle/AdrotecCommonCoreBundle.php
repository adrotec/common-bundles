<?php

namespace Adrotec\Common\CoreBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\HttpKernel\Kernel;

class AdrotecCommonCoreBundle extends Bundle {

    static public function getCommonBundles(Kernel $kernel) {
        $commonBundles = array(
            new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new \Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new \Symfony\Bundle\MonologBundle\MonologBundle(),
            new \Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new \Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new \JMS\SerializerBundle\JMSSerializerBundle($kernel),
            new \FOS\UserBundle\FOSUserBundle(),
            /* Adro bundles */
            new \Adrotec\Common\UserBundle\AdrotecCommonUserBundle(),
            new \Adrotec\Common\SecurityBundle\AdrotecCommonSecurityBundle(),
            new \Adrotec\Common\ContactBundle\AdrotecCommonContactBundle(),
            new \Adrotec\Common\CoreBundle\AdrotecCommonCoreBundle(),
            new \Adrotec\Common\FSBundle\AdrotecCommonFSBundle(),
            new \Adrotec\Common\ProfileBundle\AdrotecCommonProfileBundle(),
            new \Adrotec\Common\PaymentBundle\AdroCommonPaymentBundle(),
            new \Adro\WebApiBundle\AdrotecCommonWebApiBundle(),
        );

        $devBundles = array();
        if (in_array($kernel->getEnvironment(), array('dev', 'test'))) {
            $devBundles = array(
                new \Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
                // enable Twig
                new \Symfony\Bundle\TwigBundle\TwigBundle(),
                // enable Assetic
                new \Symfony\Bundle\AsseticBundle\AsseticBundle(),
                /* -- */

                // Adro dev bundles
                new \Adro\InstallerBundle\AdroInstallerBundle(),
                new \Acme\DemoBundle\AcmeDemoBundle(),
                new \Symfony\Bundle\WebProfilerBundle\WebProfilerBundle(),
                new \Sensio\Bundle\DistributionBundle\SensioDistributionBundle(),
                new \Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle(),
            );
        }
        return array_merge($commonBundles, $devBundles);
    }

    static protected function addNamespaceToEntityClasses(array $classes, $calledClass = null) {
        $classesAll = array();
        if ($calledClass === null) {
            $calledClass = get_called_class();
        }
        $refl = new \ReflectionClass($calledClass);
        $bundleNamespace = $refl->getNamespaceName();
        $classPrefix = explode('\\', $calledClass);
        $classPrefix = array_pop($classPrefix);
        foreach ($classes as $class) {
            $class = strtr($class, '/', '\\');
            $classParts = explode('\\', $class);
            $shortName = array_pop($classParts);
//            $classesAll[$shortName] = $classPrefix.':' . $class;
//            $classesAll[] = $classPrefix.':' . $class;
            $classesAll[$shortName] = $bundleNamespace . '\Entity\\' . $class;
        }
//        print_r($classesAll);
//        exit;
        return $classesAll;
    }

    static protected function getEntityClasses() {
        return array(
//            'CoreLookup',
            'Country',
            'Currency',
        );
    }

    static public function getAllEntityClasses() {
        $classes = (array) static::getEntityClasses();
        return static::addNamespaceToEntityClasses($classes, get_called_class());
    }

}
