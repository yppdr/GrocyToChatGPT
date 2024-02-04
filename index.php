<pre>
<?php
require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


require_once 'utils/grocy.php';
require_once 'utils/openia.php';


$stock = json_decode(getGrocyStock());

//echo generatePrompt($stock);


echo getGrocyStock();
?>
</pre>