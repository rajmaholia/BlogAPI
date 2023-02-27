<?php



/*
$patterns = array("/[(].*?[)]/","/[(].*?[)]/");
$patterns = "/[(].*?[)]/";
//$patterns = "/edit/";
preg_match_all($patterns,$str,$m);
var_dump($m);
var_dump(array_replace($m,array(1,2)));

echo "\n";
//var_dump($patterns);
//var_dump($replacements);
//echo $pattern;


//echo preg_replace($patterns, array("1","4"), $str);

$urlpatterns = [
  
 array(
   'path'=>'/login/',
   'file'=>'mpm/auth/login.php',
   'name'=>'login'
   ),

  array(
   'path'=>'@/[a-zA-Z]*[.]php@',
   'file'=>'blog/blog_list.php',
   'name'=>'home'
  ),
  array(
   'path'=>'/logout/',
   'file'=>'mpm/auth/logout.php',
   'name'=>'logout'
   ),
  array(
    'path'=>"@^blog_detail/(?P<id>\d+)@",
    'file'=>'blog/blog_detail.php',
    'name'=>'blog_detail'
  ),
  array(
    'path'=>"@^/blog_create/@",
    'file'=>'blog/blog_create.php',
    'name'=>'blog_detail'
  ),
  array(
    'path'=>'//',
    'file'=>'blog/blog_list.php',
    'name'=>'home'
  ),
];
//var_dump($urlpatterns);*/