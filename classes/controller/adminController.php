<?php

    namespace controller;

    class adminController{
        public static function logado(){
            return isset($_SESSION['login']) ? true : false;
            if($_SESSION['type'] == 'user'){
                header('Location: '.BASE);
            }else{
                return true;
            }
        }
        public function index(){
            if(self::logado() == false){
                header('Location: '.BASE.'login');
            }else{
                include('pages/painel/includes/header.php');
                include('pages/painel/index.php');
                include('pages/painel/includes/footer.php');
            }
        }

        public static function newProduct(){
            if(self::logado() == true){
                include('pages/painel/includes/header.php');
                include('pages/painel/new-product.php');
                include('pages/painel/includes/footer.php');
            }else{
                header('Location: '.BASE.'login');
            }
        }

        public static function myProducts(){
            if(self::logado() == true){
                include('pages/painel/includes/header.php');
                include('pages/painel/products.php');
                include('pages/painel/includes/footer.php');
            }else{
                header('Location: '.BASE.'login');
            }
        }

        public static function dicesAdmin(){
            if(self::logado() == true){
                include('pages/painel/includes/header.php');
                include('pages/painel/dices.php');
                include('pages/painel/includes/footer.php');
            }else{
                header('Location: '.BASE.'login');
            }
        }

        public static function requestsAdmin(){
            if(self::logado() == true){
                include('pages/painel/includes/header.php');
                include('pages/painel/requests.php');
                include('pages/painel/includes/footer.php');
            }else{
                header('Location: '.BASE.'login');
            }
        }
        
    }

?>