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

        public static function addToCart($idFood){
            if(!isset($_SESSION['carrinho'])){
                $_SESSION['carrinho'] = array();
            }
            $_SESSION['carrinho'][] = $idFood;
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