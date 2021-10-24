<?php

    namespace controller;
    use \views\MainView;

    class productController{
        public function index(){
            mainView::render('product.php');
        }
    }

?>