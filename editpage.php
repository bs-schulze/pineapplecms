<?php 
session_start();
require_once './system/functions.php';
//if(isset($_SESSION['user'])) {echo $_SESSION['user'];}  

$page = getPage(filter_input(INPUT_GET, 'page'));
if(filter_input(INPUT_POST, 'content')){
    savePage(filter_input(INPUT_POST, 'title'), filter_input(INPUT_POST, 'url'), filter_input(INPUT_POST, 'content'));
}

$page = getPage(filter_input(INPUT_GET, 'page'));
?>
<html>
<body>
        
    <form method="post">
<?php
foreach ($page->settings as $key => $value) {
    echo $key. ': <input type="text" name="'.$key.'" value="'.$value.'"><br>';
}
?>
        <textarea name="content"><?php echo $page->content ?></textarea><br>
<input type="submit">
</form>  
</body>
</html>

