<?php
class SerializationFileHandler implements IfileHandler {

    public $directory;
    public $filename;

    public function __construct($directory,$filename){

        $this->directory = $directory;
        $this->filename = $filename;

    }

    function CreateDirectory(){

        if(!file_exists($this->directory)){
    
            mkdir($this->directory,0777,true);
        }
    
    }
    function saveFile($value){
    
        $this->CreateDirectory($this->directory);
    
        $path =  $this->directory."/".$this->filename.".txt";
    
        $serilaizeData = serialize($value);


        $file = fopen($path,"w+");
        fwrite($file, $serilaizeData);
        fclose($file);
    
    
     
    
    }
    function ReadFile(){
    
    
       $this->CreateDirectory($this->directory);
        
        $path =  $this->directory."/".$this->filename.".txt";
    
        if(file_exists($path)){
    
            $filer = fopen($path,"r");
            $contens = fread($filer,filesize($path));
            fclose($filer);

            return unserialize($contens);
            
    
        }else{
    
            return false;
        }
    }
    
    


}



?>