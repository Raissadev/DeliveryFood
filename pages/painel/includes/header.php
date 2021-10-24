<!DOCTYPE html>
<html>
<head>
    <title>RaissaDelivery</title>
    <meta charset="utf-8" />
    <link href="<?php echo BASE ?>pages/painel/css/style.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,300&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="palavras-chave,do,meu,site">
	<meta name="description" content="Descrição do meu website">
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
<header class="marginDownSmall">
    <div class="wrap w90 center itemsFlex alignCenter justSpaceBetween">
        <div class="col w50">
            <h4>Dahsboard</h4>
        </div>
        <div class="col w50 itemsFlex alignCenter justEnd">
            <a href="<?php echo BASE; ?>" class="marginRightDefault"><i data-feather="home"></i></a>
            <figure class="figureUserSmall marginLeftDefault">
                <img src="<?php echo BASE ?>images/<?php echo $_SESSION['image'] ?>"></img>
            </figure>
        </div>
    </div>
</header>

