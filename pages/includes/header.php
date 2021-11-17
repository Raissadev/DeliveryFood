<?php
    \controller\accessController::logoutUser();
?>

<!DOCTYPE html>
<html>
<head>
    <title>RaissaDelivery</title>
    <meta charset="utf-8" />
    <link href="<?php echo BASE ?>css/style.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,300&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="palavras-chave,do,meu,site">
	<meta name="description" content="Descrição do meu website">
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
<header>
    <div class="wrap itemsFlex alignCenter justSpaceBetween">
        <?php
            if(@$fileName == 'home.php'){}else{
        ?>
        <div class="col">
            <a href="javascript:history.back()" class="iconButton"><i data-feather="arrow-left"></i></a>
        </div>
        <?php } ?>
        <div class="col">
            <?php
                if(@$fileName == 'home.php'){
            ?>
            <p><?php echo $_SESSION['user'] ?></p>
            <?php }else{ ?>
                <h4>Explorar</h4>
            <?php } ?>
        </div>
        <div class="col">
            <figure class="figureUser">
                <img src="<?php echo BASE ?>images/<?php echo $_SESSION['image'] ?>" />
            </figure>
        </div>
    </div>
</header>

<aside class="aside hide">
    <div class="wrap">
        <div class="user itemsFlex alignCenter marginDownMiddle">
            <img class="imgUser" src="<?php echo BASE ?>images/<?php echo $_SESSION['image'] ?>" />
            <h4><?php echo $_SESSION['user'] ?></h4>
        </div>
        <nav class="itemsMenu">
            <ul>
                <li><a href="<?php echo BASE ?>"><i data-feather="home"></i> Inicio</a></li>
                <li><a href="<?php echo BASE ?>shop"><i data-feather="shopping-bag"></i> Loja</a></li>
                <li><a href="<?php echo BASE ?>cart"><i data-feather="gift"></i> Carrinho</a></li>
                <?php if(!isset($_SESSION['login'])){
                    echo '<li><a href="'.BASE.'login"><i data-feather="user"></i> Login</a></li>';
                } ?>
                <?php if(isset($_SESSION['login']) && $_SESSION['type'] == 'admin'){
                    echo '<li><a href="'.BASE.'painel"><i data-feather="command"></i> Painel</a></li>';
                } ?>
                <?php if(isset($_SESSION['login'])){
                    echo '<li><a href="'.BASE.'?logout"><i data-feather="arrow-left"></i> Sair</a></li>';
                } ?>
            </ul>
        </nav>
    </div>
</aside>