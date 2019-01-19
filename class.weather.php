<?php

class Weather {

    private $url = 'https://weather-ydn-yql.media.yahoo.com/forecastrss';
    private $app_id = 'your-app-id';
    private $consumer_key = 'your-consumer-key';
    private $consumer_secret = 'your-consumer-secret';

    private function buildBaseString($baseURI, $method, $params)
    {
        $r = array();
        ksort($params);
        foreach ($params as $key => $value) {
            $r[] = "$key=" . rawurlencode($value);
        }
        return $method . "&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r));
    }

    private function buildAuthorizationHeader($oauth)
    {
        $r = 'Authorization: OAuth ';
        $values = array();
        foreach ($oauth as $key => $value) {
            $values[] = "$key=\"" . rawurlencode($value) . "\"";
        }
        $r .= implode(', ', $values);
        return $r;
    }

    public function getWeatherData ($location){
        $query = array(
            'location' => $location,
            'format' => 'json', //xml
            'u' => 'c', //u=f (default) or u=c //Fahrenheit //Celsius
        );
        $oauth = array(
            'oauth_consumer_key' => $this->consumer_key,
            'oauth_nonce' => uniqid(mt_rand(1, 1000)),
            'oauth_signature_method' => 'HMAC-SHA1',
            'oauth_timestamp' => time(),
            'oauth_version' => '1.0'
        );
        $base_info = $this->buildBaseString($this->url, 'GET', array_merge($query, $oauth));
        $composite_key = rawurlencode($this->consumer_secret) . '&';
        $oauth_signature = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
        $oauth['oauth_signature'] = $oauth_signature;
        $header = array(
            $this->buildAuthorizationHeader($oauth),
            'Yahoo-App-Id: ' . $this->app_id
        );
        $options = array(
            CURLOPT_HTTPHEADER => $header,
            CURLOPT_HEADER => false,
            CURLOPT_URL => $this->url . '?' . http_build_query($query),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false
        );
        $ch = curl_init();
        curl_setopt_array($ch, $options);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response; //string
    }
}
