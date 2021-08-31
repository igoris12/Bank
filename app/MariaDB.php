<?php



namespace App\DB\Controlls;



use App\DB\DataBase;
use \PDO;

/* make protexted */

class MariaDB implements DataBase {
    private static $obj;
    private $pdo;

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

         $this->pdo = new PDO($dsn, $user, $pass, $options);
    }

    //
    public function create(array $userData) : void
    {
        $name = $userData['name'];
        $lastName = $userData['lastName'];
        $personCode = $userData['personCode'];
        $aNumber = $userData['aNumber'];
        $balance = $userData['balance'];

         $sql = "INSERT INTO accounts
            (`name`, lastName, personCode, aNumber, balance)
            VALUES (?, ?, ?, ?, ?)
            ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([ $name,  $lastName, $personCode, $aNumber, $balance]);

    }
 
    public function update(int $userId, array $userData) : void 
    {
        $balance = $userData['balance'];

        $sql = "UPDATE accounts
        SET `balance`= ?
        WHERE `id`= ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([ $balance,  $userId]);
    
    }
 
    public function delete(int $userId) : void 
    {
        $sql = "DELETE FROM accounts
        WHERE `id` = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([ $userId ]);
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
        $sql = "SELECT id, `name`, lastName, personCode, aNumber, balance
        FROM accounts
        ";

        $stmt = $this->pdo->query($sql);
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