<?php

    namespace models;

    class adminModel{
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
               $sqlRating = \MySql::connect()->prepare("INSERT INTO `ratings` VALUES (null,0,0,0,null)");
               $sql->execute(array($name,$description,$price,$image['name'],$image_transparent['name'],$energy,$weight));
               $sqlRating->execute();

               echo '<script> location.href = location.href </script>';
           }
       }
       

       public static function getProductsAdmin(){
           $query = "";
           if(isset($_POST['acao_search']) == 'Buscar'){
               $nome = $_POST['busca'];
               $query = "WHERE name LIKE '$nome%'";
           }
           $sql = \MySql::connect()->prepare("SELECT * FROM `foods` $query");
           $sql->execute();
           return $sql->fetchAll();
       }

       public static function returnDices(){
            return $_SESSION['carrinho'];
            return $_SESSION['date'];
            
       }
    }

?>