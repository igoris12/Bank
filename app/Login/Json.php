<?php
namespace Bank\App\Login;

class Json{
    private static $obj;
    private $data;

    public static function get()
    {
        return self::$obj ?? self::$obj = new self;
    }

    private function __construct()
    {
        if (!file_exists(DIR.'data/user.json')) {
            file_put_contents(DIR.'data/user.json', json_encode([]));
        }
        $this->data = json_decode(file_get_contents(DIR.'data/user.json'), 1);
    }

    public function __destruct()
    {
        file_put_contents(DIR.'data/user.json', json_encode($this->data));
    }

    function create(array $accountData) : void
    {
        $this->data[] = $accountData;
    }


    //
    public function show(string $userID): array {
        foreach($this->data as $user) {
            if ($user['email'] == $userID) {
                return $user;
            }
        }
        return [];
    }
}