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

$smarty->assign('arrPages', getAllPages());
$smarty->assign('main', $smarty->fetch($smarty->getTemplateDir(0) . 'partials/addpage.html'));
?>
<?php $smarty->display('index.html');?>
<?php
$pagename= filter_input(INPUT_POST, 'pagename');
$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $pagename);
$clean = preg_replace("/[\/_|+ -]+/", '-', $clean);
$clean = strtolower(trim($clean, '-'));
$clean;
if($clean){
    if(!is_dir(getBaseDir() . 'content/'.$clean)){
        if(mkdir(getBaseDir() . 'content/'.$clean)){
            savePage($pagename, $clean, "Test", 'false');
        }
    }
}
?>

