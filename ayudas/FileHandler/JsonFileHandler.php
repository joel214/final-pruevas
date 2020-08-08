<?php
class JsonFileHandler implements IfileHandler {

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
    
        $path =  $this->directory."/".$this->filename.".json";
    
        $serilaizeData = json_encode($value);


        $file = fopen($path,"w+");
        fwrite($file, $serilaizeData);
        fclose($file);
        
    
    }
    function ReadFile(){
    
    
       $this->CreateDirectory($this->directory);
        
        $path =  $this->directory."/".$this->filename.".json";
    
        if(file_exists($path)){
    
            $filer = fopen($path,"r");
            $contens = fread($filer,filesize($path));
            fclose($filer);

            return json_decode($contens);
            
    
        }else{
    
            return false;
        }
    }

    function ReadConfiguration(){
    
         
         $path =  $this->directory."/".$this->filename.".json";
     
         if(file_exists($path)){
     
             $filer = fopen($path,"r");
             $contens = fread($filer,filesize($path));
             fclose($filer);
 
             return json_decode($contens);
             
     
         }else{
     
             return false;
         }
     }
     
    
    


}



?>