<?php
include_once "./includes/_dados.php";
include_once "./includes/_head.php";
include_once "./includes/_header.php";

// Insert products in their categories
$productsFirstPage = [];
$productsWithoutCategory = [];

foreach ($products as $id => $productInfos) {
    if (isset($productInfos['categories'])) {
        foreach ($productInfos['categories'] as $_ => $v) {
            if (!isset($productsFirstPage[$v])) {
                $productsFirstPage[$v] = [];
            }
    
            array_push($productsFirstPage[$v], $id);
        }
    } else {
        array_push($productsWithoutCategory, $id);
    }
}

?>

<div class="container mt-5">
    <?php
        // Build Main Page

        function formatArrayToString($array) {
            $string = "";
            if (!is_array($array) || count($array) < 1) return;

            foreach ($array as $k => $v) {
                $k == (count($array) - 1) ? $string .= "{$v}" : $string .= "{$v}-";
            }

            return $string;
        }
        
        function buildProduct($products, $productId) {
            $formattedArrayToString = (isset($products[$productId]['categories']) && is_array($products[$productId]['categories'])) ? formatArrayToString($products[$productId]['categories']) : "without_category";
            $isTrending = isset($products[$productId]['is_trending']) && $products[$productId]['is_trending'] == true ? "<span class='badge badge-danger'>Trending 🔥</span>" : "";
            echo '<div class="card m-4" style="width: 20rem;">';
                echo "<img src='assets/img/{$products[$productId]['image']}' class='card-img-top' alt='' height=300>";
                echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>{$products[$productId]['name']} {$isTrending}</h5>";
                    echo "<p class='card-text'>{$products[$productId]['description']}</p>";
                    echo "<a href='produto-detalhe.php?id={$productId}&categories={$formattedArrayToString}' class='btn btn-primary'>Comprar</a>";
                echo "</div>";
            echo '</div>';
        }
    
        foreach ($productsFirstPage as $categoryId => $productsInCategory) {
            $newBadge = $categoryId == "novos" ? "<span class='badge badge-primary'>Novo</span>" : "";
            $categoryName = isset($categories[$categoryId]['name']) ? $categories[$categoryId]['name'] : $categoryId;
            echo "<h4>{$categoryName} {$newBadge}</h4>";
            echo '<div class="row mt-3">';
                foreach ($productsInCategory as $_ => $productId) {
                    buildProduct($products, $productId);
                }
            echo '</div>';
            echo '<br>';
            echo '<hr>';
            echo '<br>';
        }

        foreach ($productsWithoutCategory as $_ => $productId) {
            echo "<h4>Produtos sem categoria definida</h4>";
            echo '<div class="row mt-3">';
                buildProduct($products, $productId);
            echo '</div>';
        }
    ?>
</div>

<?php include_once "./includes/_footer.php"; ?>