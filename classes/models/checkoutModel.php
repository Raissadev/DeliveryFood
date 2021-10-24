<?php

    namespace models;

    class checkoutModel{

        public static function resetCart(){
            if(isset($_GET['reset'])){
                unset($_SESSION['carrinho']);
                header('Location: '.BASE);
            }
        }

        public static function getPaymentInsert($user_id,$product_id,$payment_id,$card_number,$date_valid,$cvv,$amount){
            $paymentInsert = \MySql::connect()->prepare("INSERT INTO `payments` VALUES (null,?,?,?,?,?,?,?,?)");
            $paymentInsert->execute(array($user_id,$product_id,$payment_id,$card_number,$date_valid,$cvv,$amount,date("Y-m-d")));  
            echo "<script> alert('Pagamento efetuado com sucesso!') </script>";
            echo '<script> location.href = "'.BASE.'" </script>';
            unset($_SESSION['carrinho']);
        }

        public static function deliveryRequest(){
            $sql = \MySql::connect()->prepare("SELECT * FROM `payments`");
            $sql->execute();      
            $sql = $sql->fetchAll();
            return $sql;
        }

    }

?>
