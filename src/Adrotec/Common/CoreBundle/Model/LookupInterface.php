<?php

namespace Adrotec\Common\CoreBundle\Model;

interface LookupInterface {
    
    /**
     * Set name
     *
     * @param string $name
     * @return LookupInterface
     */
    public function setName($name);

    /**
     * Get name
     *
     * @return string 
     */
    public function getName();

    /**
     * Set code
     *
     * @param string $code
     * @return LookupInterface
     */
    public function setCode($code);

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode();

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId();
    
}
