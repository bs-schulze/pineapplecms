<?php

require_once('../system/smarty/Smarty.class.php');

class Backend {

    protected $smarty;

    function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir(getBaseDir() . 'themes/admin2');
        $this->smarty->setCompileDir(getBaseDir() . 'templates_c');
        $this->smarty->assign('templateDir', 'themes/admin2');
        if (isset($_SESSION['user'])) {
            $this->smarty->assign('userName', $_SESSION['user']);
        } else {
            header('Location: login.php');
        }
    }

}
