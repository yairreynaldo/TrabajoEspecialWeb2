<?php
        require_once ".\Model\ProductoModel.php";
        require_once "view\Productoview.php";
        require_once "view\homeview.php";
        require_once "view\Nosotrosview.php";
        include_once('helpers/auth.helper.php');


        class ProductoController {
            private $model;
            private $modelcategoria;
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
            
            //agrega un producto
            public function AgregarProducto() {
                       // barrera para usuario logueado
                       $this->authHelper->checkLoggedIn();

                $id_categoria =$_POST['id_categoria'];
                $nombre = $_POST['nombre'];
                $precio = $_POST['precio'];
                $descripcion = $_POST['descripcion'];

                
                if (empty($id_categoria) && empty($nombre)&& empty($precio)) {
                    $this->view->showError("debe completar los campos de categoria,nombre y precio OBLIGATORIOS");
                    die();
                }
                $this->model->AgregarProducto($id_categoria,$nombre, $precio, $descripcion);
                header("Location: " . BASE_URL . "producto");
                
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
                        $this->model->editar($id_producto,$nombre, $precio, $descripcion,$id_categoria,$_FILES['imagen']);
                        header("Location: " . BASE_URL."producto");
                if (!empty($nombre)&& !empty($precio)) {
                    $this->model->editar($id_producto,$nombre, $precio, $descripcion,$id_categoria);
                    header("Location: " . BASE_URL."producto");
                } else {
                    $this->view->showError("debe completar los campos de categoria,nombre y precio OBLIGATORIOS");
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