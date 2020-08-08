<?php
require_once 'Candidatos.php';
require_once '../administrador/servirBase.php';
require_once 'CandidatosServiceDatabase.php';
require_once '../database/estudianteContext.php';
require_once '../ayudas/FileHandler/IfileHandler.php';
require_once '../ayudas/FileHandler/JsonFileHandler.php';
require_once '../ayudas/FileHandler/SerializationFileHandler.php';

require_once '../layout/layout.php';
$layout = new layout(true);

session_start();

$user = json_decode($_SESSION['user']);




require_once '../layout/layout.php';
$layout = new layout(true);

$user = json_decode($_SESSION['user']);

$servir = new CandidatosServiceDatabase('../database');


$listR = $servir->Getlist();





?>


<?php 

$layout->printheader();


?>


<a href="../administrador/indexAdmin.php" class="btn btn-warning"> volver al menu</a>
<div class="row">
  <div class="col-md-3 "></div>
  <div class="col-md-6 card  mb-3 ">

  <button type=button class="btn btn-primary" onclick="window.location.href='crearCa.php';"> <h4>crear </h4></button>
        
    
    </div>


</div>

<div class="row">
  <div class="col-md-3 "></div>
  <div class="col-md-6 card border-primary mb-3 text-blue  ">
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">nombre</th>
      <th scope="col">apellido</th>
      <th scope="col">partido</th>
      <th scope="col">puesto</th>
      <th scope="col">estado</th>
      <th scope="col">foto</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  


  <?php if(empty($listR)):?>

  <h3> no hay registros </h3> 

  <?php else:?>

    <?php foreach($listR as $registros): ?>

    <tr>
   
      <th scope="row"> <?php echo $registros->id;?></th>
      <td><?php echo $registros->nombre;?></td>
      <td><?php echo $registros->apellido;?></td>
      <td><?php echo $registros->partido;?></td>
      <td><?php echo $registros->puesto;?></td>
      <td><?php echo $registros->estado;?></td>
      
      <?php if(  $registros->photo == "" ||  $registros->photo == null): ?>

<td> <img class="bd-placeholder-img card-img-top" width="100" height="100"  src=" <?php echo "../asses/img/estudiantes/defecto.jpg" ?>" aria-label="Placeholder: Thumbnail"></td>
<?php else: ?>

  <td> <img class="bd-placeholder-img card-img-top" width="100" height="100"  src=" <?php echo"../asses/img/estudiantes/" .  $registros->photo;?>" aria-label="Placeholder: Thumbnail"></td>


  <?php endif; ?>
   
      <td><a href="editarCa.php?id=<?php echo $registros->id;?>" class = "btn btn-outline-primary"> editar</a></td>
      <td><a href="eliminarCa.php?id=<?php echo $registros->id;?>"  class = "btn btn-outline-danger delete-estudiante"> eliminar</a></td>
    </tr>
  <?php endforeach;?>

  <?php endif;?>

  
    </tbody>
    </table>
    
  </div>
  </div>


<?php 

$layout->printfooder();
?>