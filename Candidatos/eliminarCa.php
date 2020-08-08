<?php


require_once 'Candidatos.php';
require_once '../administrador/servirBase.php';
require_once 'CandidatosServiceDatabase.php';
require_once '../database/estudianteContext.php';
require_once '../ayudas/FileHandler/IfileHandler.php';
require_once '../ayudas/FileHandler/JsonFileHandler.php';
require_once '../ayudas/FileHandler/SerializationFileHandler.php';

$servir = new CandidatosServiceDatabase('../database');

$listID = $_GET['id'];

$servir->delete($listID);


header("location: indexCa.php");

exit();

?>