<?php
namespace Talex\Utils;

class Assets{
    private $css_files = [];
    private $js_files = [];
    private $inline_scripts = [];
    public static $instance;

    function __construct() {
        self::$instance = $this;
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function addCss($file){
        $this->css_files[] =  '<link rel="stylesheet" href="'.$file.'" type="text/css" />';
        return $this;
    }

    public function addJs($file){
        $this->js_files[] =  "<script nonce=\"**CSP_NONCE**\" type=\"text/javascript\" src=\"".$file."\"></script>";

        return $this;
    }

    public function addInlineScript($script){
        $this->inline_scripts[] = $script;

        return $this;
    }

    public function getCssFiles(){
        return $this->css_files;
    }

    public function getJsFiles(){
        return $this->css_files;
    }

    public function getInlineScripts(){
        return $this->inline_scripts;
    }

    public function renderScripts(){
        //remove duplicates
        $css_files = array_unique($this->getCssFiles());
        
        if($css_files){
            echo implode("\n", $css_files);
        }

        //remove duplicates
        $js_files = array_unique($this->getJsFiles());
        
        if($js_files){
            echo implode("\n", $js_files);
        }
        
        //remove duplicates
        $_scripts = array_unique($this->getInlineScripts());
        
        if($_scripts){
            echo implode("\n", $_scripts);
        }
    }
}