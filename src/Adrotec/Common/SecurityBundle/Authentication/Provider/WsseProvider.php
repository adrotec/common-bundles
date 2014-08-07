<?php

namespace Adrotec\Common\SecurityBundle\Authentication\Provider;

use Symfony\Component\Security\Core\Authentication\Provider\AuthenticationProviderInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\NonceExpiredException;
use Symfony\Component\Security\Core\Exception\CredentialsExpiredException;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Adrotec\Common\SecurityBundle\Authentication\Token\WsseUserToken;

class WsseProvider implements AuthenticationProviderInterface {

    private $userProvider;
    private $cacheDir;

    public function __construct(UserProviderInterface $userProvider, $cacheDir) {
        $this->userProvider = $userProvider;
        $this->cacheDir = $cacheDir;
    }

    public function authenticate(TokenInterface $token) {
//        exit(get_class($this->userProvider));
        $user = null;
        try {
            $user = $this->userProvider->loadUserByUsername($token->getUsername());
        } catch (\Exception $e) {
            $user = false;
            echo $e->getMessage();
        }

        if ($user) {
            $valid = $this->validateDigest($token->digest, $token->nonce, $token->created, $user->getPassword());
//            print_r($token);
            if ($valid) {
                $authenticatedToken = new WsseUserToken($user->getRoles());
                $authenticatedToken->setUser($user);
                return $authenticatedToken;
            }
            else {
                throw new BadCredentialsException('Bad credentials');
            }
        }

        throw new AuthenticationException('The WSSE authentication failed.');
    }

    protected function validateDigest($digest, $nonce, $created, $secret) {
       // $time = gmmktime();
        $time = time();
        $createdTime = strtotime($created);
        
//        $handle = fopen('reqlog.txt', 'a');
//fwrite($handle, "\n\n".$time.' : '.$createdTime."\n".date(\DateTime::ISO8601)." : ".$created."\n");
//fclose($handle);

        // Requests shall not be created in the future (no more than 5 minutes)
        if ($createdTime > $time + 300) {
            throw new AuthenticationException('Request time does not match with the server time '.date('c', $time));
            // return false;
        }

        // Requests shall not be created in the past (no more than 5 minutes)
        if($createdTime < $time - 300){
            throw new AuthenticationException('Request time does not match with the server time '.date('c', $time));
            // return false;
        }

        // Expire timestamp after 5 minutes
        // if ($time - $createdTime > 300) {
        //    return false;
        // }

        // Validate nonce is unique within 5 minutes
        if (file_exists($this->cacheDir . '/' . $nonce) && file_get_contents($this->cacheDir . '/' . $nonce) + 300 > $time) {
           throw new NonceExpiredException('Previously used nonce detected');
        }
        // If cache directory does not exist we create it
        if (!is_dir($this->cacheDir)) {
            mkdir($this->cacheDir, 0777, true);
        }
        file_put_contents($this->cacheDir . '/' . $nonce, $time);

        // Validate Secret
        $expected = base64_encode(sha1(base64_decode($nonce) . $created . $secret, true));

        // exit('NONCE: '.base64_decode($nonce).', CREATED: '.$created.', SECRET: '.$secret.',
        //     DIGEST: '. $expected);

        return $digest === $expected;
    }

    public function supports(TokenInterface $token) {
        return $token instanceof WsseUserToken;
    }

}