<?php

session_start();
require_once '../system/functions.php';
require_once '../system/Backend.php';

$backend = new Backend();


$config = getConfig();

class Page extends Backend {

    function __construct() {
        parent::__construct();
        $this->smarty->assign('arrPages', getAllPages());
        $this->smarty->assign('main', $this->smarty->fetch($this->smarty->getTemplateDir(0) . 'partials/addpage.html'));
        $this->smarty->display('index.html');
    }

}
$page = new Page();
?>
<?php

$pagename = filter_input(INPUT_POST, 'pagename');
$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $pagename);
$clean = preg_replace("/[\/_|+ -]+/", '-', $clean);
$clean = strtolower(trim($clean, '-'));
$clean;
if ($clean) {
    if (!is_dir(getBaseDir() . 'content/' . $clean)) {
        if (mkdir(getBaseDir() . 'content/' . $clean)) {
            savePage($pagename, $clean, "Test", 'false');
        }
    }
}
?>

