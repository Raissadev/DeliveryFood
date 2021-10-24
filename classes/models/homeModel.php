<?php
    namespace models;

    class homeModel{

        public static function getFoodsItems(){
            $sql = \MySql::connect()->prepare("SELECT * FROM `foods`");
			$sql->execute();
			return $sql->fetchAll();
        }

    }

?>