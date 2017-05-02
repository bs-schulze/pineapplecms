<?php
function getBaseDir(){
    return '/var/www/pineapplecms/';
}
function getPage($pagename) {

    $page = new stdClass();
    $page->name = $pagename;
    if (is_dir(getBaseDir() . 'content/' . $pagename)) {
        if (file_exists(getBaseDir() . 'content/' . $pagename . '/content.txt')) {
            $page->content = file_get_contents(getBaseDir() . 'content/' . $pagename . '/content.txt');
            preg_match_all("/<!--([a-z]+) (.+) ([a-z]+)-->/", $page->content, $ausgabe);
            $page->content = trim(preg_replace("/<!--([a-z]+) (.+) ([a-z]+)-->/", "", $page->content));
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
    return parse_ini_file(getBaseDir() . 'config/config.ini');
}

function savePage($title, $url, $content, $active) {
    $fileContent = '<!--title ' . $title . ' title-->' . PHP_EOL;
    $fileContent .= '<!--url ' . $url . ' url-->' . PHP_EOL;
    $fileContent .= '<!--active ' . $active . ' active-->' . PHP_EOL;
    $fileContent .= $content;
    file_put_contents(getBaseDir() . 'content/' . $url . '/content.txt', $fileContent);
}

function createMenu() {
    $handle = opendir('content');
    $arrMenu = [];
    if ($handle) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != '.' && $entry != '..') {
                if (is_dir(getBaseDir() . 'content/' . $entry)) {
                    $page = '';
                    $page = getPage($entry);
                    if ($page && $page->settings['active'] == 'true') {
                        array_push($arrMenu, array($page->settings['url'], $page->settings['title']));
                    }
                }
            }
        }
        closedir($handle);
    }
    return $arrMenu;
}

function securePasswords() {
    $arrFiles = scandir(getBaseDir() . 'config/user');
    foreach ($arrFiles as $file) {
        if($file != '.' && $file != '..' && $file !='example.ini.bak'){
            $user = parse_ini_file(getBaseDir() . 'config/user/'.$file);
            if($user['method'] == 'plain'){
                $user['method'] = 'hash';
                $user['password'] = password_hash($user['password'], PASSWORD_BCRYPT );
                iniWriter(getBaseDir() . 'config/user/'.$file, $user);
            }
        }
    }
}

function iniWriter($filePath, $arrData){
    $content = '';
    foreach ($arrData as $key => $value) {
        $content .= $key . ' = ' . $value . PHP_EOL;
    }
    file_put_contents($filePath, $content);
}
