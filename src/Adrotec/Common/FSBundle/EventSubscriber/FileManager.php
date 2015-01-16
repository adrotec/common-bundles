<?php

namespace Adrotec\Common\FSBundle\EventSubscriber;

use Adrotec\Common\FSBundle\Entity\AbstractFile as FileInterface;
use Symfony\Component\HttpFoundation\File\File as PhysicalFile;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;
use Symfony\Component\HttpKernel\KernelInterface;

class FileManager
{

    private $tempPaths = array();
    private $tempUploads = array();
    private $uploadDir;

    public function __construct(KernelInterface $kernel = null)
    {
        if($kernel){
            $this->uploadDir = $kernel->getRootDir() . '/../data/uploads';
        }
    }

    protected function removeTemp(FileInterface $file, $throwException = false)
    {
        $tmp = $this->getTemp($file);
        if ($tmp) {
            if (!@unlink($tmp)) {
                if ($throwException) {
                    $error = error_get_last();
                    throw new FileException(sprintf('Could not remove the file "%s" (%s)'
                            , $tmp, strip_tags($error['message'])));
                }
            }
            $this->setTemp($file, null);
        }
    }

    protected function setTemp(FileInterface $file, $tmp)
    {
        return $file->setTemp($tmp);
//        $id = $this->getFileId($file);
//        $this->tempPaths[$id] = $tmp;
    }

    protected function getTemp(FileInterface $file)
    {
        return $file->getTemp();
//        $id = $this->getFileId($file);
//        if (isset($this->tempPaths[$id])) {
//            $this->tempPaths[$id];
//        }
//        return null;
    }

    protected function setUploadedFile(FileInterface $file, PhysicalFile $uploadedFile = null)
    {
        return $file->setFile($uploadedFile);
//        $id = $this->getFileId($file);
//        $this->tempUploads[$id] = $uploadedFile;
    }

    protected function getUploadedFile(FileInterface $file)
    {
        return $file->getFile();
//        $id = $this->getFileId($file);
//        if (isset($this->tempUploads[$id])) {
//            $this->tempUploads[$id];
//        }
//        return null;
    }

    public function setUploadDir($uploadDir)
    {
        $this->uploadDir = $uploadDir;
    }

    public function getUploadDir()
    {
        return $this->uploadDir;
    }

    public function getAbsolutePath(FileInterface $file)
    {
        return null === $file->getExtension() ? null :
                $this->getUploadDir() . '/' . $file->getId() . '.' . $file->getExtension();
    }

    public function setContent(FileInterface $file)
    {
//        $content = null;
//        $fileContent = $file->getFileContent();
//        if($fileContent){
//            $content = base64_decode($fileContent->getContentBase64());
//        }
//        var_dump($file->getContentBase64());
//        exit;
        $content = base64_decode($file->getContentBase64());

        if (!$content) {
            return null;
        }

        //*
        $tmpfname = tempnam(sys_get_temp_dir(), 'uf_');

        $handle = fopen($tmpfname, "w");

        fwrite($handle, $content);
        fclose($handle);
        // do here something
//                $file = new PhysicalFile($tmpfname);
        $uploadedFile = new UploadedFile($tmpfname, $file->getName(), $file->getMimeType(), null, null, true);

        $this->setUploadedFile($file, $uploadedFile);

        return $uploadedFile;

//                unlink($tmpfname);
//*/
        $fileContent = $file->getFileContent();
        if (!$fileContent) {
            $fileContent = new FileContent();
        }
        $fileContent->setContentBinary($content);
//        $this->setFileContent($fileContent);
        $this->content = $content;
        return $this;
    }

    public function getContent(FileInterface $file)
    {
        $fileContent = $file->getFileContent();
        if ($fileContent) {
            $contentBinary = $fileContent->getContentBinary();
//            $contentBase64 = $fileContent->getContentBase64();
            if ($contentBinary) {
                return stream_get_contents($contentBinary);
            }
//            else if ($contentBase64) {
//                return base64_decode($contentBase64);
//            }
        }
        return @file_get_contents(realpath($this->getAbsolutePath($file)));
    }

    protected function preSave(FileInterface $file)
    {
        $tmp = $this->getAbsolutePath($file);
        $this->setTemp($file, $tmp);
        $uploadedFile = $this->setContent($file);
        $file->setContentBase64(null);
        // preUpload
        if (null !== $uploadedFile) {
            try {
                $file->setModifiedAt(new \DateTime(null, new \DateTimeZone('UTC')));
                $file->setExtension($uploadedFile->guessExtension());
            } catch (\Exception $e) {
//                throw $e;
                $file->setExtension(str_replace('image/', '', $file->getMimeType()));
            };
        }
//        print_r($uploadedFile);
//        exit('PRE SAVED! - WHAT? - '.$tmp.' , '.
//                $this->getUploadDir().'/:ID/'
//                . $file->getExtension());
    }

    protected function postSave(FileInterface $file)
    {
//        if($this->file)
//        throw new \Exception("WORKING upload ..'");
        $uploadedFile = $this->getUploadedFile($file);
        if (null === $uploadedFile) {
            return;
        }

        if (!($uploadedFile instanceof UploadedFile)) {
//            return;
        }

        $this->removeTemp($file);

        $fileName = $file->getId() . '.' . $file->getExtension();
        $uploadedFile->move($this->getUploadDir(), $fileName);

        $this->setUploadedFile($file, null);
    }

    public function prePersist(FileInterface $file)
    {
        $this->preSave($file);
        $file->setCreatedAt(new \DateTime(null, new \DateTimeZone('UTC')));
    }

    public function preUpdate(FileInterface $file)
    {
        $this->preSave($file);
        $file->setModifiedAt(new \DateTime(null, new \DateTimeZone('UTC')));
    }

    public function postPersist(FileInterface $file)
    {
        $this->postSave($file);
    }

    public function postUpdate(FileInterface $file)
    {
        $this->postSave($file);
    }

    public function preRemove(FileInterface $file)
    {
        $tmp = $this->getAbsolutePath($file);
        if ($tmp) {
            $this->setTemp($file, $tmp);
        }
    }

    public function postRemove(FileInterface $file)
    {
        $this->removeTemp($file, true);
    }

    public function postLoad(FileInterface $file)
    {
        // noop
    }

}
