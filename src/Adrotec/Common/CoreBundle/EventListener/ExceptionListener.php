<?php

namespace Adrotec\Common\CoreBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationCredentialsNotFoundException;
use Symfony\Component\Security\Core\Exception\InsufficientAuthenticationException;
//use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

use Symfony\Component\HttpKernel\KernelInterface;

use Symfony\Component\DependencyInjection\ContainerInterface;

class ExceptionListener {
    
    private $container;
    
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    private function getHttpErrorMessage($code = 500) {
        $code = intval($code);
        $messages = array(
            400 => 'Bad Request',
            401 => 'Unauthorized',
            403 => 'Access Denied',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            // server errors
            500 => 'Internal Server Error'
        );
        if(isset($messages[$code])){
            return $messages[$code];
        }
        return $messages[500];
    }

    public function onKernelException(GetResponseForExceptionEvent $event) {
        
        $debug = $this->container->getParameter('kernel.debug');
        $request = $event->getRequest();
        $jsonOnly = in_array('application/json', $request->getAcceptableContentTypes());
        if($debug && !$jsonOnly){
            return;
        }
        
        // You get the exception object from the received event
        $exception = $event->getException();

        // Customize your response object to display the exception details
        $response = new Response();
        
        // HttpExceptionInterface is a special type of exception that
        // holds status code and header details
        if ($exception instanceof HttpExceptionInterface) {
            $response->headers->replace($exception->getHeaders());
            $statusCode = $exception->getStatusCode();
        } 
        else if($exception instanceof AuthenticationCredentialsNotFoundException || $exception instanceof InsufficientAuthenticationException){
            $statusCode = 401;
        }
        else {
            $statusCode = 500;
        }
//exit($statusCode . ': ' .get_class($exception) . ' : ' . $exception->getMessage());

        $response->setStatusCode($statusCode);
//        $response->setContent(json_encode(array('error' => $this->getHttpErrorMessage($statusCode))));
        $response->setContent(json_encode(array('error' => $exception->getMessage())));

        // Send the modified response object to the event
        $event->setResponse($response);
    }

}