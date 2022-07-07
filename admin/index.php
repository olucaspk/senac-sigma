<?php

session_start();
require_once "../main/classes/Database.php";
$databaseClass = new Database();

include_once "./includes/view/_Head.php";

if (!isset($_SESSION["LOGIN"]) || empty($_SESSION["LOGIN"])) {
  header("location: ./pages/login.php");
  return;
}

$username = $_SESSION["LOGIN"]["username"];

?>

<header>
  <div class="user-infos">
    <div class="user">
      <i class="fas fa-user icon user-icon"></i>
      <?php echo $username ?>
    </div>
    <form action="pages/logout.php" method="post">
      <input type="submit" value="Desconectar-se" />
    </form>
  </div>
</header>


<main>
  <header id="categories-header">
    <h3>Administração de categorias</h2>
    <button>Novo Registro</button>
  </header>
  <hr />

  <div>
    <table class="table table-bordered table-striped table-hover">
    <caption>Categorias disponíveis</caption>
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
            $categoriesQuery = $databaseClass->query("SELECT * FROM `categories`");
            foreach ($categoriesQuery as $key => $categoriesInfos) {
                $categoryId = $categoriesInfos["id"];
                $productsInCategory = $databaseClass->query("SELECT COUNT(id) AS `amount` FROM `products` WHERE `category_id` = '{$categoryId}'");
                $isActive = $categoriesInfos['is_active'] == 1 ? "Ativada" : "Desativada";

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
