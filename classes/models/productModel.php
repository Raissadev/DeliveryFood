<?php

    namespace models;

    class productModel{
        public static function getFood(){
            $id = (int)$_GET['id'];
            $sql = \MySql::connect()->prepare("SELECT * FROM `foods` WHERE id = $id");
            $sql->execute();
            return $sql->fetch();
        }
    }

?>