<?php

    namespace controller;

    class siteController{

        public static function countVisits(){
            if(!isset($_COOKIE['visit'])){
                setcookie('visit','true',time() + (60*60*24*7));
                $sql = \MySql::connect()->prepare("INSERT INTO `visits` VALUES (null,?,?)");
                $sql->execute(array($_SERVER['REMOTE_ADDR'],date('Y-m-d')));
            }
            if(isset($_COOKIE['visit'])){
                $sql = \MySql::connect()->prepare("SELECT * FROM `visits`");
                $sql->execute();
                @$totalVisits = $sql->fetchAll();
                return @$totalVisits;

                $percetageVisits = 1000;
                $percetageVisitsValor = $totalVisits;
                $resultPercetageVisits = ($percetageVisitsValor / $percetageVisits) * 100;

                return ($resultPercetageVisits);
            }
        }

    }
?>
