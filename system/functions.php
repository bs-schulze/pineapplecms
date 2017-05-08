<?php
require_once 'Spyc.php';
function getBaseDir() {
    return '/var/www/pineapplecms/';
}

function getAllPages() {
    $handle = opendir(getBaseDir() . 'content');
    $arrPages = [];
    if ($handle) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != '.' && $entry != '..') {
                if (is_dir(getBaseDir() . 'content/' . $entry)) {
                    $page = '';
                    $page = getPage($entry);
                    $page->dirName = $entry;
                    array_push($arrPages, $page);
                }
            }
        }
        closedir($handle);
    }
    return $arrPages;
}

function getPage($pagename) {

    $page = new PageModel();
    
    if (is_dir(getBaseDir() . 'content/' . $pagename)) {
        if (file_exists(getBaseDir() . 'content/' . $pagename . '/content.yml')) {
            $arrPage =  Spyc::YAMLLoad(getBaseDir() . 'content/' . $pagename . '/content.yml');
            $page->setName($arrPage['name']);
            $page->setTitle($arrPage['title']);
            $page->setPublished($arrPage['published']);
            $page->setUrl($arrPage['url']);
            $page->setContent($arrPage['content']);
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
    if(file_exists(getBaseDir() . 'content/' . $url . '/content.txt')){
        copy(getBaseDir() . 'content/' . $url . '/content.txt', getBaseDir() . 'content/' . $url . '/content.txt.bak');
    }
    file_put_contents(getBaseDir() . 'content/' . $url . '/content.txt', $fileContent);
}

function createMenu() {
    $arrPages = getAllPages();
    $arrMenu = [];
    if ($arrPages) {
        foreach ($arrPages as $page) {
            if ($page && $page->isPublished() == 'true') {
                array_push($arrMenu, array($page->getUrl(), $page->getName()));
            }
        }
    }
    return $arrMenu;
}

function securePasswords() {
    $arrFiles = scandir(getBaseDir() . 'config/user');
    foreach ($arrFiles as $file) {
        if ($file != '.' && $file != '..' && $file != 'example.ini.bak') {
            $user = parse_ini_file(getBaseDir() . 'config/user/' . $file);
            if ($user['method'] == 'plain') {
                $user['method'] = 'hash';
                $user['password'] = password_hash($user['password'], PASSWORD_BCRYPT);
                iniWriter(getBaseDir() . 'config/user/' . $file, $user);
            }
        }
    }
}

function getAllUsers() {
    $arrUsers = array();
    $arrFiles = scandir(getBaseDir() . 'config/user');
    foreach ($arrFiles as $file) {
        if ($file != '.' && $file != '..' && $file != 'example.ini.bak') {
            $user = parse_ini_file(getBaseDir() . 'config/user/' . $file);
            array_push($arrUsers, $user);
        }
    }
    return $arrUsers;
}

function iniWriter($filePath, $arrData) {
    $content = '';
    foreach ($arrData as $key => $value) {
        $content .= $key . ' = ' . $value . PHP_EOL;
    }
    file_put_contents($filePath, $content);
}
