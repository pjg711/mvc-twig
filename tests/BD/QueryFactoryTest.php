<?php
use MVCWeb\Modelos\BD\QueryFactory;

class QueryFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $query_factory = new QueryFactory('Mysql');
        $select = $query_factory->newSelect();
        $select->cols(array('foo', 'bar AS barbar'))
            ->from('table1')
            ->from('table2')
            ->where('table2.zim = 99');
        echo "\ngetStatement--->{$select->getStatement()}\n";
    }
?>
