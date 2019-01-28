<?php
namespace MVCWeb\Controladores;
//use MVCWeb\Modelos\BaseDeDatos;

class C_BaseDeDatos extends Controladores
{
    /**
     * [prueba description]
     * @return [type] [description]
     */
    function basededatos()
    {
        //$BD = new BaseDeDatos( MYSQLI );
        $this->plantilla = "basededatos.html.twig";
        $this->render();
    }
}

?>
