<?php 

function generatePrompt($stock_list)
{
    $start = "Salut, j'aimerais faire plusieurs recettes pour ma semaine et j'ai actuellement : ";
    $end = "que me conseilles-tu comme recette ?";
    $list = array_map(function($value) {
        $product_unit_id = $value->product->product_group_id;
        $product_details = getProductDetails($product_unit_id)->quantity_unit_stock->name;
        return $value->amount . " " . $product_details . " de " . $value->product->name;
    }, $stock_list);
    
    return $start . implode(", ", $list) . $end;
}
