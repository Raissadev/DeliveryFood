<?php

    namespace controller;
    use \views\MainView;

    class shopController{
        public function index(){
            mainView::render('shop.php');
        }
        public static function cart(){
            mainView::render('cart.php');
        }
    }

?>