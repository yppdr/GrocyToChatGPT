<?php 



function getGrocyStock()
{

    $url = $_ENV['GROCY_SERVER_URL'] . '/api/stock';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    $headers = array();
    $headers[] = 'Accept: application/json';
    $headers[] = 'Grocy-Api-Key: ' . $_ENV['GROCY_API_KEY'];
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;

}