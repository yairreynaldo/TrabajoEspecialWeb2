<?php

require_once('libs/Smarty.class.php');


class homeview {

    function __construct(){
      $authHelper = new AuthHelper();
       $userName = $authHelper->getLoggedUserName();
       $isAdmin =$authHelper->isAdmin();     
       $this->smarty = new Smarty();
            $this->smarty->assign('BASE_URL',BASE_URL);
            $this->smarty->assign('userName', $userName);
            $this->smarty->assign('isAdmin', $isAdmin);

    }
    public function home(){
        $this->smarty->assign('BASE_URL',BASE_URL);
        $this->smarty->assign('titulo','MARANO HERMANOS S.A.');
        $this->smarty->display('templates/home.tpl');
      }
    }