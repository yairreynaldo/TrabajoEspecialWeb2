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
    //todos los productos
    $r->addRoute("producto", "GET", "ProductoController", "GetP");
    //borrar producto
    $r->addRoute("borrar/:ID", "GET", "ProductoController", "BorrarProducto");
    //precargar editar de producto
    $r->addRoute("precargar/:ID", "GET", "ProductoController", "precargar");
    //editar producto
    $r->addRoute("editarProducto/:ID", "POST", "ProductoController", "editarProducto");
    //agregar categoria
    $r->addRoute("AgregarCategoria", "POST", "CategoriaController", "AgregarCategoria");
    //agregar producto
    $r->addRoute("agregar", "POST", "ProductoController", "AgregarProducto");
    //obtener categoria en producto
    $r->addRoute("Productos", "GET", "ProductoController", "getcat");
    //borrar categoria
    $r->addRoute("borrarCat/:ID", "GET", "CategoriaController", "borrarCat");
    //obtener todos los producto de una categoria
    $r->addRoute("Categoria/:ID", "GET", "CategoriaController", "getProducto");
    //producto por id
    $r->addRoute("producto/:ID", "GET", "ProductoController", "getProducto");
    //precargar editar categorias
    $r->addRoute("precargarcat/:ID", "GET", "CategoriaController", "precargarcat");
    //editar cat
    $r->addRoute("editarcat/:ID", "POST", "CategoriaController", "editarcat");


    //Ruta por defecto.
    $r->setDefaultRoute("ProductoController", "home");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>