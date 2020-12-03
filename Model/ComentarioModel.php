<?php


class ComentariosModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=supermecado;charset=utf8', 'root', '');

    }

    public function getComentarios(){
        $sentencia=$this->db->prepare("SELECT p.*, c.nombre FROM comentarios p JOIN producto c ON c.id_producto = p.id_producto");
        $sentencia->execute();

        $Comentario=$sentencia->fetchAll(PDO::FETCH_OBJ);


        return $Comentario;


    }
    public function getComentario($id){
        $sentencia=$this->db->prepare('SELECT * FROM comentarios where id_producto=?');
        $sentencia->execute(array($id));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);

    }
    public function getComent($id){
        $sentencia=$this->db->prepare('SELECT * FROM comentarios where id_comentario=?');
        $sentencia->execute(array($id));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);

    }
    public function borrarComentario($id){
        $sentencia=$this->db->prepare("DELETE FROM comentarios where id_comentario=?");
        $sentencia->execute(array($id));
 
    }
    public function AgregarComentario($usuario,$comentario,$id_producto,$puntaje){
        $sentencia = $this->db->prepare("INSERT INTO comentarios(usuario,comentario,id_producto,puntaje) VALUES(?,?,?,?)");
        $sentencia->execute(array($usuario,$comentario,$id_producto,$puntaje));


    }

    
    
}
