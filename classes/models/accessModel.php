<?php

    namespace models;
    
    class accessModel{
        
        public static function getUsers(){
            $users = \MySql::connect()->prepare("SELECT * FROM `users`");
            $users->execute();
            $users = $users->fetchAll();
            return $users;
        }
    }

?>