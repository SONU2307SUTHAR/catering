<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>catering</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
     crossorigin="anonymous">
     <link rel="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
      <link rel="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
      <link rel="stylesheet" href="<?=ROOT;?>public/css/custom.css">
      
     <style>
      html,body{
         height: 130%;
      }
      .main{
         height: 100%;
         display: grid;
         grid-template-rows: 50px 1fr 30px;
      }
      .navbar-brand>span{
        font-size: 20px;
        color:rgb(56, 72, 136);
        text-align: center;
        font-weight: bold;
        text-shadow: 2px 1px 3px #000;
      }
     </style>
</head>
<body>
<div class="container border main">
    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><span>Catering System</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?=ROOT;?>menu/display">Menu</a><!--user ko menu dikhane k liye login se phle -->
        </li>
        <?php if(session::get('logindtl')){ ?>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Menu
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?=ROOT;?>menu/form">Create</a></li>
            <li><a class="dropdown-item" href="<?=ROOT;?>menu/">List</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            User
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?=ROOT;?>users/form">Register</a></li>
            <li><a class="dropdown-item" href="<?=ROOT;?>users/changepwd">Change Password</a></li>
            <li><a class="dropdown-item" href="<?=ROOT;?>users/logout">Logout</a></li>
            
          </ul>
          <!--
          <li class="nav-item">
          <a class="nav-link" href="<?=ROOT;?>users/logout">Logout</a>
        </li>
        -->
        <?php }else{ ?>
        <li class="nav-item">
          <a class="nav-link" href="<?=ROOT;?>users/">Login</a>
        </li>
        <?php } ?>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    </header>
    <section>
</body>