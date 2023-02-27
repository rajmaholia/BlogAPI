<?php
/** This is Index file
*  DON'T EDIT THIS 
**/

define("SECURE",true);
require_once 'config/settings.php';
require_once 'mpm/sessions.php';
require_once 'mpm/database_handler.php';
require_once 'config/urls.php';
require_once 'mpm/urls.php';
require_once 'mpm/views.php';
require_once 'mpm/utils.php';
require_once 'mpm/validators.php';

$url = $_SERVER['REQUEST_URI'];

if(substr(trim($url),-1)!='/') $url.='/';
$paths = array_column($urlpatterns,'path');
for($i = 0;$i<count($urlpatterns);$i++) {
 // echo $url. '   :   '.$urlpatterns[$i]['path']."<br>";
  $pattern = "@^".$urlpatterns[$i]['path']."@";
  if(preg_match($pattern, $url,$matches)){
     $file = $urlpatterns[$i]['file'];
     break;
  }
}
if(isset($file)){
  if(isset($matches["id"])){
    $id = $matches["id"];
    echo(render($file,array('id'=>$id)));
  } else{
    echo(render($file));
  }
} else {
  redirect(reverse('404'));
}