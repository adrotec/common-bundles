<?php

namespace Adrotec\Common\CoreBundle;

use Doctrine\ORM\Mapping\EntityListenerResolver as EntityListenerResolverInterface;

use Symfony\Component\DependencyInjection\ContainerInterface;

class EntityListenerResolver implements EntityListenerResolverInterface
{
    
    private $container;
    
    /**
     * @var array Map to store entity listener instances.
     */
    private $instances = array();
    
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function clear($className = null)
    {
        if ($className === null) {
            $this->instances = array();

            return;
        }

        if (isset($this->instances[$className = trim($className, '\\')])) {
            unset($this->instances[$className]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function register($object)
    {
        if ( ! is_object($object)) {
            throw new \InvalidArgumentException(sprintf('An object was expected, but got "%s".', gettype($object)));
        }

        $this->instances[get_class($object)] = $object;
    }

    /**
     * {@inheritdoc}
     */
    public function resolve($className)
    {
        
        if (isset($this->instances[$className = trim($className, '\\')])) {
           return $this->instances[$className];
        }
        
        $instance = $this->container->get($className);

        return $this->instances[$className] = $instance;
    }
}