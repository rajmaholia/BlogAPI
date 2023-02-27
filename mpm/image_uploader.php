<?php
if(!defined('SECURE')) exit('<h1>Access Denied</h1>'); ?>
<?php
define("UPLOAD_PATH",'../uploads/');
$adminkey = "admin".time();
define("SELLER_KEY",$adminkey);
function upload_image_handler($files){
   $imagesarray = array();
/* This function */
  $target_dir = UPLOAD_PATH;//Target Directory to store files 
  $done = false;
  for($i = 0; $i<count($files["name"]);$i++){
    $targetFile = $target_dir . SELLER_KEY . basename($files["name"][$i]);
    if(file_exists($targetFile)) {
      $targetFile = $target_dir .SELLER_KEY."".mt_rand(10000,99999).basename($files["name"][$i]);
    }
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo(
    $targetFile,PATHINFO_EXTENSION));
    $check = getimagesize($files["tmp_name"][$i]);
    if($check!==false) {
      $uploadOk = 1;
    } else {
      $uploadOk = 0;
    }
    
    if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png"){
      $uploadOk = 0;
    }
    if($uploadOk == 1){
     if(move_uploaded_file($files["tmp_name"][$i],$targetFile)){
       array_push($imagesarray,basename($targetFile,'.$imageFileType'));
       $done = json_encode($imagesarray);
     } else{
       $done=false;
     }
    }
  }
  return $done;
}