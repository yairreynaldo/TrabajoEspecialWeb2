

<?php

require_once('libs/Smarty.class.php');


class Categoriaview {
    private $smarty;

    function __construct(){
        $authHelper = new AuthHelper();
        $userName = $authHelper->getLoggedUserName();
        $isAdmin =$authHelper->isAdmin(); ;            

        $this->smarty = new Smarty();
        $this->smarty->assign('BASE_URL',BASE_URL);
        $this->smarty->assign('userName', $userName);
        $this->smarty->assign('isAdmin', $isAdmin);


    }
public function display($Categoria){
    $this->smarty->assign('titulo',"Lista de categorias");
     $this->smarty->assign('lista_categoria',$Categoria);
      $this->smarty->display('templates/VerCategorias.tpl');


    }
    public function precargarcat($categoria){
        $this->smarty->assign('titulo',"precargar");
        $this->smarty->assign('cat',$categoria);
        $this->smarty->display('templates/precargarcat.tpl');   
    }
    public function showCategoria($Categoria) {
        $this->smarty->assign('Categoria', $Categoria);
        $this->smarty->display('templates/productoporcat.tpl');
    }
    public function displayError($msgError) {
        echo "<h1>ERROR!</h1>";
        echo "<h2>{$msgError}</h2>";
    }
}