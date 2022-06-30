<?php
include_once "./includes/view/_dados.php";
include_once "./includes/view/_head.php";
include_once "./includes/view/_header.php";

function treatEntries() {
    if (!isset($_GET['id'])) {
        print("Id is mandatory");
        exit();
    }

    if (!isset($_GET['categories'])) {
        print("Categories is mandatory");
        exit();
    }
    
    $id = $_GET['id'];
    $categories = $_GET['categories'];

    if (!is_numeric($id) || is_numeric($categories)) {
        print("Bad Request");
        exit();
    }

    if (!isset($GLOBALS["productsList"][$id])) {
        print("Cannot find a product with id $id.");
        exit();
    }

    return [ $id, $categories ];
}

list($id, $categories) = treatEntries();
?>

<?php
    $isTrending = isset($productsList[$id]['is_trending']) && $productsList[$id]['is_trending'] == true ? "<span class='badge badge-danger'>Trending 🔥</span>" : "";
    echo "<div class='container'>";
        echo "<div class='row'>";
            echo "<div class='col m-3'>";
                echo "<h2>{$productsList[$id]['name']} {$isTrending}</h2>";
                echo "<p>{$productsList[$id]['description']}</p>";
                echo "<img src='assets/img/{$productsList[$id]['image']}' alt='' width=350 height=350>";
            echo "</div>";
        echo "</div>";

        echo "<div class='row m-3'>";
            echo "<a href='#' class='btn btn-primary mr-2'>Comprar</a>";
            echo "<a href='index.php' class='btn btn-secondary'>Voltar</a>";
        echo "</div>";
    echo "</div>";
?>
    
<?php include_once "./includes/view/_footer.php"; ?>