<?php
namespace MVCWeb\ModelosTest\Resumenes;
use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;
use MVCWeb\Modelos\Resumenes;
include_once "src/config.inc.php";

class BaseDeDatosTest extends TestCase
{
    use TestCaseTrait;
    public function getConnection()
    {
        $pdo = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE.';charset=utf8', DB_SERVER_USERNAME, DB_SERVER_PASSWORD);
        //$pdo = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE.';charset=utf8', "cualquiera", DB_SERVER_PASSWORD);
        return $this->createDefaultDBConnection($pdo);
    }
}
