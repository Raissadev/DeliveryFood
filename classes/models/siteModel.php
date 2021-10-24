<?php

    namespace models;

    class siteModel{
        public static function countVisits(){
            if(!isset($_COOKIE['visit'])){
                setcookie('visit','true',time() + (60*60*24*7));
                @$sql = \MySql::connect()->prepare("INSERT INTO `visits` VALUES (null,?,?)");
                @$sql->execute(array($_SERVER['REMOTE_ADDR'],date('Y-m-d')));
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

        public static function totalPayments(){
            $paymentsList = \MySql::connect()->prepare("SELECT * FROM `payments`");
            $paymentsList->execute();  
            $paymentsList = $paymentsList->fetchAll();
            return $paymentsList;
        }

        public static function totalPaymentsCharts(){
            $paymentsChart = \MySql::connect()->prepare("SELECT * FROM `payments` ORDER BY created");
            $paymentsChart->execute();  
            $paymentsChart = $paymentsChart->fetchAll();
            foreach($paymentsChart as $key => $value){
                $getDate[] = date('M', strtotime($value['created']));

                if(in_array('Oct', $getDate)){
                    $oct = \MySql::connect()->prepare("SELECT * FROM `payments` WHERE `created` BETWEEN '2021-10-01 AND '2021-30-31");
                    $oct->execute();
                    $oct = $oct->fetchAll();
                    $sum = 0;
                    foreach($oct as $key => $value){
                        $sum += $value['amount'];
                    }
                    echo $sum;
                }else if(in_array('Sep',$getDate)){

                }
                $getAmount[] = $value['amount'];
            }
        }
    }
?>
