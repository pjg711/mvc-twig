<?php
namespace MVCWeb\Controladores;

class C_Index extends Controladores
{
    /**
     * [inicio description]
     * @return [type] [description]
     */
    function index()
    {
        //echo "pase por index<br>";
        $this->plantilla = "index.html.twig";
        $this->render();
    }
}
?>
