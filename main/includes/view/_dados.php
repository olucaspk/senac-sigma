<?php

require_once "./classes/Database.php";
// Database
$DatabaseClass = new Database();

// Variables
$productsList = [];
$productsFirstPage = [];
$productsWithoutCategory = [];


$productsQuery = $DatabaseClass->query("SELECT * FROM products", []);

foreach ($productsQuery as $_ => $productInfos) {
    $productsList[$productInfos['id']] = $productInfos;

    $productCategories = json_decode($productInfos['categories']);
    if (isset($productCategories) && count($productCategories) >= 1) {
        foreach ($productCategories as $_ => $v) {
            if (!isset($productsFirstPage[$v])) {
                $productsFirstPage[$v] = [];
            }

            array_push($productsFirstPage[$v], $productInfos['id']);
        }
    } else {
        array_push($productsWithoutCategory, $productInfos['id']);
    }
}

$categories = [
    "novos" => [
        "name" => "Novidades imperdíveis"
    ],
    "animais" => [
        "name" => "Animais notáveis"
    ],
    "humanos" => [
        "name" => "Humanos belissímos"
    ],
    "petras" => [
        "name" => "Gym"
    ]
];

?>
