<?php 
class Candidatos{


    public $id;
    public $nombre;
    public $apellido;
    public $partido;
    public $puesto;
    public $estado;
    public $photo;


    private $Ncodes;
    public function __construct(){

        $this->Ncodes = new Ncodes();

    }

    public function inicializarData($id,$nombre,$apellido,$partido,$puesto,$estado,$photo){


        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->partido = $partido;
        $this->puesto = $puesto;
        $this->estado = $estado;
        $this->photo = $photo;
     
        
        
    }

    public function set($data){

        foreach($data as $key=>$value) $this->{$key} = $value;

    }
    function caarreraname(){

        if($this->carreras != 0 && $this->carreras != null){
            return $this->Ncodes->carre[$this->carreras];
        }

        
    
    
    
    }
    

   
}

