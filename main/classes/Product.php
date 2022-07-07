<?php
include_once "./includes/view/_dados.php";

class Product {
    public $id;
    public $name;
    public $price;
    public $description;
    public $image;
    public $isTrending;
    public $createdAt;
    public $productsList;
    
    public function __construct($productId) {
        $this->productsList = $GLOBALS["productsList"];
        $this->id = $productId;
        $this->name = $this->productsList[$this->id]["name"];
        $this->price = $this->productsList[$this->id]["price"];
        $this->description = $this->productsList[$this->id]["description"];
        $this->tags = $this->productsList[$this->id]["tags"];
        $this->categoryId = $this->productsList[$this->id]["category_id"];
        $this->image = $this->productsList[$this->id]["image"];
        $this->isTrending = $this->productsList[$this->id]["is_trending"];
        $this->createdAt = $this->productsList[$this->id]["created_at"];
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getImage() {
        return $this->image;
    }

    public function getTags() {
        return json_decode($this->categories);
    }

    public function getCreationDate() {
        return $this->createdAt;
    }

    public function getCategoryId() {
        return $this->categoryId;
    }

    public function formatArrayToString($array) {
        $string = "";
        if (!is_array($array) || count($array) < 1) return;

        foreach ($array as $k => $v) {
            $k == (count($array) - 1) ? $string .= "{$v}" : $string .= "{$v}-";
        }

        return $string;
    }

    public function isTrending() {
        return $this->isTrending == 1 ? true : false;
    }
}