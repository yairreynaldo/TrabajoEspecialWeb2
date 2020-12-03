<?php

class AuthHelper {
    public function __construct() {}
    
    public function login($user) {
        // INICIO LA SESSION Y LOGUEO AL USUARIO
        session_start();
        $_SESSION['ID_USER'] = $user->id;
        $_SESSION['USERNAME'] = $user->username;
        $_SESSION['admin'] = $user->admin;


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
    //redireccion cuando no es admin a home
            public function checkadmin(){
                header('Location: '.BASE_URL.'home');
             die();
            }
    public function isAdmin(){
        //pregunta si la sesion esta habilitada y si existe
        if (session_status() != PHP_SESSION_ACTIVE)
        session_start();
        if (isset($_SESSION['admin'])) {
            return $_SESSION['admin']==1;
            return true;
        }else{
            return false;
        }
            }
            //obtiene el username
    public function getLoggedUserName() {
                //pregunta si la sesion esta habilitada y si existe
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
            if (isset($_SESSION['ID_USER'])) {
            return    $_SESSION["USERNAME"];
    }else{
        return null;
    }
    
}
}