<?php
namespace MVCWeb\Rutas;

$router->mount('/basededatos', function() use ($router)
{
    $router->get('/', 'C_BaseDeDatos@basededatos');
});
?>
