<?php

require_once('libs/Smarty.class.php');


class  Nosotrosview{

    function __construct(){
      $authHelper = new AuthHelper();
      $userName = $authHelper->getLoggedUserName();
      $isAdmin =$authHelper->isAdmin(); ;            

      $this->smarty = new Smarty();
           $this->smarty->assign('BASE_URL',BASE_URL);
           $this->smarty->assign('userName', $userName);
           $this->smarty->assign('isAdmin', $isAdmin);


    }

    public function nosotros(){
        $this->smarty->display('templates/nosotros.tpl');
      }
}