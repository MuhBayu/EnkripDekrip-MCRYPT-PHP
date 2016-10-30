<?php

/**
* Class : classEncDec.php
* Author : bayyu.me
* Date : 30 Oct 2016
* Contoh Encrypt Decrypt dengan mcrypt PHP
*/
class libEnkripDekrip
{
    private static $kunci;
    public function __construct($key) {
        Self::$kunci = $key;
    }


    function encrypt($text) 
    { 
        $key = Self::$kunci;
            return trim(base64_encode(mcrypt_encrypt(
            				  MCRYPT_RIJNDAEL_256, md5($key), $text, 
            				  MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(
            				  	MCRYPT_RIJNDAEL_256, 
            				  	MCRYPT_MODE_ECB), 
            				  MCRYPT_RAND
            	   )))); 
    } 

    function decrypt($text) 
    { 
        $key = Self::$kunci;
            $dec = trim(mcrypt_decrypt(
            			MCRYPT_RIJNDAEL_256, md5($key), base64_decode($text), 
            			MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(
            				MCRYPT_RIJNDAEL_256, 
            				MCRYPT_MODE_ECB), 
            			MCRYPT_RAND
            	   ))); 
                
                // * UNTUK NGECEK KALO GAGAL DEKRIPSI DENGAN MENGECEK ENCODING-NYA
            if(mb_detect_encoding($dec, 'ASCII', true)){
                return htmlentities($dec);
                //return true;
            } else {
                //return "Gagal di Decrypt, hasil enkripsi tidak cocok.";
                return false;
            }
    } 

}

?>