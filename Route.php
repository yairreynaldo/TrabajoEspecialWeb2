<?php
require_once('Controllers\ProductoController.php');
require_once("Controllers\CategoriaController.php");
require_once('Controllers\usuarioController.php');

require_once('Router.php');
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGIN", BASE_URL . 'login');


    $r = new Router();

    // rutas
    $r->addRoute("login", "GET", "LoginController", "showLogin");
    $r->addRoute("verify", "POST", "LoginController", "verifyUser");
    $r->addRoute("logout", "GET", "LoginController", "logout");
    //home
    $r->addRoute("inicio", "GET", "ProductoController", "home");
    //nosotros
    $r->addRoute("nosotros", "GET", "ProductoController", "nosotros");



    //Ruta por defecto.
    $r->setDefaultRoute("ProductoController", "home");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>