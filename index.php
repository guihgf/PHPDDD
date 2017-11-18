<?php

include('vendor/autoload.php');
include('src/0-Presentation/Middleware/Middleware.php');
include('src/0-Presentation/Middleware/BaseMid.php');
include('src/0-Presentation/Rest/Routes.php');
include('src/0-Presentation/Rest/BaseUrl.php');

$base=base_url();

$GLOBALS['base_project']="src/0-Presentation/";
$GLOBALS['base_dir']=$base.$GLOBALS['base_project'];
$GLOBALS['base_site']=$base;
$GLOBALS['base_view']="Views/";

$nome_url=explode('/',$_SERVER['REQUEST_URI']);

$controller =$nome_url[count($nome_url)-2];

//error_reporting(E_ALL);
//ini_set('display_errors', 1);
date_default_timezone_set('America/Sao_Paulo');

session_start();

if(!isset($routes[$controller]))
	$controller =$nome_url[count($nome_url)-3];


if(!isset($routes[$controller])){
	header("Location: ".$GLOBALS['base_site'].$routes['default']."/");
}
else
{
	include($GLOBALS['base_project']."Controllers/".$routes[$controller]);

	$ioc =  (new \Infra\Ioc\LoadInjection())->start();
	$controller=$ioc->create('Presentation\\Controllers\\'.str_replace('.php','',$routes[$controller]));
	$controller->processApi();
}

?>
