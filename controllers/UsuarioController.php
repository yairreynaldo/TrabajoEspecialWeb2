<?php
include_once('./view/UsuarioView.php');
include_once('./model/usuarioModel.php');
include_once('./helpers/auth.helper.php');

class LoginController {

    private $view;
    private $model;
    private $authHelper;

    public function __construct() {
        $this->view = new LoginView();
        $this->model = new UserModel();
        $this->authHelper = new AuthHelper();
    }

    public function showLogin() {
        $this->view->showLogin();
    }

    public function verifyUser() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = $this->model->getByUsername($username);

        // encontró un user con el username que mandó, y tiene la misma contraseña
        if (!empty($user) && password_verify($password, $user->password)) {
            $this->authHelper->login($user);
            header('Location: home');
        } else {
            $this->view->showLogin("Login incorrecto");
        }
    }

    public function logout() {
        $this->authHelper->logout();
        header('Location: ' . home);
    }

    public function registrarse(){
       $this->view->registrarse();
    }

    public function getUsuarios(){
        $this->authHelper->checkLoggedIn();
       if($this->authHelper->isAdmin()){
        $usuarios=$this->model->getUsuarios();
        $this->view->showUsuarios($usuarios);
       }else{
        $this->authHelper->checkadmin();

       }
       }

    public function AsignarAdmin($params = null){
        $this->authHelper->checkLoggedIn();
        if($this->authHelper->isAdmin()){
        $id = $params[':ID'];
        $this->model->AsignarAdmin($id);
        header("Location: " .BASE_URL."admin");
        }else{
            $this->authHelper->checkadmin();
           }
        }

     
    public function QuitarAdmin($params = null){
        $this->authHelper->checkLoggedIn();
        if($this->authHelper->isAdmin()){
        $id = $params[':ID'];
        $this->model->eliminaradmin($id);
        header("Location: " .BASE_URL."admin");
        }else{
            $this->authHelper->checkadmin();

        }

     }
    
    public function registrar(){
        $usuario=$_POST['username'];
        $password=$_POST['password'];
        $hash = password_hash("$password", PASSWORD_DEFAULT);
        $this->model->registrarse($usuario,$hash);
        $user = $this->model->getByUsername($usuario);
        $this->authHelper->login($user);
        header("Location: " .BASE_URL."home");



        }
        public function borrarusuario($params=[]){
            $this->authHelper->checkLoggedIn();
         $id=$params[':ID'];
         $this->model->borrarusuario($id);
         header("Location: " .BASE_URL."admin");




        }
}
