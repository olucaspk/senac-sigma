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

?>

<link rel="stylesheet" href="./css/categories.css">

<main>
  <header id="categories-header">
    <h3>Gerenciamento de categorias</h2>
    <button>
      <i class="fas fa-plus icon"></i>
      Nova categoria
    </button>
  </header>
  <hr />

  <div>
    <table class="table table-bordered table-striped table-hover">
    <caption>
      Consulta realizada em
      <?php
         setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
         date_default_timezone_set('America/Sao_Paulo');
         echo strftime('%A, %d de %B de %Y.', strtotime('today'));
      ?>
    </caption>
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Status</th>
          <th scope="col">Produtos na categoria</th>
          <th scope="col-2">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php
            $categoriesQuery = $databaseClass->Query("SELECT * FROM `categories`");
            foreach ($categoriesQuery as $key => $categoriesInfos) {
                $categoryId = $categoriesInfos["id"];
                $productsInCategory = $databaseClass->Query("SELECT COUNT(id) AS `amount` FROM `products` WHERE `category_id` = '{$categoryId}'");
                $isActive = $categoriesInfos['is_active'] == 1 ? "Ativa" : "Inativa";

                echo "<tr>";
                    echo "<th scope='row'>{$categoryId}</th>";
                    echo "<td>{$categoriesInfos['name']}</td>";
                    echo "<td>{$isActive}</td>";
                    echo "<td>";
                        echo "<a href='#'>{$productsInCategory[0]['amount']}</a>";
                    echo "</td>";
                    echo "<td>";
                        echo "<div class='buttons'>";
                            echo "<button class='edit-button'>";
                                echo "<i class='fas fa-pen icon'></i>";
                            echo "</button>";
                            echo "<button class='delete-button'>";
                                echo "<i class='fas fa-trash icon'></i>";
                            echo "</button>";
                        echo "</div>";
                    echo "</td>";
                echo "</tr>";
            }
        ?>
      </tbody>
    </table>
  </div>
</main>