<?php

$username = $_SESSION["LOGIN"]["username"];
?>


<header>
    <div class="main-header">
        <img src="https://picsum.photos/400" height=80 width=80 alt="Site Logo">
        
        <nav>
            <button>
                <i class="fas fa-user icon user-icon"></i>
                <span><?php echo $username ?></span>
            </button>
    
            <form action="pages/logout.php" method="post">
                <input type="submit" value="Desconectar-se" />
            </form>
        </nav>
    </div>

    <div class="navigation-header">
        <a href="./index.php">
            <i class="fas fa-chart-line icon"></i>
            <span>Dashboard</span>
        </a>

        <a href="./categories.php">
            <i class="fas fa-file icon"></i>
            <span>Categorias</span>
        </a>

        <a href="./products.php">
            <i class="fas fa-cart-shopping icon"></i>
            <span>Produtos</span>
        </a>

        <a href="./categories.php">
            <i class="fas fa-receipt icon"></i>
            <span>Vendas</span>
        </a>

        <a href="./users.php">
            <i class="fas fa-users icon"></i>
            <span>Usuários</span>
        </a>
    </div>
</header>