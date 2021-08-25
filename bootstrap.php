<?php
session_start();

define('INSTALL', '/Bank/public/');
define('DIR',  __DIR__.'/');
define('URL',  'http://localhost/Bank/public/');

require DIR.'vendor/autoload.php';

function showMessage() 
{
    return Bank\App::showMessage();
}

function isLogged() 
{
    return Bank\App::isLogged();
}

