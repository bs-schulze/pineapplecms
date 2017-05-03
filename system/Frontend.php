<?php

require_once './system/Parsedown.php';
require_once('./system/smarty/Smarty.class.php');

class Frontend {

    protected $smarty;
    protected $Parsedown;

    public function __construct() {
        $this->smarty = new Smarty();
        $this->Parsedown = new Parsedown();
        
        $this->smarty->setTemplateDir('themes/clean');
        $this->smarty->assign('templateDir', 'themes/clean');
        $arrMenu = createMenu();
        $config = getConfig();

        if (filter_input(INPUT_GET, 'page')) {
            $page = getPage(filter_input(INPUT_GET, 'page'));
        } else {
            $page = getPage($config['startPage']);
        }
        $this->smarty->assign('arrMenu', $arrMenu);
        $this->smarty->assign('metaTitle', $page->settings['title'] . ' // ' . $config['pagename']);
        $this->smarty->assign('pageName', $config['pagename']);
        $this->smarty->assign('pagenameSubtitle', $config['pagenameSubtitle']);
        $this->smarty->assign('content', $this->Parsedown->text($page->content));
        if($page->settings['active'] == 'false'){
            $smarty->assign('content', '404 Seite nicht gefunden');
                
        }
        $this->smarty->display('index.html');
    }

}
