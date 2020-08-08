<?php 

require_once 'userService.php';
require_once 'user.php';


$result = null;
$masege = "";

session_start();




$messageauth = isset($_SESSION['messageAutn']) ? $_SESSION['messageAutn'] : "";

$_SESSION['messageAutn'] = "";


if(isset($_SESSION['user']) && $_SESSION['user'] != null ){

  $_SESSION['messageAutn'] = "ya iniciaste tu buena sesion";

    
  header("location: ../administrador/indexAdmin.php");
  exit();
  
 }
 //location: ../servidor/index.php

$service = new userService("../database");

if(isset($_POST['userName']) && isset($_POST['password']) ){

  $result = $service->login($_POST['userName'], $_POST['password']);

  if($result != null){  
    $_SESSION['user'] = json_encode($result);
    header("location: ../administrador/indexAdmin.php");
    exit();


  } else{

    $masege = "usuarios o contraseña incorrecta";


  } 

 }

?>


<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    
    <!-- Bootstrap core CSS -->
<link href="../asses/css/bootstrap.min.css" rel="stylesheet" type = "text/css">
<link href="../asses/css/login.css" rel="stylesheet" type = "text/css">



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>


  <body class="text-center">
 
    <form action ="login.php" method="post" class="form-signin">

    <?php if($masege != "" ):?>

<div class ="alert alert-danger" role="alert"> 
<?=$masege ?>
</div>

<?php if($messageauth != ""):?>

<div class ="alert alert-danger" role="alert"> 
<?=$messageauth ?>
</div>

<?php endif;?>



<?php endif;?>


  <h1 class="h3 mb-3 font-weight-normal">iniciar sesion</h1>
  <label for="user" class="sr-only">usuario</label>
  <input type="text" id="user" class="form-control" placeholder="Usuario" required="" autofocus="" name="userName" >
  <label for="inputPassword" class="sr-only">contraseña</label>
  <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required="" name= "password" >

  <button class="btn btn-lg btn-primary btn-block" type="submit">iniciar</button>
  <a class="btn btn-lg btn-success btn-block" href="registro.php"> Registrate</a>
  <p class="mt-5 mb-3 text-muted">acceso de administrador</p>
</form>


</body></html>