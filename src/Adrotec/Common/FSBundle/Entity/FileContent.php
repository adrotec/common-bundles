<?php

namespace Adrotec\Common\FSBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FileContent
 */
class FileContent
{
    /**
     * @var string
     */
    private $contentBinary;

    /**
     * @var string
     */
    private $contentBase64;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set contentBinary
     *
     * @param string $contentBinary
     * @return FileContent
     */
    public function setContentBinary($contentBinary)
    {
        $this->contentBinary = $contentBinary;

        return $this;
    }

    /**
     * Get contentBinary
     *
     * @return string 
     */
    public function getContentBinary()
    {
        return $this->contentBinary;
    }

    /**
     * Set contentBase64
     *
     * @param string $contentBase64
     * @return FileContent
     */
    public function setContentBase64($contentBase64)
    {
        $this->contentBase64 = $contentBase64;

        return $this;
    }

    /**
     * Get contentBase64
     *
     * @return string 
     */
    public function getContentBase64()
    {
        if($this->contentBinary){
            return base64_encode($this->contentBase64);
        }
        return $this->contentBase64;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}