<?php

    namespace controller;
    use \views\MainView;

    class accessController{
        public function register(){
            if(isset($_SESSION['login'])){
                header('Location: '.BASE.'.\.');
            }else{
                mainView::render('register.php');
            }
        }
        public function login(){
            if(isset($_SESSION['login'])){
                header('Location: '.BASE.'.\.');
            }else{
                mainView::render('login.php');
            }
        }
        public function location(){
            mainView::render('location.php');
        }
    }

?>