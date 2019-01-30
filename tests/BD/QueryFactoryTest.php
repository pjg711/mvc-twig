<?php
// interesante
// https://stackoverflow.com/questions/46379109/testing-coverage-with-phpunit-and-pdo

namespace MVCWeb\Modelos\BD;
use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

include_once "src/config.inc.php";

class QueryFactoryTest extends TestCase
{
    public function test_mysql_conexion()
    {
        try
        {
            $pdo = new \PDO('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE, DB_SERVER_USERNAME, DB_SERVER_PASSWORD);
            //$pdo = new \PDO('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE, DB_SERVER_USERNAME, "cualquiera");
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->assertTrue(true);
        }catch( PDOException $e )
        {
            print_r( $e );
            $this->assertTrue(false);
        }
    }

    public function test_mysql()
    {
        $query_factory = new QueryFactory('Mysql');
        $select = $query_factory->newSelect();
        //$cadena_select[] = "JSON_EXTRACT(resumen_{$this->idioma}, '$.{$campo}') AS {$campo}";
        $select->distinct()
            ->cols(array('id_grupo', 'JSON_EXTRACT(resumen_es,\'$.id_persona\') AS id_persona'))
            ->from('cifasis_resumenes')
            ->where('JSON_EXTRACT(resumen_es,\'$.id_persona\') = 61');
        echo "\ngetStatement--->{$select->getStatement()}\n";
        $resultado = $select->getStatement();
        $this->assertTrue(true);
    }

}
?>
