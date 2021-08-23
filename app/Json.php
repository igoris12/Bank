<?php

use App\DB\DataBase;

class Json implements DataBase {

    private static $obj;
    private $data;

    public static function get() 
    {
        return self::$obj ?? self::$obj = new self;
    }

    private function __construct() 
    {
        if (!file_exists(DIR . 'data/accounts.json')) {
            file_put_contents(DIR . 'data/accounts.json', json_encode([]));
        }
        $this->$data = json_decode(file_get_contents(DIR . 'data/accounts.json'),1);
    }

//
    function create(array $accountData) : void
    {
        $this->data[] = $accountData;
    }
 
    function update(int $accountId, array $accountData) : void
    {
        
    }
 
    function delete(int $accountId) : void
    {
        
    }
 
    function show(int $accountId) : array
    {
        
    }
    
    function showAll() : array
    {
        return $this->data;
    }
}