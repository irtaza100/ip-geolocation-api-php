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
