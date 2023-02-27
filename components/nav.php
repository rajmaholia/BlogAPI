 <nav class="navbar navbar-expand-lg  bg-primary navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="font-family:serif">BlogAPI</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo reverse('login');?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/">Blogs</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <?php if(getUser()!=null):?>
          <a href='<?php echo reverse('logout')?>' class="nav-link">logout</a>
          <?php else: ?>
          <a href='<?php echo reverse('login')?>' class="nav-link">login</a>
           <?php endif;?>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn bg- btn-outline-light" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>