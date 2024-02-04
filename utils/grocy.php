<?php 



function getGrocyStock()
{
    $url = $_ENV['GROCY_SERVER_URL'] . '/api/stock';
    $client = new GuzzleHttp\Client();
    $response = $client->request('GET', $url, [
        'headers' => [
            'Accept' => 'application/json',
            'Grocy-Api-Key' => $_ENV['GROCY_API_KEY']
        ]
    ]);
    return json_decode((string) $response->getBody());
}

function getProductDetails($product_id)
{
    $client = new GuzzleHttp\Client();
    $response = $client->request('GET', $_ENV['GROCY_SERVER_URL'] .'/api/stock/products/' . $product_id, [
        'headers' => [
            'Accept' => 'application/json',
            'Grocy-Api-Key' => $_ENV['GROCY_API_KEY']
        ]
    ]);
    return json_decode((string) $response->getBody());
}
