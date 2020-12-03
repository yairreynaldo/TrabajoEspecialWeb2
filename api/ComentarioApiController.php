<?php
        require_once ".\Model\ComentarioModel.php";
require_once("./api/apiController.php");
require_once("./api/JSONView.php");




class ComentarioApiController extends ApiController{
             //agregar Comentarios api
        public function AgregarComentario($params = []) {     
            $body = $this->getData();
         
            // inserta el comentario
            $id_producto = $body->id_producto;
            $usuario = $body->usuario;
            $comentario = $body->comentario;
            $producto = $this->model->AgregarProducto($id_producto,$usuario,$comentario );
        }
        //obtener comentarios
        public function GetComentarios($params=null){
            $comentario = $this->model->getComentarios();
            $this->view->response($comentario, 200);
        }
      //obtener comentario
        public function getcomentario($params=[]){
            $id=$params[':ID'];
            $comentario = $this->model->GetComentario($id);
            $this->view->response($comentario, 200);

        }
              //borrar comentario
        public function BorrarComentario($params = []) {
            $id = $params[':ID'];
            $comentario = $this->model->getComent($id);
    
            if ($comentario) {
                $this->model->BorrarComentario($id);
                $this->view->response("comentarios id=$id eliminada con éxito", 200);
            }
            else 
                $this->view->response("comentario id=$id not found", 404);
        }
    }
    