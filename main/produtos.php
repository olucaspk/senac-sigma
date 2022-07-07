<?php
include_once "./includes/view/_dados.php";
include_once "./includes/view/_head.php";
include_once "./includes/view/_header.php";

include_once "./classes/Product.php";
include_once "./classes/Category.php";

?>

<div class="container mt-5">
    <?php
        function buildProduct($productId) {
            $product = new Product($productId);
            $categories = $product->formatArrayToString($product->getCategories());
            $isTrending = $product->isTrending() ? "<span class='badge badge-danger'>Trending 🔥</span>" : "";

            echo '<div class="card m-4" style="width: 20rem;">';
                echo "<img src='assets/img/{$product->getImage()}' class='card-img-top' alt='' height=300>";
                echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>{$product->getName()} {$isTrending}</h5>";
                    echo "<p class='card-text'>{$product->getDescription()}</p>";
                    echo "<a href='produto-detalhe.php?id={$product->getId()}&categories={$categories}' class='btn btn-primary'>Comprar</a>";
                echo "</div>";
            echo '</div>';
        }

        foreach ($productsFirstPage as $categoryId => $productsInCategory) {
            $category = new Category($categoryId);
            $newBadge = $category->isNew() ? "<span class='badge badge-primary'>Novo</span>" : "";

            echo "<h4>{$category->getName()} {$newBadge}</h4>";  
            echo '<div class="row mt-3">';
            foreach ($productsInCategory as $_ => $productId) buildProduct($productId);
            echo '</div>';
            echo '<br><hr><br>';
        }

        foreach ($productsWithoutCategory as $_ => $productId) {
            echo "<h4>Produtos sem categoria definida</h4>";
            echo '<div class="row mt-3">';
                buildProduct($productsList, $productId);
            echo '</div>';
        }
    ?>
</div>

<?php include_once "./includes/view/_footer.php"; ?>