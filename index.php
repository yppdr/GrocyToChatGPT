
<?php
require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once 'utils/grocy.php';
require_once 'utils/openia.php';


$stock = getGrocyStock();

echo generatePrompt($stock);



?>
