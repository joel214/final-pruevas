<?php 
class puestoE{


    public $id;
    public $nombre;
    public $descripcion;
    public $estado;
  

    private $Ncodes;
    public function __construct(){

        $this->Ncodes = new Ncodes();

    }

    public function inicializarData($id,$nombre,$descripcion,$estado){


        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
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

