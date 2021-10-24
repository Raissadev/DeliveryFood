<?php
    include('config.php');

    $homeController = new controller\homeController();
    $shopController = new controller\shopController();
    $productController = new controller\productController();
    $accessController = new controller\accessController();
    $adminController = new controller\adminController();

    Router::get('/',function() use ($homeController){
        $homeController->index();
    });
    Router::get('/shop', function () use ($shopController){
        $shopController->index();
    });
    Router::get('/cart', function () use ($shopController){
        $shopController->cart();
    });
    Router::get('/product', function () use ($productController){
        $productController->index();
    });
    Router::get('/location', function () use ($accessController){
        $accessController->location();
    });
    Router::get('/register', function () use ($accessController){
        $accessController->register();
    });
    Router::get('/login', function () use ($accessController){
        $accessController->login();
    });
    Router::get('/painel', function () use ($adminController){
        $adminController->index();
    });
    Router::get('/painel/new-product', function () use ($adminController){
        $adminController->newProduct();
    });
    Router::get('/painel/products', function () use ($adminController){
        $adminController->myProducts();
    });
    Router::get('/painel/dices', function () use ($adminController){
        $adminController->dicesAdmin();
    });
    Router::get('/painel/requests', function () use ($adminController){
        $adminController->requestsAdmin();
    });

?>