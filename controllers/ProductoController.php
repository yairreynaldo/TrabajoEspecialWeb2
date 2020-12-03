<?php
        require_once ".\Model\ProductoModel.php";
        require_once ".\Model\ComentarioModel.php";
        require_once "view\Productoview.php";
        require_once "view\homeview.php";
        require_once "view\Nosotrosview.php";
        include_once('helpers/auth.helper.php');


        class ProductoController {

            private $model;
            private $modelcomentarios;
            private $modelCategoria;
            private $view;
            private $view1;
            private $view2;
            private $authHelper;

            function __construct(){
                $this->model = new ProductoModel();
                $this->view = new  Productoview();
                $this->view1 = new  homeview();
                $this->view2 = new  nosotrosview();
                $this->authHelper = new AuthHelper();
                $this->modelcomentarios= new ComentariosModel();
                $this->modelCategoria=new CategoriaModel();

            }

            //pagina home
            public function home(){
                $this->view1->home();
        }
            //paginas nosotros
            public function nosotros(){
                $this->view2->nosotros();

            }
            //obtiene productos  + las categorias
            public function GetP(){
                $Producto = $this->model->GetProducto();
                $cat = $this->modelCategoria->GetCategoria();
                $this->view->DisplayProductos($Producto,$cat);
            }
             //producto por id
            public function getProducto($params = null) {
                $id = $params[':ID'];
                $producto = $this->model->getp($id);
                $this->view->showProducto($producto);
            }
            //ordena asc
            public function ordenar(){
                $ordenar = $this->model->ordenarporprecio();
                $this->view->ordenar($ordenar);
                
            }
              
        //agrega un comentario
            public function AgregarComentario($params=null){
                $this->authHelper->checkLoggedIn();
                $id_producto = $_POST['id_producto'];
                $usuario = $_POST['usuario'];
                $comentario = $_POST['comentario'];
                $puntaje = $_POST['puntaje'];
                $this->modelcomentarios->AgregarComentario($usuario,$comentario,$id_producto,$puntaje);
                header("Location: " . BASE_URL."producto");

            }
            //borrar comentario
            public function borrarcomentario($params=null){
                $this->authHelper->checkLoggedIn();
                $id = $params[':ID'];
                $this->modelcomentarios->borrarComentario($id);
            }
            
            //agrega un producto
            public function AgregarProducto() {
                       // barrera para usuario logueado
                       $this->authHelper->checkLoggedIn();

                $id_categoria =$_POST['id_categoria'];
                $nombre = $_POST['nombre'];
                $precio = $_POST['precio'];
                $descripcion = $_POST['descripcion'];


// agarra el file
if ($_FILES['imagen']['name']) {
    if ($_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/png") {
        $this->model->AgregarProducto($id_categoria,$nombre, $precio, $descripcion,$_FILES['imagen']);
        header("Location: " . BASE_URL . "producto");

    }
    else {
        $this->view->showError("Formato no aceptado");
    }
}else {
             if (!empty($id_categoria) && !empty($nombre)&& !empty($precio)) {
                    $agregar = true;
                    if ($agregar){
                    $this->model->AgregarProducto($id_categoria,$nombre, $precio, $descripcion);
                    header("Location: " . BASE_URL . "producto");

                    }
                } else {
                    $this->view->showError("debe completar los campos de categoria,nombre y precio OBLIGATORIOS");
                }
            }
        }

            
            //precarga el formulario de editar producto
            public function precargar($params = null){
                       // barrera para usuario logueado
                       $this->authHelper->checkLoggedIn();
                $id = $params[':ID'];
                $categorias=$this->modelCategoria->GetCategoria();
                $producto = $this->model->precargar($id);
                $this->view->precargar($producto,$categorias);


            }
            //edita el producto
            public function editarProducto($params = null) {
                        // barrera para usuario logueado
                $this->authHelper->checkLoggedIn();
                $id_producto =$params[':ID'];
                $nombre = $_POST['nombre'];
                $precio = $_POST['precio'];
                $descripcion = $_POST['descripcion'];
                $id_categoria = $_POST['id_categoria'];
                if ($_FILES['imagen']['name']) {
                    if ($_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/png") {
                        $this->model->editar($id_producto,$nombre, $precio, $descripcion,$id_categoria,$_FILES['imagen']);
                        header("Location: " . BASE_URL."producto");
                    }else {
                        $this->view->showError("formato no aceptado");
                    }
                } else{ if (!empty($nombre)&& !empty($precio)) {
                    $this->model->editar($id_producto,$nombre, $precio, $descripcion,$id_categoria,$_FILES['imagen']);
                    header("Location: " . BASE_URL."producto");
                } else {
                    $this->view->showError("debe completar los campos de categoria,nombre y precio OBLIGATORIOS");

            
    }
}
            }
            //borrar producto
            public function BorrarProducto($params = null){
                // barrera para usuario logueado
                $this->authHelper->checkLoggedIn();
                $id = $params[':ID'];
                $this->model->BorrarProducto($id);
                header("Location: " . BASE_URL."producto");
            }
            
        }