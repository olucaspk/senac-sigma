<?php
include_once "./includes/view/_dados.php";
include_once "./includes/view/_head.php";
include_once "./includes/view/_header.php";

include_once "./classes/Product.php";
include_once "./classes/Category.php";

function buildProduct($productId) {
    $product = new Product($productId);
    // UNUSED $categories = $product->formatArrayToString($product->getCategories());
    $isTrending = $product->isTrending() ? "<span class='badge badge-danger'>Trending 🔥</span>" : "";

    echo '<div class="card m-4" style="width: 20rem;">';
        echo "<img src='assets/img/{$product->getImage()}' class='card-img-top' alt='' height=300>";
        echo "<div class='card-body'>";
            echo "<h5 class='card-title'>{$product->getName()} {$isTrending}</h5>";
            echo "<p class='card-text'>{$product->getDescription()}</p>";
            echo "<a href='produto-detalhe.php?id={$product->getId()}' class='btn btn-primary'>Comprar</a>";
        echo "</div>";
    echo '</div>';
}

?>

<div class="container mt-5">
    <?php
        foreach ($productsFirstPage as $categoryId => $productsInCategory) {
            $category = new Category($categoryId);

            if ($category->isNew()) {
                echo "<h4>{$category->getName()} <span class='badge badge-primary'>Novo</span></h4>";  
                echo '<div class="row mt-3">';
                foreach ($productsInCategory as $_ => $productId) buildProduct($productId);
                echo '</div>';
            }

        }
    ?>
</div>

<?php include_once "./includes/view/_footer.php"; ?>