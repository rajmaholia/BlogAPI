<?php
if(!defined('SECURE')) exit('<h1>Access Denied</h1>'); ?>
<?php
function render($filename, $vars = null) {
  if (is_array($vars) && !empty($vars)) {
    extract($vars);
  }
  ob_start();
  require($filename);
  return ob_get_clean();
}
function restrict(){
  if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
  header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
  die( header( '' ) );
  }
}
?>