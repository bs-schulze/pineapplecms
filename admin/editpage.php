<?php

session_start();
require_once '../system/functions.php';
require_once '../system/Backend.php';
require_once '../system/PageModel.php';

class EditPage extends Backend {

    public function __construct() {
        parent::__construct();
        
        $page = getPage(filter_input(INPUT_GET, 'page'));
        
        if (filter_input(INPUT_POST, 'content')) {
            $page->setContent(filter_input(INPUT_POST, 'content'));
            $page->save(getBaseDir() . 'content/' . filter_input(INPUT_GET, 'page') . '/content.yml');
        }
        $page = getPage(filter_input(INPUT_GET, 'page'));
        var_dump($page);
        $this->smarty->assign('page', $page->getData());
        $this->smarty->assign('main', $this->smarty->fetch($this->smarty->getTemplateDir(0) . 'partials/editpage.html'));
        $this->smarty->display('index.html');
    }

}

$editPage = new EditPage();
?>


