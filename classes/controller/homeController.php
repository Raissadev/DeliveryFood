<?php

    namespace controller;
    use \views\MainView;

    class homeController{
        public function index(){
            mainView::render('home.php');
        }
    }

?>