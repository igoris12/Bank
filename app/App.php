<?php
namespace Bank;

use  Bank\Controller\BankController;

class App {


    public static function start() {
        self::router();
    }

    public static function router(){
        $url = str_replace(INSTALL, '', $_SERVER['REQUEST_URI']);
        $url = explode('/', $url);
        
        if ('GET'== $_SERVER['REQUEST_METHOD'] && 1 == count($url) &&  $url[0] == '') {
           return (new BankController)->home();
        }

        if ('GET'== $_SERVER['REQUEST_METHOD'] && 1 == count($url) &&  $url[0] == 'creat') {
           return (new BankController)->creat();
        }

        if ('GET'== $_SERVER['REQUEST_METHOD'] && 1 == count($url) &&  $url[0] == 'list') {
           return (new BankController)->lsit();
        }

        if ('POST'== $_SERVER['REQUEST_METHOD'] && 1 == count($url) &&  $url[0] == 'creat') {
           return (new BankController)->newAccount();
        }

         if ('POST'== $_SERVER['REQUEST_METHOD'] && 2 == count($url) &&  $url[0] == 'delete') {
           return (new BankController)->delete($url[1]);
        }



 
    
    }

    public static function view($name, $data = []): void {
        extract($data);
        require DIR . "view/$name.php";
    }

     public static function redirect($url) 
    {
        header('Location: '.URL.$url);
        die;
    }


}