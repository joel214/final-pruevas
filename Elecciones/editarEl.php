<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear elecion</title>
    <link href="..\asses\css\bootstrap.min.css" rel="stylesheet" type = "text/css">
 <link href="..\asses\css\bootstrap.min.css" rel="stylesheet"  type = "text/css">
</head>

<body  class="p-3 mb-2 bg-dark text-dark">
<a href="../administrador/indexAdmin.php" class="btn btn-warning"> volver</a>
<form enctype="multipart/form-data" action="" method="post"> 
  <div class="row">
  <div class="col-md-3"></div>
    <div class="col-md-6">
    <div class="card-header bg-light mb-3 center-text"> <h2>Crear eleciones</h2>
    <div class="row">
    <div class="col-md-1"></div>
      <div class="col-md-5 mb-3">
      <input type="text" class="form-control" placeholder="nombre" name = "nombre"> 
   </div>
   </div>
   
   <div class="col-md-12 mb-3">
      <input type="date" class="form-control"  name = "fecha">
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