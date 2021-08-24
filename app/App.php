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

        if ('GET'== $_SERVER['REQUEST_METHOD'] && 2 == count($url) &&  $url[0] == 'add') {
           return (new BankController)->add($url[1]);
        }

        if ('GET'== $_SERVER['REQUEST_METHOD'] && 2 == count($url) &&  $url[0] == 'sub') {
           return (new BankController)->add($url[1]);
        }

        if ('POST'== $_SERVER['REQUEST_METHOD'] && 1 == count($url) &&  $url[0] == 'creat') {
           return (new BankController)->newAccount();
        }

         if ('POST'== $_SERVER['REQUEST_METHOD'] && 2 == count($url) &&  $url[0] == 'delete') {
           return (new BankController)->delete($url[1]);
        }

        if ('POST'== $_SERVER['REQUEST_METHOD'] && 2 == count($url) &&  $url[0] == 'add') {
           return (new BankController)->update($url[1], $url[0]);
        }

        if ('POST'== $_SERVER['REQUEST_METHOD'] && 2 == count($url) &&  $url[0] == 'sub') {
           return (new BankController)->update($url[1], $url[0]);
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


    //Messages 

    public static function addMassage(string $type, string $msg) : void {
        $_SESSION['msg'][]= ['type' => $type, 'msg' => $msg];
    }

    public static function clearMessage(): void {
        $_SESSION['msg'] = [];
    }

    public static function showMessage(): void {
        if (isset($_SESSION['msg'])) {
        $message = $_SESSION['msg'];
        self::clearMessage();
        self::view('msg', ['message' =>$message]);
        }
        
    }

    public static function creatControll(): bool {
        if (
        is_numeric($_POST['pesonCode']) && 
        strlen($_POST['pesonCode']) == 11 && 
        self::nameControl($_POST['lastName']) &&
        self::nameControl($_POST['firstName']) &&
        self::nameNumberControl($_POST['lastName']) &&
        self::nameNumberControl($_POST['firstName']) &&
        self::personCodeStartControl($_POST['pesonCode'])
        ) {
            return true;
        }else {
            return false;
        }
        
    }

    public static function acountNumber() {
        $acountNumber = 'LT1873000';
    
        for($i =0; $i<11; $i++) {
            $number=rand(0,9); 
            $acountNumber = $acountNumber.$number;
        }
    
        return $acountNumber;
    }

    // controlls
    private static function nameControl(string $name): bool{
        return strlen($name) >= 3 ? true : false; 
    }

    private static function nameNumberControl(string $name): bool{
        for ($i = 0; $i< strlen($name); $i++) {
            if (
                $name[$i] == "0" || $name[$i] == "1" ||
                $name[$i] == "2" || $name[$i] == "3" ||
                $name[$i] == "4" || $name[$i] == "5" ||
                $name[$i] == "6" || $name[$i] == "7" ||
                $name[$i] == "8" || $name[$i] == "9" ||
                $name[$i] == " " 
            ) {
                return false;
            }
        }
        return true; 
    }

    private static function personCodeStartControl($code): bool {
        return ($code[0] == 3 || $code[0] == 4 || $code[0] == 5 || $code[0] == 6 ) ? true : false;
    }

    // public function accountNumberControl() :void {
    //     if (!$this->showAll() == []) {
    //             $accounts = $this->showAll();
    //             foreach ($accounts as $key => $value) {
    //                 for ($i=0; $i<count($accounts); $i++) {
    //                 if ($accounts[$key]['aNumber'] == $_POST['acNumber']) {
    //                     $_POST['acNumber'] = acountNumber();
    //                     $i=0;
    //                 }
    //             }
    //         }    
    //     }
    // }

    


}