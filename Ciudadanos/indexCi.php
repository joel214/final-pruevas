<?php
require_once 'ciudadanos.php';
require_once '../administrador/servirBase.php';
require_once 'CiudadanoServiceDatabase.php';
require_once '../database/estudianteContext.php';
require_once '../ayudas/FileHandler/IfileHandler.php';
require_once '../ayudas/FileHandler/JsonFileHandler.php';
require_once '../ayudas/FileHandler/SerializationFileHandler.php';

require_once '../layout/layout.php';
$layout = new layout(true);

session_start();

$user = json_decode($_SESSION['user']);

$servir = new CiudadanoServiceDatabase('../database');


$listR = $servir->Getlist();

?>


<?php 

$layout->printheader();


?>


<a href="../administrador/indexAdmin.php" class="btn btn-warning"> volver al menu</a>
<div class="row">
  <div class="col-md-3 "></div>
  <div class="col-md-6 card  mb-3 ">

  <button type=button class="btn btn-secondary" onclick="window.location.href='crearCi.php';"> <h4>crear </h4></button>
        
    
    </div>


</div>

<div class="row">
  <div class="col-md-3 "></div>
  <div class="col-md-6 card border-secondary mb-3 text-blue  ">
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">nombre</th>
      <th scope="col">apellido</th>
      <th scope="col">email</th>
      <th scope="col">estado</th>
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
      <td><?php echo $registros->email;?></td>
      <td><?php echo $registros->estado;?></td>
     
   
      <td><a href="editarCi.php?id=<?php echo $registros->id;?>" class = "btn btn-outline-primary"> editar</a></td>
      <td><a href="eliminarCi.php?id=<?php echo $registros->id;?>"  class = "btn btn-outline-danger delete-estudiante"> eliminar</a></td>
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