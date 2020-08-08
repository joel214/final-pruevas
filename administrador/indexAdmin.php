<?php

require_once '../layout/layout.php';
$layout = new layout(true);

session_start();

$user = json_decode($_SESSION['user']);


?>


<?php 

$layout->printheader();


?>


<a href="../index.html" class="btn btn-warning"> volver al inicio</a>
<div class="row">
    <div class="col-md-5"></div>

<div>
<h1>administracion</h1>
</div>
</div>


<div class="row">
<div class="col-md-3"></div>


<div class =" card  col-md-6 border-primary mb-10">


<a href="../Candidatos/indexCa.php" class = " btn btn-outline-primary mb-3"> Candidatos</a>
<a href="../PuestoElectivo/indexPu.php" class = "btn btn-outline-success mb-3"> Puesto Electivo</a>
<a href="../Partidos/indexPa.php" class = "btn btn-outline-warning mb-3"> Partidos</a>
<a href="../Elecciones/indexEl.php" class = "btn btn-outline-danger mb-3"> Elecciones</a>
<a href="../Ciudadanos/indexCi.php" class = "btn btn-outline-secondary mb-3"> Ciudadanos</a>


</div>
</div>




<?php 

$layout->printfooder();
?>