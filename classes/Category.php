<?php
include_once "./includes/_dados.php";

class Category {
    public $id;
    public $name;
    public $categories;
    
    public function __construct($categoryId) {
        $this->categories = $GLOBALS['categories'];

        $this->id = $categoryId;
        $this->name = $this->categories[$this->id]['name'];
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function isNew() {
        return $this->id == "novos" ? true : false;
    }
}