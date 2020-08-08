<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar candidato</title>
    <link href="..\asses\css\bootstrap.min.css" rel="stylesheet" type = "text/css">
 <link href="..\asses\css\bootstrap.min.css" rel="stylesheet"  type = "text/css">
</head>

<?php
require_once 'Candidatos.php';
require_once '../administrador/servirBase.php';
require_once 'CandidatosServiceDatabase.php';
require_once '../database/estudianteContext.php';
require_once '../ayudas/FileHandler/IfileHandler.php';
require_once '../ayudas/FileHandler/JsonFileHandler.php';
require_once '../ayudas/FileHandler/SerializationFileHandler.php';
require_once '../PuestoElectivo/puestoEServiceDatabase.php';
require_once '../Partidos/partidosServiceDatabase.php';
require_once '../PuestoElectivo/puestoE.php';
require_once '../Partidos/partidos.php';

session_start();

$servrir = new CandidatosServiceDatabase('../database');
$puestos = new puestoEServiceDatabase('../database');
$partidos = new partidosServiceDatabase('../database');

$user = json_decode($_SESSION['user']);

$listR =$puestos->Getlist();
$listT =$partidos->Getlist();



if(isset($_GET['id'])){

    $regisID = $_GET['id'] ;
  
  
    $gelement = $servrir->GetByid($regisID);
  

if(isset($_POST['nombre']) && isset($_POST['apellido'])){

  
  $user = json_decode($_SESSION['user']);

  $iduser = $user->id;


  $estado = 'activo';


 $newpublicacion = new Candidatos();

 $newpublicacion->inicializarData(0, $_POST['nombre'],$_POST['apellido'], $_POST['partido'],$_POST['puesto'], $estado, $_FILES['photo'] );


 $servrir->update($regisID, $newpublicacion);



header("location: indexCa.php");

exit();

}

}else{

    header("location: indexCa.php");
        
    exit();
  }
  

?>

<body  class="p-3 mb-2 bg-dark text-dark">
<a href="indexCa.php" class="btn btn-warning"> volver</a>
<form enctype="multipart/form-data" action="" method="post"> 
  <div class="row">
  <div class="col-md-3"></div>
    <div class="col-md-6">
    <div class="card-header bg-light mb-3 center-text"> <h2>Editar Candidatos</h2>
    <div class="row">
    <div class="col-md-1"></div>
      <div class="col-md-5 mb-3">
      <input type="text" class="form-control"  value = "<?php echo $gelement->nombre; ?>" placeholder="nombre" name = "nombre"> 
   </div>
   </div>
   
   <div class="col-md-12 mb-3">
      <input type="text" class="form-control"  value = " <?php echo $gelement->apellido;?>"  placeholder="apellido" name = "apellido">
   </div>


   <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">partido</label>
            <select class="custom-select" id = "selecteU" name = "partido">
          <?php foreach($listT as $caren):?> 

          <option value= <?php echo $caren->nombre; ?> > <?php echo  $caren->nombre; ?> </option>
          
          <?php endforeach; ?> 
        </select>
           
            <div class="invalid-feedback">
              
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">puesto</label>
            <select class="custom-select" id = "selecteU" name = "puesto">
            
          <?php foreach($listR as $caren):?> 

          <option value= <?php echo $caren->nombre; ?> > <?php echo  $caren->nombre; ?> </option>
          
          <?php endforeach; ?> 
        </select>
            <div class="invalid-feedback">
             
            </div>
          </div>
        </div>

        <div class="card mb-4 shadow-sm">

<?php if(  $gelement->photo == "" ||  $gelement->photo == null): ?>

  <img class="bd-placeholder-img card-img-top" width="100%" height="225" src=" <?php echo "../asses/img/estudiantes/defecto.jpg" ?>" aria-label="Placeholder: Thumbnail">


<?php else: ?>

  <img class="bd-placeholder-img card-img-top" width="100%" height="225" src=" <?php echo "../asses/img/estudiantes/" .  $gelement->photo; ?>" aria-label="Placeholder: Thumbnail">

<?php endif; ?>
   
<div class="col-md-12">
 <Label>subir imagen</Label>
      <input type="file" class="form-control" placeholder="foto" name="photo">
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