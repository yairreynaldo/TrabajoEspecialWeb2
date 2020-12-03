<?php
require_once('libs/Smarty.class.php');

class LoginView {

    private $smarty;

    public function __construct() {
        $authHelper = new AuthHelper();
            $isAdmin =$authHelper->isAdmin(); 
            $userName = $authHelper->getLoggedUserName();

        $this->smarty = new Smarty();
        $this->smarty->assign('BASE_URL', BASE_URL);
        $this->smarty->assign('isAdmin', $isAdmin);
        $this->smarty->assign('userName', $userName);



    }
//muestrar form para loguearse
    public function showLogin($error = null) {
        $this->smarty->assign('titulo', 'Iniciar Sesión');
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/usuario.tpl');
    }

    //muestra la pagina de admin
    public function showUsuarios($usuarios){
        $this->smarty->assign('usuarios',$usuarios);
        $this->smarty->display('templates/Admin.tpl');


    }
    //muestra form para registrarse
    public function registrarse() {
        $this->smarty->assign('titulo', 'Registrarse');
        $this->smarty->display('templates/registrarse.tpl');
    }

}