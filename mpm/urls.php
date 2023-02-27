<?php
if(!defined('SECURE')) exit('<h1>Access Denied</h1>'); ?>
<?php
require_once 'config/urls.php';

function redirect($path) {
  if(substr($path,0,1)=="/") {
    $path = substr($path,1);
  }
  header("Location:".BASE_URL.$path);
}

function http_redirect($url) {
  header("Location:".$url);
}

function reverse($name,$arguments=array()){
  //return absolute url of url_name;
  global $urlpatterns;
  $path = array_column($urlpatterns,'path','name')[$name];
  $arra = preg_split("@/@",$path,-1,PREG_SPLIT_NO_EMPTY);
  $pattern = "/[(].*?[)]/";
  $count=0;
  foreach($arra as $key=>&$value) {
    if(preg_match($pattern,$value)){
      $value = $arguments[$count];
      $count++;
    }
  }
  $url = implode('/',$arra);
  $url = substr(trim($path),0,1)=="/"?"/".$url:$url;
  $url = substr(trim($path),-1,1)=="/"?$url."/":$url;
  return $url;
}
?>