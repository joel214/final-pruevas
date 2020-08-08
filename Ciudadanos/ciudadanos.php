<?php 
class ciudadanos{


    public $id;
    public $cedula;
    public $nombre;
    public $apellido;
    public $email;
    public $estado;


    private $Ncodes;
    public function __construct(){

        $this->Ncodes = new Ncodes();

    }

    public function inicializarData($id,$cedula,$nombre,$apellido,$email,$estado){


        $this->id = $id;
        $this->cedula = $cedula;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
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

