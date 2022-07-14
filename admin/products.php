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
    <h3>Gerenciamento de produtos</h2>
    <button>
      <i class="fas fa-plus icon"></i>
      Novo produto
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
          <th scope="col">Preço</th>
          <th scope="col">Descrição</th>
          <th scope="col">Categoria</th>
          <th scope="col">Imagem</th>
          <th scope="col">Trending</th>
          <th scope="col">Status</th>
          <th scope="col-2">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php
            $productsQuery = $databaseClass->Query("SELECT * FROM `products`");
            foreach ($productsQuery as $key => $productInfos) {
                $productId = $productInfos["id"];
                $productImage = $productInfos['image'];
                $categoryName = $databaseClass->Query("SELECT `name` FROM `categories` WHERE `id` = '{$productInfos['category_id']}'", []);
                $categoryName = $categoryName[0]["name"];

                $isTrending = $productInfos['is_trending'] == 1 ? "Sim" : "Não";
                $isActive = $productInfos['is_active'] == 1 ? "Ativa" : "Inativa";

                echo "<tr>";
                  echo "<th scope='row'>{$productId}</th>";
                  echo "<td>{$productInfos['name']}</td>";
                  echo "<td>{$productInfos['price']}</td>";
                  echo "<td>{$productInfos['description']}</td>";
                  echo "<td>{$categoryName}</td>";
                  echo "<td>";
                    echo "<img src='{$productImage}' width=40 height=40 style='border-radius: 100%;'";
                  echo "</td>";
                  echo "<td>{$isTrending}</td>";
                  echo "<td>{$isActive}</td>";
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