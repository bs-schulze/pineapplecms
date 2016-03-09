<?php 
session_start();
require_once './system/functions.php';
if(isset($_SESSION['user'])) {
    echo $_SESSION['user'];
}else{
    header('Location: login.php');
}
?>
<?php
$pagename= filter_input(INPUT_POST, 'pagename');
$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $pagename);
$clean = preg_replace("/[\/_|+ -]+/", '-', $clean);
$clean = strtolower(trim($clean, '-'));
$clean;
if($clean){
    if(!is_dir('content/'.$clean)){
        if(mkdir('content/'.$clean)){
            savePage($pagename, $clean, "Test", 'false');
        }
    }
}
?>
<hr>

<?php
$handle = opendir('content');
if ($handle) {
    echo "Seiten<ul>";
    /* Das ist der korrekte Weg, ein Verzeichnis zu durchlaufen. */
    while (false !== ($entry = readdir($handle))) {
        if($entry != '.' && $entry != '..'){
            echo '<li>'.$entry.' <a href="editpage.php?page='.$entry.'">edit</a></li>';
        }
    }
    closedir($handle);
}
?>
</ul>
<hr>
<form method="post">
    Pagename: <input type="text" name="pagename">
    <input type="submit">
</form>
<form method="post">
    <textarea name="text"></textarea><br>
    <input type="submit">
</form>