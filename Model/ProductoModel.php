<?php

    class ProductoModel {

        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=supermercado;charset=utf8', 'root', '');
        }
        
         //producto por id
        public function getp($id){
            $sentencia=$this->db->prepare('SELECT * FROM producto where id_producto=?');
            $sentencia->execute(array($id));
            return $sentencia->fetch(PDO::FETCH_OBJ);

        }
        //join productos mas nombre de la categoria
        public function GetProducto(){
            $sentencia=$this->db->prepare("SELECT p.*, c.nombre as categoria FROM producto p JOIN categoria c ON c.id_categoria = p.id_categoria");
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }
        //obtiene todo de la categoria 
        public function get() {
            $query = $this->db->prepare('SELECT DISTINCT * FROM categoria');
            $query->execute();
        $categorias=$query->fetchAll(PDO::FETCH_OBJ);
        return $categorias;
        }
        //agrega un producto
        public function AgregarProducto($id_categoria,$nombre,$precio,$descripcion ){
            $sentencia = $this->db->prepare("INSERT INTO producto(id_categoria,nombre,precio,descripcion) VALUES(?,?,?,?)");
            $sentencia->execute(array($id_categoria,$nombre,$precio,$descripcion));
        }
        //borrar producto
        public function BorrarProducto($id){
            $sentencia = $this->db->prepare("DELETE FROM producto WHERE id_producto=?");
            $sentencia->execute(array($id));
        }
        //precarga el editar
        function precargar($id) {
            $query = $this->db->prepare('SELECT * FROM producto WHERE id_producto=?');
            $query->execute(array($id));

            return $query->fetch(PDO::FETCH_OBJ);
        }
        //editar
        public function editar($id_producto, $nombre,$precio, $descripcion,$id_categoria){
            $sentencia =  $this->db->prepare("UPDATE producto SET nombre=?,precio=?, descripcion=?,id_categoria=? WHERE id_producto=?");
            $sentencia->execute(array($nombre,$precio ,$descripcion,$id_categoria, $id_producto));

        }

    }