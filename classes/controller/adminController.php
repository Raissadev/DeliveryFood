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

        public static function registerProduct(){
            if(isset($_POST['action'])){
                $name = $_POST['name'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $energy = $_POST['energy'];
                $weight = $_POST['weight'];
                $image = $_FILES['image'];
                $image_transparent = $_FILES['image_transparent'];
                move_uploaded_file($image['tmp_name'],BASE_PAINEL_UPLOADS.$image['name']);
                move_uploaded_file($image_transparent['tmp_name'],BASE_PAINEL_UPLOADS.$image_transparent['name']);
 
                $sql = \MySql::connect()->prepare("INSERT INTO `foods` VALUES (null,?,?,?,?,?,?,?)");
                // $sqlRating = \MySql::connect()->prepare("INSERT INTO `ratings` VALUES (null,0,0,0,null)");
                $sql->execute(array($name,$description,$price,$image['name'],$image_transparent['name'],$energy,$weight));
                // $sqlRating->execute();
 
                echo '<script> location.href = location.href </script>';
            }
        }
        
    }

?>