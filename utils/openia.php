<?php 

function generatePrompt($stock_list)
{
    $start = "Peut tu me faire des recettes pour 2 personnes avec les ingrédients suivant : ";
    $list = array_map(function($value) {
        $product_unit_id = $value->product->product_group_id;
        $product_details = getProductDetails($product_unit_id)->quantity_unit_stock->name;
        return $value->amount . " " . $product_details . " de " . $value->product->name;
    }, $stock_list);
    
    return $start . implode(", ", $list);
}
