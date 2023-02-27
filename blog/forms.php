<?php
require_once 'mpm/forms.php';

class BlogForm extends forms\Form {
  public $title,$description;
  public function __construct(){
    $this->title =  new forms\InputField("Title");
    $this->description = new forms\TextField("Description");
  }
}

?>