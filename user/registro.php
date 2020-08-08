
<?php 

require_once '../ayudas/Ncode.php';
require_once '../layout/layout.php';
require_once 'userService.php';
require_once 'user.php';

$layout = new layout(true);
$service = new userService("../database");
$util = new Ncodes();
$favorito = [];


$exist = $service->seguri($_POST['name']);

if($exist){

if(isset($_POST['name']) && isset($_POST['last']) && isset($_POST['nameUser']) && isset($_POST['password']) 
 && isset($_POST['correo']) && isset($_FILES['photo'])){

   $newuser = new user();
  
   $newuser->inicializarData(0, $_POST['nameUser'], $_POST['password'], $_POST['name'],$_POST['last'], $_POST['correo'] ,$_FILES['photo']);


  
 $service->add($newuser);
  
 
  
  header("location: login.php");
  
  exit();
 }
  
  }else{

    $masege = "el nombre de usuario ya existe";

  }


$layout->printheader();



?>


<body  class="p-3 mb-2 bg-dark text-dark">

<a href="login.php" class="btn btn-warning"> volver</a>
<form enctype="multipart/form-data" action="" method="post">

<?php  if($exist):?>

<?php else:?>
<div class ="alert alert-danger" role="alert"> 
<?=$masege ?>
</div>


<?php endif;?>

  <div class="row">
  <div class="col-md-3"></div>
    <div class="col-md-6">
    <div class="card-header bg-light mb-3 center-text"> <H2> Registrar </H2>
   
    <div class="row">
          <div class="col-md-6 mb-3">
           
          
            <input type="text" class="form-control" placeholder="Nombre" name = "name"  autofocus="">
            <div class="invalid-feedback">
              
            </div>
          </div>
          <div class="col-md-6 mb-3">
            
            <input type="text" class="form-control" placeholder="Apellido" name = "last">
            <div class="invalid-feedback">
             
            </div>
          </div>
        </div>

        <div class="col-md-12 mb-3">
      <input type="text" class="form-control" placeholder="Nombre de usuario"  name = "nameUser">
   </div>
    <div class="col-md-12 mb-3">
      <input type="text" class="form-control" placeholder="Contraseña"  name ="password">
    </div>

   <div class="row">
        
        <div class="col-md-12">
        <input type="email" id="inputEmail" class="form-control" placeholder="Correo" required=""  name ="correo">

</div>


<div class="col-md-12">
 <Label>foto de perfil</Label>
      <input type="file" class="form-control" placeholder="foto" name="photo">
    </div>
</div>



<div class="row">
<div class="col-md-5"></div>
    <div>
    <button type="sumit" class="btn btn-success">Registrar</button>
    </div>
    </div>

    </div>
  </div>
  </div>
</form>

<?php 

$layout->printfooder();
?>