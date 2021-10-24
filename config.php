<?php

    session_start();
    date_default_timezone_set('America/Sao_Paulo');
    $autoload = function($class){
		if($class == 'Email'){

			require_once('classes/phpmailer/PHPMailerAutoload.php');
		}
		include('classes/'.$class.'.php');
	};

	spl_autoload_register($autoload);

    define('BASE','http://localhost/');
    define('BASE_UPLOADS',__DIR__.'/images/');
    define('BASE_PAINEL_UPLOADS',__DIR__.'/uploads/');
    define('HOST','localhost');
    define('USER','root');
    define('PASSWORD','');
    define('DATABASE','database');


    if(!isset($_SESSION['login'])){
        $_SESSION['user'] = 'Visitante';
        $_SESSION['image'] = 'user.png';
        $_SESSION['email'] = 'email@example.com';
    }
    if(isset($_SESSION['login_admin'])){
        $_SESSION['login'] = true;
        $_SESSION['user'] = @$user;
        $_SESSION['password'] = @$password;
        $_SESSION['email'] = @$email;
        $_SESSION['image'] = @$image;
    }
?>
