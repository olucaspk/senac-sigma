<?php

// Database
require_once "./classes/Database.php";
$DatabaseClass = new Database();

// Cache Variables
$productsList = [];
$categoriesList = [];

// Utils
function tableContains($table, $expectedValue) {
    foreach ($table as $v) {
        if ($v == $expectedValue) return true;
    }

    return false;
}

function loadProducts() {
    $productsQuery = $GLOBALS["DatabaseClass"]->Query("SELECT `id`, `name`, `price`, `description`, `tags`, `category_id`, `image`, `is_trending`, `created_at` FROM `products` WHERE `is_active` = true", []);
    foreach ($productsQuery as $_ => $productInfos) {
        $productInfos["tags"] = json_decode($productInfos["tags"]);

        $GLOBALS["productsList"][$productInfos["id"]] = $productInfos;
    }
}

function loadCategories() {
    $categoriesQuery = $GLOBALS["DatabaseClass"]->Query("SELECT `id`, `name` FROM `categories` WHERE `is_active` = true", []);
    foreach ($categoriesQuery as $categoriesInfo) {
        $GLOBALS["categoriesList"][$categoriesInfo["id"]] = $categoriesInfo;    
    }
}

function getAllProducts() {
    $allProducts = [];
    
    foreach ($GLOBALS["productsList"] as $value) {
        $category = new Category($value["category_id"]);
        $categoryName = $category->getName();

        if (!isset($allProducts[$categoryName])) {
            $allProducts[$categoryName] = [];
        }

        $allProducts[$categoryName][$value["id"]] = $value;
    }

    return $allProducts;
}

function getProductsToFirstPage() {
    $firstPageProducts = [];
    
    foreach ($GLOBALS["productsList"] as $value) {
        if (tableContains($GLOBALS["productsList"][$value["id"]]["tags"], "new")) {
            $firstPageProducts[$value["id"]] = $value;
        }
    }

    return $firstPageProducts;
}

loadCategories();
loadProducts();