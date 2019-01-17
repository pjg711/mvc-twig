<?php
require_once "./Controladores/controllers.php";
// cargo todas las rutas
// https://github.com/bramus/router
$router = @new \Bramus\Router\Router();
$router->setNamespace('Controladores');
$path_routes = "./Rutas";
if( $archivos = buscar_rutas($path_routes) )
{
    foreach( $archivos as $archivo )
    {
        include $path_routes."/".$archivo;
    }
}
$router->run();

function buscar_rutas(  $ruta, $excluir = "" )
{
  	if( $excluir == "" ) $excluir = unserialize(EXCLUIR);
  	$archivos = [];
  	if( $gestor = opendir($ruta) )
  	{
  	    while( false !== ($entrada = readdir($gestor)) )
  	    {
  	        if( !in_array($entrada,$excluir) )
  			{
		        if( $entrada != "." && $entrada != ".." )
		        {
		            $archivos[] = $entrada;
		        }
  			}
  	    }
  	    closedir( $gestor );
        return $archivos;
  	}
  	return false;
}
?>
