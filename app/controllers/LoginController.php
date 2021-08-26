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
        $email = $_POST['email'] ?? '';
        $pass = md5($_POST['pass']) ?? '';
        $user = $this->get()->show($email);
        if (empty($user)) {
            App::addMessage('danger', 'Email or password is incorrect.');
            App::redirect('login');
        }
        if ($user['pass'] == $pass) {
            $_SESSION['login'] = 1;
            $_SESSION['email'] = $user['email'];
            App::addMessage('success', 'Login successfully.');
            App::redirect('list');
        }
        App::addMessage('danger', 'Email or password is incorrect.');
        App::redirect('login');
    }

     public function logout()
    {
        unset($_SESSION['login'], $_SESSION['email']);
        App::addMessage('success', 'Successfully logout good day.');
        App::redirect('login');
    }
}