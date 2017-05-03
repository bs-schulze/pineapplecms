<?php session_start(); ?>
<?php
require_once '../system/functions.php';


require_once('../system/smarty/Smarty.class.php');
$config = getConfig();
$smarty = new Smarty();
$smarty->setTemplateDir(getBaseDir().'themes/admin2');
$smarty->setCompileDir(getBaseDir().'templates_c');
$smarty->assign('templateDir', 'themes/admin2');


securePasswords();

if(file_exists(getBaseDir() . 'config/user/'.filter_input(INPUT_POST, 'username').'.ini')){
    $user = parse_ini_file(getBaseDir() . 'config/user/'.filter_input(INPUT_POST, 'username').'.ini');
    if(password_verify(filter_input(INPUT_POST, 'password'), $user['password'])){
        $_SESSION['user'] = filter_input(INPUT_POST, 'username');
    }
}

if(isset($_SESSION['user'])) {
    header('Location: addpage.php');
}

$smarty->display('login.html');
?>

       
        <?php


?>


