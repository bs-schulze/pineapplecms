<?php
require_once 'Spyc.php';
require_once 'functions.php';

/**
 * Description of PageModel
 *
 * @author hannes
 */
class PageModel {
    protected $name;
    protected $title;
    protected $published;
    protected $url;
    protected $content;


    public function setName($name){
        $this->name = $name;
        return $this;
    }
    
    public function setTitle($title){
        $this->title = $title;
        return $this;
    }
    
    public function setPublished($published){
        $this->published = $published;
        return $this;
    }
    
    public function setUrl($url){
        $this->url = $url;
        return $this;
    }
    
    public function setContent($content){
        $this->content = $content;
        return $this;
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function getUrl(){
        return $this->url;
    }
    
    public function getTitle(){
        return $this->title;
    }
    
    public function getContent(){
        return $this->content;
    }
    
    public function isPublished(){
        return $this->published;
    }
    
    public function getData(){
        $pageData = array();
        $pageData['name'] = $this->getName();
        $pageData['title'] = $this->getTitle();
        $pageData['published'] = $this->isPublished();
        $pageData['url'] = $this->getUrl();
        $pageData['content'] = $this->getContent();
        return $pageData;
    }

    public function save($path){
        $pageData = array();
        $pageData['name'] = $this->getName();
        $pageData['title'] = $this->getTitle();
        $pageData['published'] = $this->isPublished();
        $pageData['url'] = $this->getUrl();
        $pageData['content'] = $this->getContent();
        $yaml = Spyc::YAMLDump($pageData);
        
        file_put_contents($path, $yaml);
    }
    
    
}
