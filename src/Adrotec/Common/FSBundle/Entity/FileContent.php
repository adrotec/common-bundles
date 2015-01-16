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
        if(is_resource($this->contentBinary)){
            return base64_encode(stream_get_contents($this->contentBinary));
        }
        
        $fileManager = new \Adrotec\Common\FSBundle\EventSubscriber\FileManager();
        $fileManager->setUploadDir('/media/adrotec/Magnet/server/data/uploads');
        if($this->getFile()){
            $content = $fileManager->getContent($this->getFile());
            if($content){
                return base64_encode($content);
            }
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
    /**
     * @var \Adrotec\Common\FSBundle\Entity\File
     */
    private $file;


    /**
     * Set file
     *
     * @param \Adrotec\Common\FSBundle\Entity\File $file
     * @return FileContent
     */
    public function setFile(\Adrotec\Common\FSBundle\Entity\File $file = null)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return \Adrotec\Common\FSBundle\Entity\File 
     */
    public function getFile()
    {
        return $this->file;
    }
}
