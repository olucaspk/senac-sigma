<?php
include_once "./includes/view/_dados.php";
include_once "./includes/view/_head.php";
include_once "./includes/view/_header.php";

include_once "./classes/Product.php";
include_once "./classes/Category.php";

?>

<div class="container mt-5">
    <?php
        $allProductsList = getAllProducts();

       function buildProduct($productId) {
            $product = new Product($productId);
            $isTrending = $product->isTrending() ? "<span class='badge badge-danger'>Trending 🔥</span>" : "";

            echo '<div class="card m-4" style="width: 20rem; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">';
                echo "<img src='{$product->getImage()}' class='card-img-top' alt='' height=300>";
                echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>{$product->getName()} {$isTrending}</h5>";
                    echo "<p class='card-text'>{$product->getDescription()}</p>";
                    echo "<p class='card-text'>R$ {$product->getPrice()}</p>";
                    echo "<a href='produto-detalhe.php?id={$product->getId()}' class='btn btn-primary'>Comprar</a>";
                echo "</div>";
            echo '</div>';
        }

        foreach ($allProductsList as $categoryName => $products) {
            echo "<h4>{$categoryName}</h4>";  
            echo '<div class="row mt-3">';
                foreach ($products as $productInfos) buildProduct($productInfos["id"]);
            echo '</div>';
            echo '<br><hr><br>';
        }
    ?>
</div>

<?php include_once "./includes/view/_footer.php"; ?>