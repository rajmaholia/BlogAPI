<?php
if(!defined('SECURE')) exit('<h1>Access Denied</h1>'); 
global $user;
$blog_list = db_read('Blog',order_array:array('published_on'=>'desc'));
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
<body class='bg-secondary'>
<?php require 'components/nav.php';?>

<!-- Add New Button-->
<a href="<?php echo reverse('blog_create');?>" class="btn btn-primary m-2" style="margin-left:auto">+Add</a>
<!-- Add New ButtonEnd-->
<!-- Container -->
<div class="container p-1">
  <?php foreach($blog_list as $blog){ ?>
<div class="card mt-2">
  <div class="card-header">
By <?php echo db_read('User',filter:array('id'=>$blog['author']))[0]['fullname'];?> | <?php echo date("Y/m/d",strtotime($blog['published_on'])); ?>
  </div>
  <div class="card-body">
    <h5 class="card-title fs-5">    
     <?php echo $blog['title']; ?></h5>
    <p class="card-text">
      <?php echo $blog['description']; ?>
    </p>
    <a href="/blog_detail/<?php echo $blog['id'];?>" class="btn btn-primary">Read More</a>
  </div>
  <div class="card-footer"></div>
</div>
  <?php } ?>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>