<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear partido</title>
    <link href="..\asses\css\bootstrap.min.css" rel="stylesheet" type = "text/css">
 <link href="..\asses\css\bootstrap.min.css" rel="stylesheet"  type = "text/css">
</head>
<?php 

require_once 'ciudadanos.php';
require_once '../administrador/servirBase.php';
require_once 'CiudadanoServiceDatabase.php';
require_once '../database/estudianteContext.php';
require_once '../ayudas/FileHandler/IfileHandler.php';
require_once '../ayudas/FileHandler/JsonFileHandler.php';
require_once '../ayudas/FileHandler/SerializationFileHandler.php';

$servrir = new CiudadanoServiceDatabase('../database');


session_start();

if(isset($_POST['cedula']) && isset($_POST['nombre'])){

  
  $user = json_decode($_SESSION['user']);

  $iduser = $user->id;


  $estado = 'activo';


 

 $newpublicacion = new ciudadanos();

 $newpublicacion->inicializarData(0, $_POST['cedula'], $_POST['nombre'],$_POST['apellido'],$_POST['email'], $estado);


 $servrir->add($newpublicacion);



header("location: indexCi.php");

exit();

}

?>

<body  class="p-3 mb-2 bg-dark text-dark">
<a href="indexCi.php" class="btn btn-warning"> volver</a>
<form enctype="multipart/form-data" action="" method="post"> 
  <div class="row">
  <div class="col-md-3"></div>
    <div class="col-md-6">
    <div class="card-header bg-light mb-3 center-text"> <h2>Crear ciudadano</h2>
    <div class="row">
    <div class="col-md-1"></div>
      <div class="col-md-5 mb-3">
      <input type="text" class="form-control" placeholder="cedula" name = "cedula"> 
   </div>
   </div>


   <div class="row">
          <div class="col-md-6 mb-3">
           
    <input type="text" class="form-control" placeholder="nombre" name = "nombre"> 
            <div class="invalid-feedback">
              
            </div>
          </div>
          <div class="col-md-6 mb-3">
            
            <input type="text" class="form-control" placeholder="apellido" name = "apellido"> 
            <div class="invalid-feedback">
             
            </div>
          </div>
        </div>
   
   
        <div class="col-md-12 mb-3">
      <input type="text" class="form-control"  placeholder="email" name = "email">
   </div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="true" id="defaultCheck1" name="chet" checked>
  <label class="form-check-label" for="defaultCheck1" >
    estado
  </label>
</div>

  
<div class="row">
<div class="col-md-5"></div>
    <div>
    <button type="sumit" class="btn btn-success">Crear</button>
    </div>
    </div>

    </div>
  </div>
  </div>
</form>
</body>
</html>