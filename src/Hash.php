<?php
namespace Talex\Helpers;

class Hash{
    private $string;
    private $encryptMethod;
    private $secretKey;
    private $secretIV;

    /**
     * simple class to encrypt or decrypt a plain text string
     * initialization vector(IV) has to be the same when encrypting and decrypting
     *
     */

    public function __construct(string $string)
    {
        $this->string = $string;
        $this->encryptMethod = "AES-256-CBC";;
    }

    public function setSecretKey($secretKey){
        $this->secretKey = $secretKey;
        
        return $this;
    }

    public function setSecretIV($secretIV){
        $this->secretKey = $secretIV;

        return $this;
    }

    public function getSecretKey(){
        return $this->secretKey;
    }

    public function getSecretIV(){
        return $this->secretIV;
    }

    public function encrypt() {
        $output = false;
        $key = hash('sha256', $this->getSecretKey());
    
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $this->getSecretIV()), 0, 16);
        
        $output = openssl_encrypt($this->string, $this->encryptMethod, $key, 0, $iv);
        $output = base64_encode($output);
       
        return $output;
    }

    public function decrypt($string) {
        $key = hash('sha256', $this->getSecretKey());
    
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $this->getSecretIV()), 0, 16);
        
        return openssl_decrypt(base64_decode($string), $this->encryptMethod, $key, 0, $iv);
    }
}