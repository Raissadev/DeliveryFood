<?php

    namespace models;

    class checkoutModel{

        public static function resetCart(){
            if(isset($_GET['reset'])){
                unset($_SESSION['carrinho']);
                header('Location: '.BASE);
            }
        }

        public static function deliveryRequest(){
            $sql = \MySql::connect()->prepare("SELECT * FROM `payments`");
            $sql->execute();      
            $sql = $sql->fetchAll();
            return $sql;
        }

    }

?>
