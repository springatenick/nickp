<?php

// Defining
define('LIB_PATH', dirname(__FILE__));
// Defining system path
define('PATH', realpath(LIB_PATH . '/../'));

// Defining smatry dir as required here
// http://www.smarty.net/docs/en/installing.smarty.basic.tpl
define('SMARTY_DIR', LIB_PATH . '/libs/');

// Require smarty class
require_once(SMARTY_DIR . 'Smarty.class.php');

// Initialize smarty class
$smarty = new Smarty();

// Change templates dir
$smarty->setTemplateDir(PATH . '/templates/');

// Change cache dir
$smarty->setCompileDir(PATH . '/templates_c/');
// Change configs dir
$smarty->setConfigDir(PATH . '/configs/');
// Change cache path
$smarty->setCacheDir(PATH . '/cache/');

?>
