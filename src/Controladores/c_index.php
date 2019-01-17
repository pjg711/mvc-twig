<?php
namespace MVCWeb\Controladores;

class CIndex extends Controladores
{
    /**
     * [inicio description]
     * @return [type] [description]
     */
    function inicio()
    {
        $this->plantilla = "index.html.twig";
        $this->render();
    }
}
?>
