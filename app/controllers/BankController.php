<?php
namespace Bank\Controller;

use Bank\App;
use App\DB\Controlls\Json;
use App\DB\Controlls\MariaDB;


class BankController {
    private $settings = 'Json';
    // private $settings = 'MariaDB';
    //

    private function get() {
        $db = 'App\\DB\\Controlls\\'.$this->settings;
        return  $db::get();

    }

     public function __construct() {
        if (!App::isLogged()) {
            App::redirect('login');
        }
    }

    public function home() {
        return App::view('home');
    }

    public function creat() {
        return App::view('creatNewAcount');
    }

    public function add($id) {
        $account = $data = $this->get()->show((int)$id);
        return App::view('add', ['account'=> $account]);
    }

    public function lsit() {
        $data = $this->get()->showAll();
        usort($data,  function ($a, $b) {
        return strtoupper($b['lastName']) < strtoupper($a['lastName']);
    });

        return App::view('list', ['accounts' => $data]);
    }

    public function newAccount() {
    
        if (App::creatControll()) {
            $array = [
            'id' => rand(1000000000, 9999999999),
            'name' => $_POST['firstName'],
            'lastName' =>$_POST['lastName'],
            'personCode' => $_POST['personCode'],
            'aNumber' => App::acountNumber(),
            'balance' => 0
            ];

            $this->get()->create($array); 
            App::addMessage('success', 'New account was successfully created.');
        }else {
            App::addMessage('danger', 'First name and last name must be longer then 3 symbols, first and last name must not have spaces and numbers, check personal code.');
        }
        
        App::redirect('creat');
    }

    public function delete($id) {
        $account = $this->get()->show((int)$id);

        if ($account['balance']== 0) {
           $this->get()->delete($id); 
            App::addMessage('success', 'Account was successfully deleted.');
        }else {
            App::addMessage('danger', 'You cannot delete this account.');
        }
    
        App::redirect('list');
    }

    public function update($id, $action) {
     
        $account = $this->get()->show((int)$id);
        if ($_POST['money'] != '' && is_numeric($_POST['money']) && $_POST['money'] > 0 ) {
            if ($action == 'add') {
                $account['balance'] += $_POST['money'];
                App::addMessage('success', 'Money was successfully added.');
            }
            elseif ($action == 'sub') {

                if ($_POST['money'] <= $account['balance']) {
                    $account['balance'] -= $_POST['money'];
                    App::addMessage('success', 'Money was successfully sended.');
                }else {
                    App::addMessage('danger', "Please use correct input form use number.");
                }
            }
            $this->get()->update($id, $account);
        }else {
            App::addMessage('danger', "Please use correct input form use number.");
        }

        App::redirect('list');
        // $this->add($id);

    }

}