<?php
namespace MVCWeb\Rutas;

$router->get('/','C_Index@index');
$router->get('/login','C_Index@login');
$router->get('/logout','C_Index@logout');
?>
