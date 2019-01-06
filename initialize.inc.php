<?php
session_start();

/* Check if requirements set */
if(file_exists(__DIR__ . '/vendor/autoload.php')){
	require_once(__DIR__ . '/vendor/autoload.php');
}else{
	exit('Composer not initialized!' . PHP_EOL);
}

/* Check if configuration exsists */
if(file_exists(__DIR__ . '/config.inc.php')){
	require_once(__DIR__ . '/config.inc.php');
}else{
	exit('Configuration does not exsist.' . PHP_EOL);
}

/* Check if connection to db works */
$sqli = new mysqli($cfg['DB']['SERVER'], $cfg['DB']['USER'], $cfg['DB']['PASSWORD'], $cfg['DB']['DB']);
if($sqli->connect_errno){
	exit('Connection to DB not working.' . PHP_EOL);
}

/* Initialize Smarty Template Engine */
$smarty = new Smarty();
$smarty->setTemplateDir(__DIR__ . '/assets/templates');
$smarty->setCompileDir(__DIR__ . '/assets/templates_c');
$smarty->setCacheDir(__DIR__ . '/assets/cache');
$smarty->setConfigDir(__DIR__ . '/assets/config');
