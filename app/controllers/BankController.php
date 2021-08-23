<?php
namespace Bank\Controller;

use Bank\App;

class BankController {
    private $settings = 'Json';
    //

    private function get() {
        $db = 'Bank\\'. $this->settings;
        return  $db::get();

    }

    public function home() {
        return App::view('home');
    }

    public function creat() {
        return App::view('creatNewAcount');
    }

    public function lsit() {
        return App::view('list');
    }

    public function newAccount() {
    
        $array = [
        'id' => rand(1000000000, 9999999999),
        'name' => 0,
        'lastName' => 0,
        'personCode' => 0,
        'aNumber' => 0,
        'balance' => 0
        ];

        $this->get()->create($array);
        App::redirect('');
    }

}