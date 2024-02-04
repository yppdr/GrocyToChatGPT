<?php 

function generatePrompt($stock_list)
{

$start = "Salut, j'aimerais faire plusieur recettes pour ma semaine et j'ai actuellement : ";
$end = "que me conseil tu comme recette ?";
$list = "";

    foreach ($stock_list as $value) {
        
        $list .= $value->amount . " " . $value->product->product_group_id . " " . $value->product->name. ", ";
        //var_dump($value->product->name);
        //var_dump($value->amount);
        
    }

return $start . $list . $end;

}