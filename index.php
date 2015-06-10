<?php

define('ROOT_DIR', realpath(dirname(__FILE__)) .'/');
define('CONTENT_DIR', ROOT_DIR .'content-sample/');
define('CONTENT_EXT', '.md');
define('LIB_DIR', ROOT_DIR .'lib/');
define('PLUGINS_DIR', ROOT_DIR .'plugins/');
define('THEMES_DIR', ROOT_DIR .'themes/');
define('CACHE_DIR', LIB_DIR .'cache/');

register_shutdown_function('errorHandler');
register_shutdown_function( "fatal_handler" );

function fatal_handler() {
  $errfile = "unknown file";
  $errstr  = "shutdown";
  $errno   = E_CORE_ERROR;
  $errline = 0;

  $error = error_get_last();

  if( $error !== NULL) {
    print_r($error);
  }
}
function errorHandler() { 
    $error = error_get_last();
    $type = $error['type'];
    $message = $error['message'];
    if ($type = 64 && !empty($message)) {
        echo "
            <strong>
              <font color=\"red\">
              Fatal error captured:
              </font>
            </strong>
        ";
        echo "<pre>";
        print_r($error);
        echo "</pre>";
    }
}
require_once(LIB_DIR ."parsedown/Parsedown.php");
#echo "1".LIB_DIR ."parsedown/Parsedown.php success\n<br />";
require_once(LIB_DIR ."parsedown-extra/ParsedownExtra.php");
require_once(LIB_DIR ."twig/lib/Twig/Autoloader.php");
require_once(LIB_DIR ."pico.php");
#echo "2".LIB_DIR ."pico.php success\n<br />";


$pico = new Pico();
?>
