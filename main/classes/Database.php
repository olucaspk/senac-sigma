<?php

class Database {
    private $DB_USER = "root";
    private $DB_NAME = "sigma";
    private $DB_HOST = "localhost";
    private $DB_PASS = "";

    public $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:dbname=$this->DB_NAME;host=$this->DB_HOST", $this->DB_USER, $this->DB_PASS);
        } catch (PDOException $e) {
            print("Unable to establish database connection ".$e->getMessage());
        } catch (Exception $e) {
            print("Error ".$e->getMessage());
        }
    }

    public function Query($sql, $params = []) {
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}

// Example
// $query = query($pdo, "SELECT * FROM test WHERE name = :name AND id = :id", [
//     [
//         "name" => "Jose",
//     ],
//     [
//         "id" => 3
//     ]
// ]);