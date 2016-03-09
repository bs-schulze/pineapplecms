<?php 
session_start(); 
require_once './system/Parsedown.php';
require_once './system/functions.php';
require_once('./system/smarty/Smarty.class.php');
$config = getConfig();
$smarty = new Smarty();
$smarty->setTemplateDir('themes/clean');
$smarty->assign('templateDir', 'themes/clean');

$Parsedown = new Parsedown();
if(filter_input(INPUT_GET, 'page')){    
    $page = getPage(filter_input(INPUT_GET, 'page'));
}else{
    $page = getPage($config['startPage']);
}
$arrMenu = createMenu();
//var_dump($page)
$smarty->assign('metaTitle', $page->settings['title'] . ' // ' . $config['pagename']);
$smarty->assign('pageName', $config['pagename']);
$smarty->assign('pagenameSubtitle', $config['pagenameSubtitle']);
$smarty->assign('arrMenu', $arrMenu);
$smarty->assign('content', $Parsedown->text($page->content));
$smarty->display('index.html');

?>