<?php
if(!defined('SECURE')) exit('<h1>Access Denied</h1>'); ?>
<?php
function truncate($string, $limit, $pad = "...")
{
  if(strlen($string) <= $limit){
    return $string;
  } else {
      $string = substr($string,0 ,$limit) . $pad;
    return $string;
  }
}