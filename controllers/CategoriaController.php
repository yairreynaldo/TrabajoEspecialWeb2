<?php
require_once ".\Model\CategoriaModel.php";
require_once "view\Categoriaview.php";
include_once('helpers/auth.helper.php');


class CategoriaController {

    private $model;
    private $view;
   private $authHelper;
    
	function __construct(){

        $this->authHelper = new AuthHelper();
        $this->model = new CategoriaModel();
        $this->view = new  CategoriaView();
    }
    
    public function AgregarCategoria(){
               // barrera para usuario logueado
               $this->authHelper->checkLoggedIn();

        $this->model->AgregarCategoria($_POST['nombre'],$_POST['descripcion']);
        header("Location: " . BASE_URL."producto");

    }
    public function editarcat($params = null) {
               // barrera para usuario logueado
               $this->authHelper->checkLoggedIn();

        $id_cat =$params[':ID'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        if (!empty($nombre)) {
            $this->model->editarcat($id_cat,$nombre,$descripcion);
            header("Location: " . BASE_URL."producto");

        } else {
            $this->view->displayError("debe completar los campos de categoria,nombre y precio OBLIGATORIOS");
        }
    }
    
    public function precargarcat($params = null){
               // barrera para usuario logueado
               $this->authHelper->checkLoggedIn();
        $id = $params[':ID'];
        $categoria = $this->model->precargarcat($id);
        $this->view->precargarcat($categoria);


    }
    public function getProducto($params = null) {
        $id = $params[':ID'];
        $Categoria = $this->model->get($id);

        if ($Categoria) // si existe la tarea
            $this->view->showCategoria($Categoria);
        else
        $this->view->displayError("no existen productos con esa categoria ");

    }

    public function borrarCat($params = null){
               // barrera para usuario logueado
               $this->authHelper->checkLoggedIn();
        $id=$params[':ID'];
        $producto = $this->model->get($id);
        if (!$producto){
           $this->model->borrarCat($id);
           header("Location: " . BASE_URL."producto");
        }else{
            $this->view->displayError("no puede borrar esta categoria porque existen productos asociados ");

        }


    }

}