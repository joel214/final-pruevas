<?php 
class eleciones{


    public $id;
    public $nombre;
    public $fecha;
    public $estado;


    private $Ncodes;
    public function __construct(){

        $this->Ncodes = new Ncodes();

    }

    public function inicializarData($id,$nombre,$fecha,$estado){


        $this->id = $id;
        $this->nombre = $nombre;
        $this->fecha = $fecha;
        $this->estado = $estado;
     
        
        
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

