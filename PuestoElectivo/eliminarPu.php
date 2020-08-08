<?php
require_once 'puestoE.php';
require_once '../administrador/servirBase.php';
require_once 'puestoEServiceDatabase.php';
require_once '../database/estudianteContext.php';
require_once '../ayudas/FileHandler/IfileHandler.php';
require_once '../ayudas/FileHandler/JsonFileHandler.php';
require_once '../ayudas/FileHandler/SerializationFileHandler.php';
require_once '../layout/layout.php';


$servir = new puestoEServiceDatabase('../database');

  $listID = $_GET['id'];

  $servir->delete($listID);
  

  header("location: indexPu.php");

exit();

?>