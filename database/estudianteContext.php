<?php

class estudianteContext{

    public $db;
    private $fileHandler;

    public function __construct($directory){

        $fileHandler = new JsonFileHandler($directory,"configuration2");
        $configuration =  $fileHandler->ReadConfiguration();

        $this->db = new mysqli($configuration->server,$configuration->user,$configuration->password,$configuration->database);

        if($this->db->connect_error){

            exit('error conneting to data base');

        }


    }


}



?>