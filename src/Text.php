<?php
namespace Talex\Utils;

class Text{
    private $string;

    public function __construct(string $string)
    {
        $this->string = $string;
    }

    public function truncate($chars = 25, $link = '', $label = 'read more') {
        $text = $this->string." ";
        $text = substr($text,0,$chars);
        $text = substr($text,0,strrpos($text,' '));
        $text = $text."...";

        if($link){
            $text .= '<a href="'.$link.'">'.$label.'</a>';
        }

        $this->string = $text;

        return $this;
    }

    public function removeDiacritics(){
        $text = $this->string;
        $diac = ['ă', 'Ă', 'â', 'Â', 'î', 'Î', 'ş', 'Ş', 'ţ', 'Ţ' , 'Ș' , 'ș' , 'Ț' , 'ț'];
        $inloc = ['a', 'A', 'a', 'A', 'i', 'I', 's', 'S', 't', 'T', 'S', 's', 'T', 't'];
        $this->string = str_replace($diac, $inloc, $text);
        
        return $this;
    }

    public function url() {
        $url = strtolower($this->string);
        $url = preg_replace('/([^a-z0-9\-])+/', "-", trim($url));
        $url = preg_replace('/^[\-]+/', "", $url);
        $url = preg_replace('/[\-]+$/', "", $url);

        $this->string = $url;
        return $this;
    }

    public function isMatchWith($text){
        $status = false;
        if(strcmp($this->string, $text) == 0)
        {
           $status = true;
        }

        return $status;
    }

    public function getText(){
        return $this->string;
    }

}