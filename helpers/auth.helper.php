<?php

class AuthHelper {
    public function __construct() {}
    
    public function login($user) {
        // INICIO LA SESSION Y LOGUEO AL USUARIO
        session_start();
        $_SESSION['ID_USER'] = $user->id;
        $_SESSION['USERNAME'] = $user->username;


    }
//logout
    public function logout() {
        session_start();
        session_destroy();
    }
//checkea si el usuario esta logueado
    public function checkLoggedIn() {
        if (!isset($_SESSION['ID_USER'])) {
            header('Location: ' . LOGIN);
            die();
        }       
    }
}