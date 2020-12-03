<?php

class CategoriaModel {

    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=supermecado;charset=utf8', 'root', '');
    }

	public function GetCategoria(){
        $sentencia = $this->db->prepare( "SELECT * from categoria");
        $sentencia->execute();
        $Categoria = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $Categoria;
    }	
    function precargarcat($id) {
        $query = $this->db->prepare('SELECT * FROM categoria WHERE id_categoria=?');
        $query->execute(array($id));

        return $query->fetch(PDO::FETCH_OBJ);
    }
    public function editarcat($id_categoria, $nombre,$descripcion){
        $sentencia =  $this->db->prepare("UPDATE  categoria SET nombre=?,descripcion=? WHERE id_categoria=?");
        $sentencia->execute(array($nombre,$descripcion,$id_categoria));

    }

/**
     * Retorna una tarea según el id pasado.
     */
    //booleano para el usuario

    public function get($id) {
        $query = $this->db->prepare('SELECT p.*, c.nombre as categoria FROM producto p JOIN categoria c ON c.id_categoria = p.id_categoria AND P.id_categoria=?');
        $query->execute(array($id));

        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function AgregarCategoria($nombre,$descripcion){
        $sentencia=$this->db->prepare("INSERT INTO categoria(nombre,descripcion)VALUES(?,?)");
        $sentencia->execute(array($nombre,$descripcion));
    }
    public function borrarcat($id){
        $sentencia=$this->db->prepare("DELETE FROM categoria where id_categoria=?");
        $sentencia->execute(array($id));
 
    }
    private function moveFile($imagen) {
        $filepath = "imgagenescat/" . uniqid() . "." . strtolower(pathinfo($imagen['name'], PATHINFO_EXTENSION));  
        move_uploaded_file($imagen['tmp_name'], $filepath);
        return $filepath;
    }
    
}