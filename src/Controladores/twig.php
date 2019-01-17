<?php
require_once 'config.inc.php';
//
// Version de Twig usada: 2.6
// {{ constant('Twig_Environment::VERSION') }}
require_once '../vendor/autoload.php';
$templates = PATH_ROOT."/".FOLDER_VIEW."/".FOLDER_STYLE."/".FOLDER_TEMPLATE;
$cache = PATH_ROOT.'/temp/twig';
$loader = new Twig_Loader_Filesystem( $templates );
$twig = new Twig_Environment( $loader, array(
    'cache' => $cache,
    'debug' => false,
    'autoescape' => false)
);
//$twig->clearCacheFiles();
//$twig->addExtension(new Twig_Extension_Debug());
?>
