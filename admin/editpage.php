<?php 
session_start();
require_once '../system/functions.php';

require_once('../system/smarty/Smarty.class.php');
$config = getConfig();
$smarty = new Smarty();
$smarty->setTemplateDir(getBaseDir().'themes/admin');
$smarty->setCompileDir(getBaseDir().'templates_c');
$smarty->assign('templateDir', 'themes/admin');

if(isset($_SESSION['user'])) {
    $smarty->assign('userName', $_SESSION['user'] );
}else{
    header('Location: login.php');
}

$page = getPage(filter_input(INPUT_GET, 'page'));
if(filter_input(INPUT_POST, 'content')){
    savePage(filter_input(INPUT_POST, 'title'), filter_input(INPUT_POST, 'url'), filter_input(INPUT_POST, 'content'), filter_input(INPUT_POST, 'active'));
}

$page = getPage(filter_input(INPUT_GET, 'page'));
?>

        
    <form method="post">
<?php
foreach ($page->settings as $key => $value) {
    echo $key. ': <input type="text" name="'.$key.'" value="'.$value.'"><br>';
}
?>
        <textarea name="content"><?php echo $page->content ?></textarea><br>
<input type="submit">
</form>  

<iframe width ="100%" height="400px" src="http://localhost/pineapplecms/index.php?page=<?php echo filter_input(INPUT_GET, 'page') ?>">


