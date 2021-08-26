<?php
namespace Bank\Controller;

use Bank\App;
use Bank\App\Login\Json;

class RegistrateController {
        private $settings = 'Json';
    // private $settings = '#';

    private function get() {
        $db = 'Bank\\App\\Login\\'.$this->settings;
        return $db::get();
    }

    public function showRegistrare() {
        return App::view('registrate');
    }

    public function create() {
        
        if (App::registrationControl()) {
            if ($_POST['pass'] != $_POST['confirmPass']) {
                App::addMessage('danger', 'Password need to match with Confirm password.');
                App::redirect('registrate');
            }

            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                App::addMessage('danger', 'Email is not right.');
                App::redirect('registrate');
            }
            $array = [
                'id' => rand(1000000000, 9999999999),
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'pass' => md5($_POST['pass'])
            ];

            $this->get()->create($array);
            App::addMessage('success', 'Registration was successfully done you can login now.');
        }else {
            App::addMessage('danger', 'Name and email must have 4 or more characters.');
            App::redirect('registrate');
        }
        App::redirect('login');

    }

    
}