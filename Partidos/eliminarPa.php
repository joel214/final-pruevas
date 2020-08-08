<?php

require_once '../layout/layout.php';
require_once 'partidos.php';
require_once '../administrador/servirBase.php';
require_once 'partidosServiceDatabase.php';
require_once '../database/estudianteContext.php';
require_once '../ayudas/FileHandler/IfileHandler.php';
require_once '../ayudas/FileHandler/JsonFileHandler.php';
require_once '../ayudas/FileHandler/SerializationFileHandler.php';

$servir = new partidosServiceDatabase('../database');

$listID = $_GET['id'];

$servir->delete($listID);


header("location: indexPa.php");

exit();

?>