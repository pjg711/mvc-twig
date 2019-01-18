<?php
namespace MVCWeb\Controladores;

class C_Prueba extends Controladores
{
    /**
     * [prueba description]
     * @return [type] [description]
     */
    function prueba()
    {
        //echo "pase por index<br>";
        $this->plantilla = "prueba.html.twig";
        $this->render();
    }
}
?>
