<?php
//include "Controladores/c_index.php"; // controlador
use MVCWeb\Controladores\CIndex;
$router->get('/','CIndex@inicio');
$router->get('/login','CIndex@login');
$router->get('/logout','CIndex@logout');
?>
