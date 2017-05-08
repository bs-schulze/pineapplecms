<?php

session_start();
require_once '../system/functions.php';
require_once '../system/Backend.php';
require_once '../system/PageModel.php';

$backend = new Backend();


$config = getConfig();

class Page extends Backend {

    function __construct() {
        parent::__construct();
        $arrPages = getAllPages();
        $smPages = array();
        foreach ($arrPages as $page) {
            array_push($smPages, $page->getData());
        }
        $this->smarty->assign('arrPages', $smPages);
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
$max=0;
$pages = getAllPages();
foreach ($pages as $page) {
    if(preg_match("/^([0-9]{2,})-\w+/", $page->dirName, $match)){
        if($match[1]>$max){
            $max = $match[1];
        }
    }
}
$max++;
$maxNumber = str_pad($max, 2, 0, STR_PAD_LEFT);
if ($clean) {
$clean =$maxNumber.'-'.$clean;
    if (!is_dir(getBaseDir() . 'content/' . $clean)) {
        if (mkdir(getBaseDir() . 'content/' . $clean)) {
            //savePage($pagename, $clean, "Test", 'false');
            $myPage = new PageModel();
            $myPage->setName($pagename);
            $myPage->setPublished(false);
            $myPage->setUrl($clean);
            $myPage->save(getBaseDir() . 'content/' . $clean . '/content.yml');
        }
    }
}
?>

