<?php
namespace MVCWeb\Rutas;

$router->mount('/prueba', function() use ($router)
{
    $router->get('/', 'C_Prueba@prueba');
});

?>
