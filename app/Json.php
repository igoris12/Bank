<?php

namespace App\DB\Controlls;

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
        $this->data = json_decode(file_get_contents(DIR . 'data/accounts.json'),1);
    }

     public function __destruct()
    {
        file_put_contents(DIR.'data/accounts.json', json_encode($this->data));
    }


    function create(array $accountData) : void
    {
        $this->data[] = $accountData;
    }
 
    function update(int $accountId, array $accountData) : void
    {
        foreach ($this->data as  $key => $account) {
            if ($account['id'] == $accountId) {
                $this->data[$key] = $accountData;
            }
        }
    }
 
    function delete(int $accountId) : void
    {
        foreach ($this->data as  $key => $account) {
            if ($account['id'] == $accountId) {
                unset($this->data[$key]);

            }
        }
    }
 
    function show(int $accountId) : array
    {
        foreach ($this->data as $account) {
            if ($account['id'] == $accountId) {
                return $account;
            }
        }
        return [];
    }
    
    function showAll() : array
    {
        if (isset($this->data)) {
          return $this->data;
        }else {
            return [];
        }
       
    }
}