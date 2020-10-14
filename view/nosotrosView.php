<?php

require_once('libs/Smarty.class.php');


class nosotrosview {

    function __construct(){     
       $this->smarty = new Smarty();

    }
    public function nosotros(){
        $this->smarty->assign('BASE_URL',BASE_URL);
        $this->smarty->assign('titulo','MARANO HERMANOS S.A.');
        $this->smarty->display('templates/nosotros.tpl');
      }
    }