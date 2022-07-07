<?php
include_once "./includes/view/_dados.php";
include_once "./includes/view/_head.php";
include_once "./includes/view/_header.php";

include_once "./classes/Product.php";

function sanitizeInputs() {
    if (!isset($_GET['id'])) {
        print("Id is mandatory");
        exit();
    }
    
    $id = $_GET['id'];

    if (!is_numeric($id)) {
        print("Bad Request");
        exit();
    }

    if (!isset($GLOBALS["productsList"][$id])) {
        print("Cannot find a product with id $id.");
        exit();
    }

    return $id;
}

$id = sanitizeInputs();
?>

<?php
    $product = new Product($id);

    $isTrending = $product->isTrending() ? "<span class='badge badge-danger'>Trending 🔥</span>" : "";
    echo "<div class='container'>";
        echo "<div class='row'>";
            echo "<div class='col m-3'>";
                echo "<h2>{$product->getName()} {$isTrending}</h2>";
                echo "<p>{$product->getDescription()}</p>";
                echo "<img src='{$product->getImage()}' alt='' width=350 height=350>";
            echo "</div>";
        echo "</div>";

        echo "<div class='row m-3'>";
            echo "<a href='#' class='btn btn-primary mr-2'>Comprar</a>";
            echo "<a href='index.php' class='btn btn-secondary'>Voltar</a>";
        echo "</div>";
    echo "</div>";
?>
    
<?php include_once "./includes/view/_footer.php"; ?>