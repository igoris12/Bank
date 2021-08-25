<?php
namespace Bank\Controller;

use Bank\App;
use Bank\App\Login\Json;

class LoginController {
        private $settings = 'Json';
    // private $settings = '#';

    private function get() {
        $db = 'Bank\\App\\Login\\'.$this->settings;
        return $db::get();
    }

    public function showLogin() {
        return App::view('login');
    }

     public function login()
    {
        $name = $_POST['name'] ?? ''; // ivestas el pastas
        $pass = md5($_POST['pass']) ?? '';
        $user = $this->get()->show($name);
        if (empty($user)) {
            App::addMassage('danger', 'Email or password is incorrect.');
            App::redirect('login');
        }
        if ($user['pass'] == $pass) {
            $_SESSION['login'] = 1;
            $_SESSION['name'] = $user['name'];
            App::addMassage('success', 'Login successfully.');
            App::redirect('list');
        }
        App::addMassage('danger', 'Email or password is incorrect.');
        App::redirect('login');
    }

     public function logout()
    {
        unset($_SESSION['login'], $_SESSION['name']);
        App::addMassage('success', 'Successfully logout good day.');
        App::redirect('login');
    }
}