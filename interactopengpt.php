<pre>

<?php

require __DIR__ . '/vendor/autoload.php';


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();



$api_key = $_ENV['OPENAI_API_KEY'];
$api_url = $_ENV['OPENAI_URL'];

$prompt = 'Qui a gagné la coupe du monde de football en 98 ?';

$data = array( 
    'model' => $_ENV['OPENAI_MODEL'],
    'messages' => array(
        array('role' => 'system', 'content' => 'Vous êtes un assistant'),
        array('role' => 'user', 'content' => $prompt)
    ));

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $api_key
));


$response = curl_exec($ch);
curl_close($ch);
var_dump($response);

if ($response) {
    $response_data = json_decode($response, true);
    $response_prod = $response_data['choices'][0]['message']['content'];
    var_dump($response_prod) ;
} else {
    echo "Une erreur s'est produite lors de l'appel à l'API.";
}




?>
</pre>