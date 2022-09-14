<?php require_once('list.php');?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" src="sidebars.css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" src="style.css">
 
  </head>
  <body>

  <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><h1>LOGO</h1></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <form class="d-flex" role="Create">
      <input class="form-control me-2" type="create" placeholder="Create" aria-label="Create">
      <button class="btn btn-outline-success" type="submit">Create</button>
    </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Delete</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Menu
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Guest</a>
        </li>
      </ul>
      <form class="d-flex" role="search" method="get" action="search.php">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search"> 
        <input class="btn btn-outline-success" type="submit" name="submit" value="search">
      </form>
    </div>
  </div>
  <div class="d-flex">
<ul class="nav flex-column">
  <li class="nav-item">
  </li>
</ul>
</nav>



    <container class="container-xl d-flex justify-content-between">
        

        <div class="col-3"><?php printFolders('./roots');?></div>
        <div class="col-9">
          <?php if(isset($_GET["name"])){actionList();}?>
        </div>
        

    </container>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>