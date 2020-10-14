<?php

require_once('libs/Smarty.class.php');


class homeview {

    function __construct(){     
       $this->smarty = new Smarty();

    }
    public function home(){
        $this->smarty->assign('BASE_URL',BASE_URL);
        $this->smarty->assign('titulo','MARANO HERMANOS S.A.');
        $this->smarty->display('templates/home.tpl');
      }
    }