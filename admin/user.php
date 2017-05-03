<?php

session_start();
require_once '../system/functions.php';
require_once '../system/Backend.php';

$backend = new Backend();

class User extends Backend {

    public function __construct() {
        parent::__construct();
        $this->smarty->assign('arrUsers', getAllUsers());
        $this->smarty->assign('main', $this->smarty->fetch($this->smarty->getTemplateDir(0) . 'partials/user.html'));
        $this->smarty->display('index.html');
    }
}

$user = new User();
