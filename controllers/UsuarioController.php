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
            echo $password;
            var_dump($user);
            $this->view->showLogin("Login incorrecto");
        }
    }

    public function logout() {
        $this->authHelper->logout();
        header('Location: ' . home);
    }
}