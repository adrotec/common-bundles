<?php

namespace Adrotec\Common\FSBundle\Entity;

/**
 * AbstractFile
 */
class AbstractFile
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $extension;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var string
     */
    private $mimeType;

    /**
     * @var \DateTime
     */
    private $modifiedAt;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Adrotec\Common\FSBundle\Entity\FileContent
     */
    private $fileContent;

    /**
     * Set name
     *
     * @param string $name
     * @return AbstractFile
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set extension
     *
     * @param string $extension
     * @return AbstractFile
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extension
     *
     * @return string 
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return AbstractFile
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set mimeType
     *
     * @param string $mimeType
     * @return AbstractFile
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;

        return $this;
    }

    /**
     * Get mimeType
     *
     * @return string 
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * Set modifiedAt
     *
     * @param \DateTime $modifiedAt
     * @return AbstractFile
     */
    public function setModifiedAt($modifiedAt)
    {
        $this->modifiedAt = $modifiedAt;

        return $this;
    }

    /**
     * Get modifiedAt
     *
     * @return \DateTime 
     */
    public function getModifiedAt()
    {
        return $this->modifiedAt;
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
     * Set fileContent
     *
     * @param \Adrotec\Common\FSBundle\Entity\FileContent $fileContent
     * @return AbstractFile
     */
    public function setFileContent(\Adrotec\Common\FSBundle\Entity\FileContent $fileContent = null)
    {
        $this->fileContent = $fileContent;

        return $this;
    }

    /**
     * Get fileContent
     *
     * @return \Adrotec\Common\FSBundle\Entity\FileContent 
     */
    public function getFileContent()
    {
        return $this->fileContent;
    }
    
    // FILE uploading specific stuff
    
    private $contentBase64;
    private $file;
    private $temp;
    
    public function setContentBase64($contentBase64){
        $this->contentBase64 = $contentBase64;
        return $this;
    }
    
    public function getContentBase64(){
        return $this->contentBase64;
    }
    
    public function setFile($file){
        $this->file = $file;
    }
    
    public function getFile(){
        return $this->file;
    }
    
    public function setTemp($temp){
        $this->temp = $temp;
    }
    
    public function getTemp(){
        return $this->temp;
    }
}
