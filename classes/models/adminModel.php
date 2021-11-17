<?php

    namespace models;

    class adminModel{

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