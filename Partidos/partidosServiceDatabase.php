<?php 

require_once '../database/estudianteContext.php';
require_once '../ayudas/Ncode.php';
class partidosServiceDatabase implements servirBase{


    private $Ncodes;

    private $cookiename;

    private $context;
    

    public function __construct($directory){
        
    
        
        $this->Ncodes = new Ncodes(); 
        $this->context = new estudianteContext($directory);
     
    }
   
    public function Getlist(){

        $user = json_decode($_SESSION['user']);

$id = $user->id;


        $listadoE = array();

        $stmt = $this->context->db->prepare(" select * from partidos");
        
        $stmt->execute();
       
        $result = $stmt->get_result();

        if($result->num_rows == 0){

            return $listadoE;


        }else{

            while($row = $result->fetch_object()){
                
                $publica = new  partidos();

                $publica->id = $row->id;
                $publica->nombre = $row->nombre;
                $publica->descripcion = $row->descripcion;
                $publica->estado = $row->estado;
             $publica->Logo = $row->logo;

                array_push($listadoE,$publica);

               


            }


        }
        $stmt->close();
        return $listadoE;

    }

    public function GetByid($id){

        $publica = new  partidos();

        $stmt = $this->context->db->prepare(" select * from partidos where id = ?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
       

        $result = $stmt->get_result();

        if($result->num_rows == 0){

            return null;


        }else{

            while($row = $result->fetch_object()){
                
            

                $publica->id = $row->id;
                $publica->nombre = $row->nombre;
                $publica->descripcion = $row->descripcion;
                $publica->Logo = $row->logo;
                $publica->estado = $row->estado;
            


            }


        }
         $stmt->close();
        return $publica;


        
    }

    public function add($entity){
 
   
      var_dump($entity);
       
        $stmt = $this->context->db->prepare(" insert into partidos(nombre,descripcion,estado) values (?,?,?)");
        $stmt->bind_param("sss",$entity->nombre,$entity->descripcion,$entity->Estado);
        $stmt->execute();
        $stmt->close();


        $estudianteID = $this->context->db->insert_id;
 

        if( isset($_FILES['photo'])){


            $photoFile = $_FILES['photo'];


            if($photoFile['error'] == 4){

                $entity->photo = "";
            }else{

                $photoFile = $_FILES['photo'];

                $typeReplace = str_replace("image/","",$_FILES['photo']['type']);
                $type =  $photoFile['type'];
                $size =  $photoFile['size'];
                $name =  $estudianteID . '.' . $typeReplace;
                $tmpname =  $photoFile['tmp_name'];
    
                $succes = $this->Ncodes->uploadImagen('../asses/img/estudiantes/',$name, $tmpname, $type, $size);
    
                if($succes){
                    
        $stmt = $this->context->db->prepare("update partidos set logo = ? where id = ?");
        $stmt->bind_param("si",$name, $estudianteID);
        $stmt->execute();
        $stmt->close();

    
                }
    

            }


      
        }

        


    }

    public function update($id,$entity){

        $elemento = $this->GetByid($id);

        $stmt = $this->context->db->prepare("update partidos set nombre = ?, descripcion = ? ,estado = ? where id = ?");
        $stmt->bind_param("sssi",$entity->nombre,$entity->descripcion,$entity->Estado,$id);
        $stmt->execute();
        $stmt->close();

       
      
        if( isset($_FILES['photo'])){

            $photoFile = $_FILES['photo'];

            if($photoFile['error'] == 4){

                $entity->photo = $elemento->photo;
            }else{

                $typeReplace = str_replace("image/","",$_FILES['photo']['type']);
                $type = $photoFile['type'];
                $size = $photoFile['size'];
                $name =  $id . '.' . $typeReplace;
                $tmpname = $photoFile['tmp_name'];
    
                $succes = $this->Ncodes->uploadImagen('../asses/img/estudiantes/',$name, $tmpname, $type, $size);
    
                if($succes){
                    $stmt = $this->context->db->prepare("update partidos set logo = ? where id = ?");
                    $stmt->bind_param("si",$name, $id);
                    $stmt->execute();
                    $stmt->close();

    
                }
    
            }
            
    

        $listadoE[$id-1] = $entity;

        setcookie($this->cookiename,json_encode($listadoE),$this->Ncodes->getCookiesTime(),"/");

    }
}

    public function delete($id){

        $stmt = $this->context->db->prepare("delete from partidos where id = ?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->close();

      

    }

}

?>