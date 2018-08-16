# ip-geolocation-api-php

# Quick Start Guide
There are two methods get_location($apikey, $clientIp, $fields) and geo_timezone($apiKey , $clientIp, $latitude, $longitude, $timezone) usage detail for both is given bellow;

## Get Geolocation

  
  There is a methode get_location($apikey, $clientIp, $fields) in below given snippet which takes apiKey, clientIp and fields as parameter and returns the response from ipgeolocation. 
  
  All you have to do is replace keyword "YOUR_CLIENT_IP" with your valid client ip and "YOUR_API_KEY" with valid apiKey provided by ipgeolocation. 
  
  
  Note: This snippet requires a valid IPGeolocation API key. Sign up (https://ipgeolocation.io/signup?plan=1) if you don’t have API key. And you may leave YOUR_CLIENT_IP and Fields empty.
  
  ## Get Timezone 
  
  There is a methode geo_timezone($apiKey , $clientIp, $latitude, $longitude, $timezone) in below given snippet which takes apiKey, clientIp, $latitude, $longitude, $timezone  as parameter and returns the response from ipgeolocation. 
  
  All you have to do is replace keyword
  
      
      "YOUR_CLIENT_IP" with your valid client ip 
      "YOUR_API_KEY" with valid apiKey provided by ipgeolocation. 
      "LATITUDE" with client latitude 
      "LONGITUDE" with client longitude 
      "TIMEZONE" with client time zone 
      
  Note: This snippet requires a valid IPGeolocation API key. Sign up (https://ipgeolocation.io/signup?plan=1) if you don’t have API key. Only apiKey is required in this case;
  
  
```
<?php
$clientIp = "CLIENT_IP";
$apiKey = "YOUR_API_KEY";
$fields = "FIELDS";
echo "<p>"; print_r("Geolocation response"); echo "</p>";
$response = geo_location($apiKey, $clientIp, $fields);
$latitude = "LATITUDE";
$longitude = "LONGITUDE";
$timezone = "TIMEZONE";
echo "<p>"; print_r("TimeZone response"); echo "</p>";
$response = geo_timezone($apiKey , $clientIp, $latitude, $longitude, $timezone);
$resArr = array();
$resArr = json_decode($response);
echo "<pre>"; print_r($resArr); echo "</pre>";
function geo_location($apiKey, $ip = null, $fields = null) {
    if ($fields) {
        $url = "https://api.ipgeolocation.io/ipgeo?apiKey=".$apiKey."&ip=".$ip."&fields=".$fields;
    } else {
        $url = "https://api.ipgeolocation.io/ipgeo?apiKey=".$apiKey."&ip=".$ip;
    }
    $cURL = curl_init();
    curl_setopt($cURL, CURLOPT_URL, $url);
    curl_setopt($cURL, CURLOPT_HTTPGET, true);
curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Accept: application/json'
));
    $content  = curl_exec($cURL);
    curl_close($cURL);
    return $content;
}
function geo_timezone($apiKey, $ip = null, $lat = null, $long = null, $timezone = null) {
    if ($timezone) {
        $url = "https://api.ipgeolocation.io/timezone?apiKey=".$apiKey."&ip=".$ip."&timezone=".$timezone;
    } else if ($lat && $long){
        $url = "https://api.ipgeolocation.io/timezone?apiKey=".$apiKey."&ip=".$ip."&lat=".$lat."&long=".$long;;
    } else {
        $url = "https://api.ipgeolocation.io/timezone?apiKey=".$apiKey."&ip=".$ip;
    }
    $cURL = curl_init();
    curl_setopt($cURL, CURLOPT_URL, $url);
    curl_setopt($cURL, CURLOPT_HTTPGET, true);
    curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Accept: application/json'
    ));
    $content  = curl_exec($cURL);
    curl_close($cURL);
    return $content;
}
?>
```
