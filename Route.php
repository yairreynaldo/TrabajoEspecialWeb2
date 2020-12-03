<?php
require_once('Controllers\ProductoController.php');
require_once("Controllers\CategoriaController.php");
require_once('Controllers\usuarioController.php');

require_once('Router.php');
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGIN", BASE_URL . 'login');
    define("REGISTRARSE", BASE_URL . 'registrarse');



    $r = new Router();

    // rutas
    //login
    $r->addRoute("login", "GET", "LoginController", "showLogin");
    //verifica el usuarios
    $r->addRoute("verify", "POST", "LoginController", "verifyUser");
    //logout
    $r->addRoute("logout", "GET", "LoginController", "logout");
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
    //agregar comentario
    $r->addRoute("insertar", "POST", "ProductoController", "AgregarComentario");
    //borrar comentario
    $r->addRoute("borrarcomentarios/:ID", "GET", "ProductoController", "borrarcomentario");
    //agregar producto
    $r->addRoute("agregar", "POST", "ProductoController", "AgregarProducto");
    //home
    $r->addRoute("inicio", "GET", "ProductoController", "home");
    //nosotros
    $r->addRoute("nosotros", "GET", "ProductoController", "nosotros");
    //obtener categoria en producto
    $r->addRoute("Productos", "GET", "ProductoController", "getcat");
    //ordenar por precio asc
    $r->addRoute("OrdenarPorPrecio", "GET", "ProductoController", "ordenar");
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
    //obtiene los comentarios
    $r->addRoute("getComentariosCSR/:ID", "GET", "ProductoController", "GETcomentarios");
    //form registrarse
    $r->addRoute("registrarse", "GET", "LoginController", "registrarse");
    //lo registra
    $r->addRoute("nuevoregistro", "POST", "LoginController", "registrar");
    //pagina admin
    $r->addRoute("admin", "GET", "LoginController", "getUsuarios");
    //asigna admin
    $r->addRoute("AsignarAdmin/:ID", "GET", "LoginController", "AsignarAdmin");
    //elimina admin
    $r->addRoute("QuitarAdmin/:ID", "GET", "LoginController", "QuitarAdmin");
    //borrar usuario
    $r->addRoute("deleteUsuario/:ID", "GET", "LoginController", "borrarusuario");





    //Ruta por defecto.
    $r->setDefaultRoute("ProductoController", "home");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>