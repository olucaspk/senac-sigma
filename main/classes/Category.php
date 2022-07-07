<?php
include_once "./includes/view/_dados.php";

class Category {
    public $id;
    public $name;
    
    public function __construct($categoryId) {
        $this->categories = $GLOBALS["categoriesList"];

        $this->id = $categoryId;
        $this->name = $this->categories[$this->id]["name"];
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }
}