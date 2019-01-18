<?php
require_once "./Controladores/controllers.php";
// cargo todas las rutas
// https://github.com/bramus/router
$router = @new \Bramus\Router\Router();
$router->setNamespace('MVCWeb\Controladores');
$path_routes = "./Rutas";
if( $archivos = buscar_rutas($path_routes) )
{
    foreach( $archivos as $archivo )
    {
        if( file_exists( $path_routes."/".$archivo ) )
        {
            //echo $path_routes."/".$archivo."<br>";
            include_once $path_routes."/".$archivo;
        }
    }
}
$router->set404(function ()
{
    header('HTTP/1.1 404 Not Found');
    // ... do something special here
    //echo file_get_contents("404.html");
});
//print_r($router);
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
