<?php
// desarrollado por Pablo Garcia para el CIFASIS
// emails: garcia@cifasis-conicet.gov.ar o pablo.ju.garcia@gmail.com
// ultima actualizacion:
//
ini_set('error_reporting', E_ALL);
ini_set('display_errors',1);
//
if(!file_exists('config.inc.php'))
{
	header('Location: install.php');
	die;
}
//session_cache_limiter('nocache');
require_once 'config.inc.php';
session_start();
require_once '../vendor/autoload.php';
include 'Rutas/main.php';
