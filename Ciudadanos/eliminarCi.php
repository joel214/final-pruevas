<?php

require_once 'ciudadanos.php';
require_once '../administrador/servirBase.php';
require_once 'CiudadanoServiceDatabase.php';
require_once '../database/estudianteContext.php';
require_once '../ayudas/FileHandler/IfileHandler.php';
require_once '../ayudas/FileHandler/JsonFileHandler.php';
require_once '../ayudas/FileHandler/SerializationFileHandler.php';

$servir = new CiudadanoServiceDatabase('../database');

$listID = $_GET['id'];

$servir->delete($listID);


header("location: indexCi.php");

exit();

?>