<?php

namespace Muffinweb;

class Web
{
    public static function clone(String $url) : static {
        
        /** Eger girilen URL legit url adresi degilse */
        if(!filter_var($url, FILTER_VALIDATE_URL)){
            die('Lutfen gecerli bir URL adresi giriniz');
        }

        /**
         * Let's fetch google.com.tr to our php application
         */

        $curl_request = curl_init();

        $curl_options = curl_setopt_array($curl_request, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_FOLLOWLOCATION => true
        ]);

        $curl_response_content = curl_exec($curl_request);
        $curl_response_meta = curl_getinfo($curl_request);

        /** If HTTP Code is 200, we can output the response content */
        if($curl_response_meta['http_code'] == 200){
            echo $curl_response_content;
        }else{
            echo 'Site replike edilemedi';
        }
    }
}