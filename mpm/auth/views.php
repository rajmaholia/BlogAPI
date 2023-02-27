<?php
if(!defined('SECURE')) exit('<h1>Access Denied</h1>'); ?>
<?php
function signup(request,){
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
  }
}
?>