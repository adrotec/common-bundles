<?php

namespace Adrotec\Common\FSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpFoundation\Response;

class FileNotFoundException extends \Exception {
    
}

class FileContentNotFoundException extends \Exception {
    
}

class FileController extends Controller {

    protected function fileContentNotAvailable($fileEntity) {
        
    }
    
    protected function getFileEntityClass(){
        return 'AdrotecCommonFSBundle:File';
    }

    protected function getErrorImage($message) {
        $message = explode(' ', $message);
        $text1 = $message[0];
        unset($message[0]);
        $text2 = implode(' ', $message);
        return '<?xml version="1.0"?>
<svg xmlns="http://www.w3.org/2000/svg" height="300px" width="300px" version="1.0" viewBox="-300 -300 600 600" xml:space="preserve">
<circle stroke="#AAA" stroke-width="10" r="280" fill="#FFF"/>
<text style="letter-spacing:1;text-anchor:middle;text-align:center;stroke-opacity:.5;stroke:#000;stroke-width:2;fill:#444;font-size:360px;font-family:Bitstream Vera Sans,Liberation Sans, Arial, sans-serif;line-height:125%;writing-mode:lr-tb;" transform="scale(.2)">
<tspan y="-40" x="8">' . $text1 . '</tspan>
<tspan y="400" x="8">' . $text2 . '</tspan>
</text>
</svg>';
    }

    protected function getErrorImageResponse($message) {
        $response = new Response();
        $response->headers->set('Content-Type', 'image/svg+xml');
        $response->setContent($this->getErrorImage($message));
        return $response;
    }

    protected function getFileResponse($fileId) {
        $em = $this->getDoctrine()->getManager();
        $fileEntity = $em->find($this->getFileEntityClass(), $fileId);
//        $fileEntity = $em->find('AdroInstituteBundle:Photo', $fileId);
        if ($fileEntity) {
//            $response->headers->set('Cache-Control', 'private');
//            $fileEntity->getFileType();
//        $response->setContent($this->get('serializer')->serialize($fileEntity, 'json'));
//            print_r($fileEntity->getFileType()->getCode());

//            $content = $fileEntity->getContent();
//            $fileManager = new \Adrotec\Common\FSBundle\EventSubscriber\FileManager();
            $fileManager = $this->container->get('adrotec_fs.file_manager');
            $content = $fileManager->getContent($fileEntity);
            if ($content) {
                $response = new Response();
                $response->headers->set('Content-Type', $fileEntity->getMimeType());
                $response->setContent($content);
                return $response;
            } else {
//                $response->setContent(@file_get_contents(realpath($fileEntity->getAbsolutePath())));
                throw new FileContentNotFoundException();
            }
        }
        throw new FileNotFoundException();
    }

    public function fileAction($fileId) {
        try {
            $response = $this->getFileResponse($fileId);
        } catch (FileContentNotFoundException $e) {
            $response = $this->getErrorImageResponse('CONTENT UNAVAILABLE');
            $response->setStatusCode(404, 'CONTENT UNAVAILABLE');
        } catch (FileNotFoundException $e) {
            $response = $this->getErrorImageResponse('NO FILE');
            $response->setStatusCode(404, 'NO FILE');
        }
//            $response->headers->set('Cache-Control', 'private, max-age=60'); // 1 minute
        $response->setPrivate();
        $response->setMaxAge(60);
        return $response;
    }

}
