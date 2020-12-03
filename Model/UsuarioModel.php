<?php

class UserModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=supermecado;charset=utf8', 'root', '');
    }

    /**
     * Retorna un usuario según el username pasado.
     */

     public function getUsuarios(){
        $query = $this->db->prepare('SELECT * FROM usuarios');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);


     }

     public function getusuario($id){
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE id = ?');
        $query->execute(array($id));

         return $query->fetch(PDO::FETCH_OBJ);
     }

    public function getByUsername($username) {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE username = ?');
       $query->execute(array($username));
        return $query->fetch(PDO::FETCH_OBJ);
    }
    public function registrarse($username,$password){
        $sentencia = $this->db->prepare("INSERT INTO usuarios(username,password) VALUES(?,?)");
        $sentencia->execute(array($username,$password));


    }
    public function AsignarAdmin($id){
        $sentencia =  $this->db->prepare("UPDATE usuarios SET  admin=1 WHERE id=?");
        $sentencia->execute(array($id));
    }
    public function eliminaradmin($id){
        $sentencia =  $this->db->prepare("UPDATE usuarios SET  admin=0 WHERE id=?");
        $sentencia->execute(array($id));
    }
    public function borrarusuario($id){
        $sentencia=$this->db->prepare("DELETE FROM usuarios where id=?");
        $sentencia->execute(array($id));


    }

}