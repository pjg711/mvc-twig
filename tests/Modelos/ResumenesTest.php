<?php
/**
 * [namespace description]
 * tomado de: https://medium.com/@emilianozublena/unit-testing-con-phpunit-parte-1-148c6d73e822
 * gran ayuda: https://phpunit.readthedocs.io/es/latest/writing-tests-for-phpunit.html
 * @var [type]
 */
namespace MVCWeb\ModelosTest\Resumenes;
use PHPUnit\Framework\TestCase;
use MVCWeb\Modelos\Resumenes;
include_once "src/config.inc.php";

class ResumenesTest extends TestCase
{
    /**
     * [test_Lectura_Resumenes_IdResumen description]
     * @return [type] [description]
     */
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
        echo "\ntest_Lectura_Resumenes_IdResumen\n";
        var_dump( $resumen );
        echo "\n";
        */
        $this->assertTrue(isset($resumen) && count($resumen)==1);
    }
    /**
     * [test_Lectura_Resumenes_IdPersona description]
     * @return [type] [description]
     */
    public function test_Lectura_Resumenes_IdPersona()
    {
        $idioma = "es";
        $id_persona = 61;
        if( $test_resumenes = new Resumenes( $idioma, "", $id_persona ) )
        {
            if( $test_resumenes->get_Contiene() )
            {
                //echo "\ntest_resumenes persona-->{$test_resumenes->get_Query()}\n";
                $ntest_resumenes = $test_resumenes->get_Resumenes();
                $resumen = [];
                foreach( $ntest_resumenes as $ttest_resumen )
                {
                    $resumen[] = $ttest_resumen->get_Json();
                }
            }
        }
        /*
        echo "\ntest_Lectura_Resumenes_IdPersona\n";
        var_dump( $resumen_persona );
        echo "\n";
        */
        $this->assertTrue(isset($resumen) && count($resumen)>1);
    }
    /**
     * [test_Lectura_Resumenes_IdGrupo description]
     * @return [type] [description]
     */
    public function test_Lectura_Resumenes_IdGrupo()
    {
        $idioma = "es";
        $id_grupo = 1;
        if( $test_resumenes = new Resumenes( $idioma, "", "", $id_grupo ) )
        {
            if( $test_resumenes->get_Contiene() )
            {
                //echo "\ntest_resumenes persona-->{$test_resumenes->get_Query()}\n";
                $ntest_resumenes = $test_resumenes->get_Resumenes();
                $resumen = [];
                foreach( $ntest_resumenes as $ttest_resumen )
                {
                    $resumen[] = $ttest_resumen->get_Json();
                }
            }
        }
        /*
        echo "\ntest_Lectura_Resumenes_IdPersona\n";
        var_dump( $resumen_persona );
        echo "\n";
        */
        $this->assertTrue(isset($resumen) && count($resumen)>1);
    }

}
?>
