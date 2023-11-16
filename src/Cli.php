<?php
namespace Talex\Helpers;

class Cli{
    /**
     * check if file is executed from terminal
     */
    public static function isCommandLineInterface(){
        return (php_sapi_name() === 'cli');
    }
    /**
     * add color for text from terminal
     */
    public static function colorLog($str, $type = 'i'){
        switch ($type) {
            case 'e': //error
                echo "\033[31m$str \033[0m\n";
            break;
            case 's': //success
                echo "\033[32m$str \033[0m\n";
            break;
            case 'w': //warning
                echo "\033[33m$str \033[0m\n";
            break;  
            case 'i': //info
                echo "\033[36m$str \033[0m\n";
            break;
            default:
            # code...
            break;
        }
    }
}
