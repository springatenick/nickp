<?php

// Defining
define('LIB_PATH', str_replace("\\", "/", getcwd()));

// Defining smatry dir as required here
// http://www.smarty.net/docs/en/installing.smarty.basic.tpl
define('SMARTY_DIR', LIB_PATH . '/lib/libs/');

// Require smarty class
require_once(SMARTY_DIR . 'Smarty.class.php');

// Initialize smarty class
$smarty = new Smarty();

// Change templates dir
$smarty->setTemplateDir(LIB_PATH . '/../templates/');
// Change cache dir
$smarty->setCompileDir(LIB_PATH . '/../templates_c/');
// Change configs dir
$smarty->setConfigDir(LIB_PATH . '/../configs/');
// Change cache path
$smarty->setCacheDir(LIB_PATH . '/../cache/');

?>
