<?php
if(!defined('SECURE')) exit('<h1>Access Denied</h1>');
global $user;
require_once 'mpm/sessions.php';
require_once 'mpm/auth/forms.php';
require_once "mpm/validators.php";

if($user->id!=null) {
  redirect(reverse('home'));
}
$form = new UserLoginForm();

if($_SERVER["REQUEST_METHOD"]=="POST") {
  $form->fill_form($_POST);
  $username = test_input($_POST['username']);
  $password = test_input($_POST['password']);
  $result = db_read('User',filter:array('username'=>$username));
  if(count($result)>0) {
    $row = $result[0];
    if(password_verify($password,$row['password'])){
      
      $_SESSION['user'] = array();
      foreach($row as $key=>$value) {
       $_SESSION['user'][$key] = $value;
      }
      redirect(reverse(LOGIN_REDIRECT_URL));
    } else {
      $form->error_list['password'] = array("Password is not correct");
    }
  } else {
    $form->error_list['username'] = array("Username doesn't exist");
  }//count(row)
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Flashkart</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Expires" content="0" />
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <meta http-equiv="Pragma" content="no-cache" />
</head>
<body>
<div class="container">
<div class="form-container ">
  <h1>Login Here</h1>
  <form action="" class="fk-form" method="post">
    <?php echo $form->render_form(); ?>
    <button type="submit" class="fk-btn fk-btn-theme">Login</button>
  </form>
  <p style="text-align:center">Doesn't Have An Account <a href="<?php echo reverse('signup');?>">Sign Up</a></p>
</div>
</div>

</body>
</html>