<?php
namespace Bank\Controller;

use Bank\App;
use App\DB\Controlls\Json;


class BankController {
    private $settings = 'Json';
    //

    private function get() {
        $db = 'App\\DB\\Controlls\\'.$this->settings;
        return  $db::get();

    }

    public function home() {
        return App::view('home');
    }

    public function creat() {
        return App::view('creatNewAcount');
    }

    public function lsit() {
     
        $data = $this->get()->showAll();
        
        return App::view('list', ['accounts' => $data]);
    }

    public function newAccount() {
    
        $array = [
        'id' => rand(1000000000, 9999999999),
        'name' => $_POST['firstName'],
        'lastName' =>$_POST['lastName'],
        'personCode' => $_POST['pesonCode'],
        'aNumber' => 0,
        'balance' => 0
        ];

        $this->get()->create($array);
        App::redirect('creat');
    }

    public function delete($id) {
        $this->get()->delete($id);
        App::redirect('list');
    }

}