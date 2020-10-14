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

            function __construct(){
                //$this->model = new ProductoModel();
                //$this->view = new  Productoview();
                $this->view1 = new  homeview();
                $this->view2 = new  nosotrosview();
                //$this->modelCategoria=new CategoriaModel();

            }

            //pagina home
            public function home(){
                $this->view1->home();
        }
            //paginas nosotros
            public function nosotros(){
                $this->view2->nosotros();

            }
        }