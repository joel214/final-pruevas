<?php 
class partidos{


    public $id;
    public $nombre;
    public $descripcion;
    public $Logo;
    public $Estado;


    private $Ncodes;
    public function __construct(){

        $this->Ncodes = new Ncodes();

    }

    public function inicializarData($id,$nombre,$descripcion,$Estado,$Logo){


        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->Logo = $Logo;
        $this->Estado = $Estado;
     
        
        
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

