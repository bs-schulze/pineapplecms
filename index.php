<?php 
session_start(); 
require_once './system/Parsedown.php';
require_once './system/functions.php';
$Parsedown = new Parsedown();
$page = getPage(filter_input(INPUT_GET, 'page'));
$config = getConfig();
$arrMenu = createMenu();
//var_dump($page)

?>
<html>
    <head>
        <title><?php echo $page->settings['title']; ?></title>
    </head>
    <body>
        <?php if(isset($_SESSION['user'])){ ?>
        <div id="admin" style="background-color: #efefef; height: 50px; vertical-align: middle;">
            <?php echo $_SESSION['user']; ?> | <a href="addpage.php">Seiten</a>
        </div>
        <?php } ?>
        <div id="menu">
            <ul>
            <?php
                foreach ($arrMenu as $menuItem) {
                    echo '<li><a href="index.php?page='.$menuItem[0].'">'. $menuItem[1] .'</a></li>';
                }
            ?>
            </ul>
            
        </div>
        <div id="main">
            <?php
                echo $Parsedown->text($page->content);
            ?>
        </div>
        <?php if($config['debug']){ ?>
        <div style="background-color: #efefef;">
            <pre>
                <?php
                var_dump($page);
                var_dump($config);
                var_dump(createMenu());
                ?>
            </pre>
        </div>
        <?php } ?>
    </body>
</html>
