<?php



namespace App\DB\Controlls;



use App\DB\DataBase;
use \PDO;

/* make protexted */

class MariaDB implements DataBase {
    private static $obj;

    public static function get() 
    {
        return self::$obj ?? self::$obj = new self;
    }

    private function __construct() {
        $host = '127.0.0.1';
        $db   = 'bank';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $pdo = new PDO($dsn, $user, $pass, $options);
    }

    //
    public function create(array $userData) : void
    {
        $host = '127.0.0.1';
        $db   = 'bank';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $pdo = new PDO($dsn, $user, $pass, $options);

        $name = $userData['name'];
        $lastName = $userData['lastName'];
        $personCode = $userData['personCode'];
        $aNumber = $userData['aNumber'];
        $balance = $userData['balance'];

         $sql = "INSERT INTO accounts
            (`name`, lastName, personCode, aNumber, balance)
            VALUES ('$name', '$lastName', $personCode, '$aNumber', $balance)
            ";

        $pdo->query($sql);

    }
 
    public function update(int $userId, array $userData) : void 
    {
        $balance = $userData['balance'];

        $host = '127.0.0.1';
        $db   = 'bank';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $pdo = new PDO($dsn, $user, $pass, $options);

        $sql = "UPDATE accounts
        SET `balance`= $balance
        WHERE `id`= $userId
        ";

        $pdo->query($sql);
    }
 
    public function delete(int $userId) : void 
    {
        $host = '127.0.0.1';
        $db   = 'bank';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $pdo = new PDO($dsn, $user, $pass, $options);

        $sql = "DELETE FROM accounts
        WHERE `id` = $userId
        ";

        $pdo->query($sql);
    }
 
    public function show(int $userId) : array 
    {
        $accounts = $this->showAll();

        foreach($accounts as $account) {
            if ($account['id'] == $userId) {
                return $account;
            }
        }
        return [];
    }
    
    public function showAll() : array 
    {
        $host = '127.0.0.1';
        $db   = 'bank';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $pdo = new PDO($dsn, $user, $pass, $options);

        $sql = "SELECT id, `name`, lastName, personCode, aNumber, balance
        FROM accounts
        ";

        $stmt = $pdo->query($sql);
        $accounts=[];
        while ($row = $stmt->fetch()) {
            $accounts[] = $row;
        }
        if ($accounts) {
            return $accounts;
        }else {
            return [];
        }
    }
}