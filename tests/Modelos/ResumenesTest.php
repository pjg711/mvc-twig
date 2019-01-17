<?php
/**
 * [namespace description]
 * tomado de: https://medium.com/@emilianozublena/unit-testing-con-phpunit-parte-1-148c6d73e822
 * @var [type]
 */
namespace MVCWeb\ModelosTest\Resumenes;
use MVCWeb\Modelos\Resumenes;
include_once "src/config.inc.php";

class ResumenesTest extends \PHPUnit_Framework_TestCase
{
    public function test_Lectura_Resumenes_IdResumen()
    {
        $idioma = "es";
        $id_resumen = 1;
        if( $test_resumenes = new Resumenes( $idioma, $id_resumen ) )
        {
            if( $test_resumenes->get_Contiene() )
            {
                //echo "\ntest_resumenes-->{$test_resumenes->get_Query()}\n";
                $ntest_resumenes = $test_resumenes->get_Resumenes();
                $resumen = [];
                foreach( $ntest_resumenes as $ttest_resumen )
                {
                    $resumen[] = $ttest_resumen->get_Json();
                }
            }
        }
        /*
        echo "\n";
        var_dump( $resumen );
        echo "\n";
        */
        $this->assertTrue(isset($resumen) && count($resumen)==1);
    }
}
?>
