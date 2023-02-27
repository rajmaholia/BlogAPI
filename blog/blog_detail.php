<?php
global $user;
if($user->id==null){
 redirect(reverse('login'));
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
<body>
<?php require 'components/nav.php';?>
<!-- Container -->
<div class="container">
  <div class="row">
    <div class="col-sm-8">
  <?php 
  $blog = db_read('Blog',filter:array('id'=>$id));  
  if(count($blog)>0) {
    $blog = $blog[0];
  ?>
    <div class="pt-2">
      <h2><?php echo $blog['title']?></h2>
      <p>By <?php echo db_read('User',filter:array('id'=>$blog['author']))[0]['fullname'];?> | <?php echo date("Y/m/d",strtotime($blog['published_on'])); ?></p>

        <p><a href="<?php echo reverse('blog_edit', arguments:array($blog['id']));?>"  class="text-decoration-none">Edit</a> | <a href="<?php echo reverse('blog_delete', arguments:array($blog['id']));?>" class="text-decoration-none">Delete</a> </p>
      <p>
        <?php  echo $blog['description'];?>
      </p>
    </div>
  <?php   } ?>
    </div>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>