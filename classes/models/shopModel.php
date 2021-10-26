<?php

    namespace models;

    class shopModel{

        public static function getItemShopFood(){
            $query = "";
                if(isset($_POST['acao_search'])  == 'Buscar'){
                $nome = $_POST['busca'];
                $query = "WHERE name LIKE '$nome%'";
            }
            $sql = \MySql::connect()->prepare("SELECT * FROM `foods` $query");
            $sql->execute();
            return $sql->fetchAll();
        }

        public static function addToCart($idFood){
            if(!isset($_SESSION['carrinho'])){
                $_SESSION['carrinho'] = array();
            }
            $_SESSION['carrinho'][] = $idFood;
        }
        public static function getItemsCart(){
            return $_SESSION['carrinho'];
        }

        public static function getRatings($idProduct){
            $starsOne = \MySql::connect()->prepare("SELECT * FROM `ratings` WHERE stars = 1 AND id_product = $idProduct");
            $starsTwo = \MySql::connect()->prepare("SELECT * FROM `ratings` WHERE stars = 2 AND id_product = $idProduct");
            $starsThree = \MySql::connect()->prepare("SELECT * FROM `ratings` WHERE stars = 3 AND id_product = $idProduct");
            $starsFour = \MySql::connect()->prepare("SELECT * FROM `ratings` WHERE stars = 4 AND id_product = $idProduct");
            $starsFive = \MySql::connect()->prepare("SELECT * FROM `ratings` WHERE stars = 5 AND id_product = $idProduct");
            $starsOne->execute();
            $starsTwo->execute();
            $starsThree->execute();
            $starsFour->execute();
            $starsFive->execute();
            $starsOne = $starsOne->fetchAll();
            $starsTwo = $starsTwo->fetchAll();
            $starsThree = $starsThree->fetchAll();
            $starsFour = $starsFour->fetchAll();
            $starsFive = $starsFive->fetchAll();

            $calcOne = (5*count($starsFive) + 4*count($starsFour) +3*count($starsThree) +2*count($starsTwo) +1*count($starsOne));
            $calcTwo = (count($starsFive) + count($starsFour) + count($starsThree) + count($starsThree) + count($starsTwo) + count($starsOne));

            if($calcOne === 0 || $calcTwo === 0){
                $calcOne = 1; $calcTwo = 1;
            }
            $calcStars = intdiv($calcOne, $calcTwo);
            
            echo $calcStars;
        }
        
        public static function getAvaliation($id_product){
            if(isset($_POST['action'])){
                $feedback = $_POST['feedback'];
                $star = $_POST['star'];

                $sql = \MySql::connect()->prepare("INSERT INTO `ratings` VALUES (null,?,?,?,?)");
                $sql->execute(array($id_product,$star,$feedback,$_SESSION['id']));

                echo '<script> location.href = location.href </script>';
            }
        }
    }

?>
