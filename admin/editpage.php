<?php

session_start();
require_once '../system/functions.php';
require_once '../system/Backend.php';

class EditPage extends Backend {

    public function __construct() {
        parent::__construct();
        
        $page = getPage(filter_input(INPUT_GET, 'page'));
        if (filter_input(INPUT_POST, 'content')) {
            savePage(filter_input(INPUT_POST, 'title'), filter_input(INPUT_POST, 'url'), filter_input(INPUT_POST, 'content'), filter_input(INPUT_POST, 'active'));
        }

        $page = getPage(filter_input(INPUT_GET, 'page'));
        $this->smarty->assign('page', $page);
        $this->smarty->assign('main', $this->smarty->fetch($this->smarty->getTemplateDir(0) . 'partials/editpage.html'));
        $this->smarty->display('index.html');
    }

}

$editPage = new EditPage();
?>


