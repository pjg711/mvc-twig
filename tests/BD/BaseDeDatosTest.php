<?php
namespace MVCWeb\BDTest;
use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;
use MVCWeb\Modelos\Resumenes;

include_once "src/config.inc.php";

class BaseDeDatosTest extends TestCase
{
    use TestCaseTrait;
    static private $pdo;
    static private $conn;

    public function getConnection()
    {
        if( is_null(static::$conn) )
        {
            if( is_null(static::$pdo) )
            {
                static::$pdo = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE.';charset=utf8', DB_SERVER_USERNAME, DB_SERVER_PASSWORD);
                //static::$pdo = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE.';charset=utf8', "cualquiera", DB_SERVER_PASSWORD);
            }
            static::$conn = $this->createDefaultDBConnection(static::$pdo, DB_DATABASE);
            if( static::$conn )
            {
                $this->assertTrue(true);
                return true;
            }
        }
        $this->assertTrue(false);
    }
}
