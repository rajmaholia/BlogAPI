<?php
if(!defined('SECURE')) exit('<h1>Access Denied</h1>');
global $user;
if($user->id==null){
  redirect(reverse('login'));
}

if(isset($id)) {
  $result = db_read('Blog',filter:array('id'=>$id));
  if(count($result)>=0) {
   ( $user->id!=$result[0]['author'])?redirect(reverse('permission_denied')):(db_delete("Blog",filter:array('id'=>$id))?redirect(reverse('home')):false);
  } else {
    redirect(reverse('404'));
  }
}
