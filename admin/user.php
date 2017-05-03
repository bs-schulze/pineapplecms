<?php
session_start();
require_once '../system/functions.php';

require_once('../system/smarty/Smarty.class.php');
$config = getConfig();
$smarty = new Smarty();
$smarty->setTemplateDir(getBaseDir().'themes/admin2');
$smarty->setCompileDir(getBaseDir().'templates_c');
$smarty->assign('templateDir', 'themes/admin2');

if(isset($_SESSION['user'])) {
    $smarty->assign('userName', $_SESSION['user'] );
}else{
    header('Location: login.php');
}
$smarty->assign('arrUsers', getAllUsers());
$smarty->assign('main', $smarty->fetch($smarty->getTemplateDir(0) . 'partials/user.html'));
$smarty->display('index.html');
?>