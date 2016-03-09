<?php

function getPage($pagename) {

    $page = new stdClass();
    $page->name = $pagename;
    if (is_dir('content/' . $pagename)) {
        if (file_exists('content/' . $pagename . '/content.txt')) {
            $page->content = file_get_contents('content/' . $pagename . '/content.txt');
            preg_match_all("/<!--([a-z]+) (.+) ([a-z]+)-->/", $page->content, $ausgabe);
            $page->content = trim(preg_replace("/<!--([a-z]+) (.+) ([a-z]+)-->/", "", $page->content));
//            print_R($ausgabe);
            for ($i = 0; $i < count($ausgabe[1]); $i++) {
                $page->settings[$ausgabe[1][$i]] = $ausgabe[2][$i];
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
    return $page;
}

function getConfig() {
    return parse_ini_file('config/config.ini');
}

function savePage($title, $url, $content, $active) {
    $fileContent = '<!--title ' . $title . ' title-->' . PHP_EOL;
    $fileContent .= '<!--url ' . $url . ' url-->' . PHP_EOL;
    $fileContent .= '<!--active ' . $active . ' active-->' . PHP_EOL;
    $fileContent .= $content;
    file_put_contents('content/' . $url . '/content.txt', $fileContent);
}

function createMenu() {
    $handle = opendir('content');
    $arrMenu = [];
    if ($handle) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != '.' && $entry != '..') {
                if (is_dir('content/' . $entry)) {
                    $page = '';
                    $page = getPage($entry);
                    if ($page && $page->settings['active'] == 'true') {
                        array_push($arrMenu, array($page->settings['url'], $page->settings['title']));
//                        $arrMenu[$page->settings['url']] = $page->settings['title'];
//                        echo $entry .'<br>';
//                        echo $page->settings['title'];
//                        echo "<hr>";
                    }
                }
            }
        }
        closedir($handle);
    }
    return $arrMenu;
}
