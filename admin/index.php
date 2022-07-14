<?php

session_start();
require_once "../main/classes/Database.php";
$databaseClass = new Database();

include_once "./includes/view/_Head.php";
include_once "./includes/view/_Header.php";

if (!isset($_SESSION["LOGIN"]) || empty($_SESSION["LOGIN"])) {
  header("location: ./pages/login.php");
  return;
}

$username = $_SESSION["LOGIN"]["username"];

$metrics = [];
$countQuery = $databaseClass->Query("SELECT 'categories' AS table_name, COUNT(*) AS `amount` FROM categories UNION SELECT 'products' AS table_name, COUNT(*) FROM products UNION SELECT 'users' AS table_name, COUNT(*) UNION SELECT 'sales' AS table_name, COUNT(*)  FROM users", []);

foreach ($countQuery as $value) {
    $metrics[$value["table_name"]] = $value["amount"];
}

?>

<main>
    <div class="metrics">
        <div class="box">
            <h1>
                <?php echo $metrics["categories"] ?>
            </h1>
            <p>Total de categorias</p>

            <div class="box-icon">
                <i class="fas fa-file icon"></i>
            </div>
        </div>

        <div class="box">
            <h1>
                <?php echo $metrics["products"] ?>
            </h1>
            <p>Total de produtos</p>

            <div class="box-icon">
                <i class="fas fa-cart-shopping icon"></i>
            </div>
        </div>

        <div class="box">
            <h1>
                <?php echo $metrics["sales"] ?>
            </h1>
            <p>Total de vendas</p>

            <div class="box-icon">
                <i class="fas fa-receipt icon"></i>
            </div>
        </div>

        <div class="box">
            <h1>
                <?php echo $metrics["users"] ?>
            </h1>
            <p>Total de usuários</p>

            <div class="box-icon">
                <i class="fas fa-users icon"></i>
            </div>
        </div>
    </div>
</main>