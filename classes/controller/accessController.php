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

        public static function registerUser(){
            if(isset($_POST['action'])){
                $name = $_POST['user'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $image = $_FILES['image_user'];
                $latitude = $_POST['latitude'];
                $longitude = $_POST['longitude'];
                $road = $_POST['road'];
                move_uploaded_file($image['tmp_name'],BASE_UPLOADS.$image['name']);
                
                
                $sql = \MySql::connect()->prepare("INSERT INTO `users` VALUES (null,?,?,?,?,?,?,?)");
                $sql->execute(array($name,$password,$email,$image['name'],'user',$latitude,$longitude,$road));
                
                echo '<script> location.href = "'.BASE.'" </script>';
                $_SESSION['login'] = true;
                
            }
        }

        public static function checkLogin(){
            if(isset($_COOKIE['remember'])){
                $user = @$_COOKIE['user'];
                $password = @$_COOKIE['password'];
                $sql = \MySql::connect()->prepare("SELECT * FROM `users` WHERE user = ? AND password = ?");
                $sql->execute(array($user,$password));
                if($sql->rowCount() == 1){
                    $info = $sql->fetch();
                    $_SESSION['login'] = true;
                    $_SESSION['user'] = $user;
                    $_SESSION['password'] = $password;
                    $_SESSION['image'] = $info['image'];
                    $_SESSION['type'] = 'user';
                    $_SESSION['latitude'] = $info['latitude'];
			        $_SESSION['longitude'] = $info['longitude'];
                    $_SESSION['road'] = $info['road'];
                    header('Location: '.BASE);
                    die();
                }
            }
        }

        public static function loginUser(){
            if(isset($_POST['action'])){
                $user = $_POST['user'];
                $password = $_POST['password'];
                $sql = \MySql::connect()->prepare("SELECT * FROM `users` WHERE user = ? AND password = ?");
                $sql->execute(array($user,$password));
                if($sql->rowCount() == 1){
                    $info = $sql->fetch();
                    //Logamos com sucesso.
                    $_SESSION['id'] = $info['id'];
                    $_SESSION['login'] = true;
                    $_SESSION['user'] = @$user;
                    $_SESSION['password'] = @$password;
                    $_SESSION['image'] = @$info['image'];
                    $_SESSION['type'] = $info['type'];
                    $_SESSION['latitude'] = $info['latitude'];
			        $_SESSION['longitude'] = $info['longitude'];
                    if(isset($_POST['remember'])){
                        setcookie('remember', true, time()+(60*60*24), '/');
                        setcookie('user', @$user, time()+(60*60*24), '/');
                        setcookie('password',@$password,time()+(60*60*24), '/');
                    }
                    if($_SESSION['type'] == "user"){
                        header('Location: '.BASE);
                        die();
                    }
                    if($_SESSION['type'] == "admin"){
                        header('Location: '.BASE.'painel');
                        die();
                    }
				}else{
				    //Falhou
					echo '<script> alert("Usuário ou senha inválidos") </script>';
				}
            }
        }

        public static function logoutUser(){
            if(isset($_GET['logout'])){
                setcookie('remember', true, time()-(60*60*24), '/');
                setcookie('user', $user, time()-(60*60*24), '/');
                setcookie('password',$password,time()-(60*60*24), '/');
                unset($_SESSION['login']);
                unset($_SESSION['id']);
                $_SESSION['login'] = false;
                session_destroy();
                header('Location: '.BASE);
                die();
            }
        }
        
    }

?>