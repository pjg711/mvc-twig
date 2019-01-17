<?php
namespace MVCWeb\Modelos;

spl_autoload_register( function ($pClassName) {
    include_once PATH_ROOT . "/Modelos/" . $pClassName . ".php";
});
use MVCWeb\Modelos\Pagina;
// ***************************************************************************
// atributos de la pagina web definidos en config.php de la plantilla
if( $pagina = @new Pagina( $_SERVER['PHP_SELF'], $idioma ) )
{
    $params['pagina']['logo_principal'] = $pagina->get_LogoPrincipal();
    $params['pagina']['imagen_header'] = $pagina->get_ImagenHeader();
    $params['pagina']['preloader'] = $pagina->get_Preloader();
    $params['pagina']['nro_novedades_mostrar'] = $pagina->get_NroNovedadesMostrar();
    $params['pagina']['folder_css'] = $pagina->get_FolderCSS();
    $params['pagina']['folder_js'] = $pagina->get_FolderJS();
    $params['pagina']['folder_img'] = $pagina->get_FolderIMG();
    $params['pagina']['folder_template'] = $pagina->get_FolderTemplate();
}
$params['config'] = [
  	'PROTOCOLO' => PROTOCOLO,
  	'WWW_ROOT' => WWW_ROOT,
  	'PATH_ROOT' => PATH_ROOT,
    'BASENAME' => $_SERVER['REQUEST_URI'],
    'FOLDER_VIEW' => FOLDER_VIEW,
  	'FOLDER_STYLE' => FOLDER_STYLE ];
?>
