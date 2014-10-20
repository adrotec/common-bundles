<?php

namespace Adrotec\Common\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Adrotec\Common\UserBundle\Entity\User;

use FOS\UserBundle\Model\UserInterface;

class UserController extends Controller {

    protected function enableCors($response) {
        $origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '*';
        $response->headers->set('Access-Control-Allow-Origin', $origin);
        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, OPTIONS');
//        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Authorization, x-wsse');
        return $response;
    }

    public function loginAction(Request $request) {
        // $response = array('error' => 'Invalid Username or password');
        $response = array();
        $username = $request->getMethod() == 'POST' ? $request->request->get('username') : false;
//        $username = $request->query->get('username'); // for testing only
        if ($username) {
            $em = $this->getDoctrine()->getManager();
            $repository = $em->getRepository('AdrotecCommonUserBundle:User');
            if ($user = $repository->findByUsernameColumn($username)) {
                $response['salt'] = $user->getSalt();
            }
            else {
                // always return a salt for security reasons!
                // salt in FOSUserBundle style!
                // make sure same salt is returned for a particular username
                $response['salt'] = base_convert(sha1('P*65zp+'.$username.'k81sqq$$#'), 16, 36);
            }
        }
        return new \Symfony\Component\HttpFoundation\JsonResponse($response);
//        $responseText = json_encode($response);
        $responseText = $this->get('serializer')->serialize($response, 'json');
        $response = new Response($responseText);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function accountAction(Request $request){

        $response = array('error' => 'Failed');

        $existingPasswordEncrypted = null;

        $securityContext = $this->get('security.context');
        /* @var $securityContext \Symfony\Component\Security\Core\SecurityContext */
        $token = $securityContext->getToken();
        $user = $token->getUser();

        if ($token->isAuthenticated() && $user instanceof UserInterface) {
            $existingPasswordEncrypted = $user->getPassword();
            $credentials = $request->request->get('credentials');
            $hash = $request->request->get('hash');
//            $response
            $response['password'] = $existingPasswordEncrypted;
            $existingHash = hash('sha256', $credentials.'{'.$existingPasswordEncrypted.'}');
            $response['existingHash'] = $existingHash;
            $response['req'] = $request->request->all();
            if($hash == $existingHash){
                unset($response['error']);
                $response['success'] = true;
                $user->setCredentials($credentials);
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
            }
            else {
                $response['error'] = 'Invalid hash';
            }
        }
        else {
            $response['error'] = 'Invalid User';
        }

        $responseText = json_encode($response);
//        $responseText = $this->get('serializer')->serialize($response, 'json');
        $response = new Response($responseText, 201);
//        $response->headers->set('Content-Type', 'application/json');
        return $response;

        // $info = '{"newCredentials":"208f9ffc1309dfddad694575545934004780eee1cde2c89c0b3eddb3b3398fe8}{be4a0b06d206809fd3e31399093b08bb0cb566d5e3b78489f53afea243e8d6a7","newPassword":"full","existingSalt":"e09e7d63422305634fc6b62301687dad7a74e198cb676a5b10e3ae29763043a6","existingPassword":"demo","existingPasswordEncrypted":"9505c317f6b0668d9e211fc63e08ab3b31c26078972d74a2a1c36f33d52daaa1"}';
        // $info = json_decode($info, true);

        // $data = '{"credentials":"208f9ffc1309dfddad694575545934004780eee1cde2c89c0b3eddb3b3398fe8}{be4a0b06d206809fd3e31399093b08bb0cb566d5e3b78489f53afea243e8d6a7","hash":"035a29f79642946924420edc7741bfbcc8173faee6e5f9a731949e1a0e1e83d9"}';
        // $data = json_decode($data, true);
        // echo '<pre>';

        // print_r($info);

        // print_r($data);

        // $credentials = explode('}{', $data['credentials']);

        // print_r($credentials);

        // $existingPasswordEncrypted = $info['existingPasswordEncrypted'];

        //     $em = $this->getDoctrine()->getManager();
        //     $repository = $em->getRepository('AdrotecCommonUserBundle:UserAccount');
        //     if ($user = $repository->findByUsernameColumn('demo')) {
        //         $userData = array(
        //             'salt' => $user->getSalt(),
        //             'password' => $user->getPassword(),
        //         );
        //         print_r($userData);
        //         $existingPasswordEncrypted = $user->getPassword();
        //     }


        // // $valid = $data['hash'] == ;

        // var_dump($valid);

        // return new Response('DOne?');
    }

    public function validateAction() {
//        exit("TESTING");
        $response = array('error' => 'Failed');
        $securityContext = $this->get('security.context');
        /* @var $securityContext \Symfony\Component\Security\Core\SecurityContext */
        $token = $securityContext->getToken();
        $user = $token->getUser();
        if ($token->isAuthenticated() && $user instanceof UserInterface) {
            unset($response['error']);
            $response['roles'] = $user->getRoles();
            $response['id'] = $user->getId();
        }
        else {
            $response['error'] = 'Invalid User';
        }
        $responseText = json_encode($response);
//        $responseText = $this->get('serializer')->serialize($response, 'json');
        $response = new Response($responseText, 201);
//        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

}
