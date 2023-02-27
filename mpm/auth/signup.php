<?php
if(!defined('SECURE')) exit('<h1>Access Denied</h1>'); ?>
<?php
require_once 'mpm/auth/forms.php';
require_once 'mpm/validators.php';

if(getUser()!=null){
  redirect(reverse('home'));
}
$form = new UserCreationForm();

if($_SERVER['REQUEST_METHOD'] == "POST") {
  $form->fill_form($_POST);
  if(count($form->get_errors())==0){
    $passwordEqual = checkequal(test_input($_POST['password']),test_input($_POST['confirm_password']));
    if($passwordEqual==false){
     $form->error_list['confirm_password']=array("Both passwords Must be same");
    } else {
      $data = cleaned_data($_POST);
      var_dump($data);
      $fields = UserCreationForm::$fields;
      $data_array = array();
      foreach($fields as $key=>$value) {
        $data_array[$value] = $data[$value];
      }
      $data_array['password'] = password_hash($data_array['password'], PASSWORD_DEFAULT);
     $res =  db_column_exists('User',data:array('username'=>$data_array['username']))?$form->error_list['username']=array("Username already exists"):db_insert('User',data:$data_array);
     if(is_int($res)){
       redirect(reverse('login'));
     }
    }
  }
} ?>
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
   <h1>Register</h1>
     <form action="" class="fk-form" method="post">
      <?php echo $form->render_form();?>
    <button type="submit" class="fk-btn fk-btn-theme">Register</button>
    
     </form>
     <p>Already have an account <a href="<?php echo reverse('login');?>">Login</a></p>
 </div>
  </div>
</body>
</html>