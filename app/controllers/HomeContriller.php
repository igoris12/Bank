<?php
namespace Bank\Controller;

use Bank\App;

class HomeContriller {

    public function home() {
        App::view('home');
    }

}