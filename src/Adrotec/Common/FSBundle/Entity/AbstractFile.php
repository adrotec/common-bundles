<?php

namespace Adrotec\Common\FSBundle\Entity;

use Symfony\Component\HttpFoundation\File\File as PhysicalFile;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;

abstract class AbstractFile {

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $extension;

    /**
     * @var string
     */
    protected $content;

    /**
     * @var string
     */
    protected $contentBase64;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var string
     */
    protected $mimeType;

    /**
     * @var \DateTime
     */
    protected $modifiedAt;

    /**
     * Set name
     *
     * @param string $name
     * @return File
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set extension
     *
     * @param string $extension
     * @return File
     */
    public function setExtension($extension) {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extension
     *
     * @return string 
     */
    public function getExtension() {
        return $this->extension;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return File
     */
    public function setContent($content) {
        /*
        $tmpfname = tempnam(sys_get_temp_dir(), 'uf_');

        $handle = fopen($tmpfname, "w");
        fwrite($handle, $content);
        fclose($handle);
        // do here something
//                $file = new PhysicalFile($tmpfname);
        $file = new UploadedFile($tmpfname, $this->name, $this->mimeType, null, null, true);

        $this->setFile($file);

//                unlink($tmpfname);
//*/
        $this->content = $content;
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent() {
        if($this->content){
            return stream_get_contents($this->content);
        }
        /*
        if ($this->content) {
            return $this->content;
        }
        if ($this->contentBase64) {
            return $this->content = base64_decode($this->contentBase64);
        } else {
//            return $this->content = @file_get_contents(realpath($this->getAbsolutePath()));
        }
        //*/
        return false;
    }

    /**
     * Set contentBase64
     *
     * @param string $contentBase64
     * @return File
     */
    public function setContentBase64($contentBase64) {
        if (//false && 
                $contentBase64) {
            if ($base64Decoded = base64_decode($contentBase64)) {
                $this->contentBase64 = null;
                return $this->setContent($base64Decoded);
            } else {
                
            }
        }
        $this->contentBase64 = $contentBase64;
        return $this;
    }

    /**
     * Get contentBase64
     *
     * @return string 
     */
    public function getContentBase64() {
        return null;
        if ($this->contentBase64) {
            return $this->contentBase64;
        } else {
            return base64_encode(@file_get_contents(realpath($this->getAbsolutePath())));
        }
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return File
     */
    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt() {
        return $this->createdAt;
    }

    /**
     * Set mimeType
     *
     * @param string $mimeType
     * @return File
     */
    public function setMimeType($mimeType) {
        $this->mimeType = $mimeType;

        return $this;
    }

    /**
     * Get mimeType
     *
     * @return string 
     */
    public function getMimeType() {
        return $this->mimeType;
    }

    /**
     * Set modifiedAt
     *
     * @param \DateTime $modifiedAt
     * @return File
     */
    public function setModifiedAt($modifiedAt) {
        $this->modifiedAt = $modifiedAt;

        return $this;
    }

    /**
     * Get modifiedAt
     *
     * @return \DateTime 
     */
    public function getModifiedAt() {
        return $this->modifiedAt;
    }

    /*     * *** CUSTOM METHODS */

    // file handling

    protected $temp;

    /**
     *
     * @var File
     */
    protected $file;

    public function setFile(PhysicalFile $file = null) {
        $this->file = $file;
//        print_r($this->getFile());
//        echo $this->getUploadRootDir()."\n\n";
//        echo 'REAL: '.realpath($this->getUploadRootDir())."\n\n";
//        echo 'IS DIR?: '.  is_dir($this->getUploadRootDir())."\n\n";
//        throw new \Exception("WORKING setFile ..'");
        if (is_file($this->getAbsolutePath())) {
            $this->temp = $this->getAbsolutePath();
        } else {
//            $this->extension = 'bin';
        }
        $this->modifiedAt = new \DateTime(null, new \DateTimeZone('UTC'));
    }

    public function getFile() {
        return $this->file;
    }

    public function getAbsolutePath() {
        return null === $this->extension ? null : $this->getUploadRootDir() . '/' . $this->getId() . '.' . $this->extension;
    }

//    public function getWebPath() {
//        return null === $this->extension ? null : $this->getUploadDir() . '/' . $this->id . '.' . $this->extension;
//    }

    protected function getUploadRootDir() {
        // the absolute diretory path where uploaded documents should be saved
//        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
        return __DIR__ . '/../../../../../data/' . $this->getUploadDir();
    }

    protected function getUploadDir() {
        // the relative path
        return 'uploads';
    }

    protected function loadFile() {
        try {
//            $this->file = new File($this->getAbsolutePath());
        } catch (/* FileNotFoundException instanceof */ FileException $e) {
            
        }
    }

    protected function preUpload() {
        if (null !== $this->getFile()) {
            try {
                $this->extension = $this->getFile()->guessExtension();
            } catch (\Exception $e) {
//                throw $e;
                $this->extension = str_replace('image/', '', $this->mimeType);
            }
        }
    }

    protected function upload() {
//        if($this->file)
//        throw new \Exception("WORKING upload ..'");
        if (null === $this->getFile()) {
            return;
        }

        if (!($this->getFile() instanceof UploadedFile)) {
//            return;
        }

        if (isset($this->temp)) {
            unlink($this->temp);
            $this->temp = null;
        }


        $this->getFile()->move(
                $this->getUploadRootDir(), $this->getId() . '.' . $this->extension
        );

        $this->setFile(null);
    }

    protected function storeFilenameForRemove() {
        $this->temp = $this->getAbsolutePath();
    }

    protected function removeUpload() {
        if (isset($this->temp)) {
            if (!@unlink($this->temp)) {
                $error = error_get_last();
                throw new FileException(sprintf('Could not remove the file "%s" (%s)', $this->temp, strip_tags($error['message'])));
            }
        }
    }

    public function prePersist() {
        $this->preUpload();
        $this->createdAt = new \DateTime(null, new \DateTimeZone('UTC'));
    }

    public function preUpdate() {
        $this->preUpload();
        $this->modifiedAt = new \DateTime(null, new \DateTimeZone('UTC'));
    }

    public function postPersist() {
        $this->upload();
    }

    public function postUpdate() {
        $this->upload();
    }

    public function preRemove() {
        $this->storeFilenameForRemove();
    }

    public function postRemove() {
        $this->removeUpload();
    }

    public function postLoad() {
        $this->loadFile();
    }

    /**
     * @var integer
     */
    protected $id;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

}