<?php 

require_once '../database/estudianteContext.php';
require_once '../ayudas/Ncode.php';
class CiudadanoServiceDatabase implements servirBase{


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

        $stmt = $this->context->db->prepare(" select * from ciudadanos  ");
        $stmt->execute();
       
        $result = $stmt->get_result();

        if($result->num_rows == 0){

            return $listadoE;


        }else{

            while($row = $result->fetch_object()){
                
                $publica = new  ciudadanos();

                $publica->id = $row->id;
                $publica->cedula = $row->cedula;
                $publica->nombre = $row->nombre;
                $publica->apellido = $row->apellido;
                $publica->email = $row->email;
                $publica->estado = $row->estado;
            

                array_push($listadoE,$publica);

               


            }


        }
        $stmt->close();
        return $listadoE;

    }

    public function GetByid($id){

        $publica = new  Ciudadanos();

        $stmt = $this->context->db->prepare(" select * from ciudadanos where id = ?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
       

        $result = $stmt->get_result();

        if($result->num_rows == 0){

            return null;


        }else{

            while($row = $result->fetch_object()){
                
          
                $publica->id = $row->id;
                $publica->cedula = $row->cedula;
                $publica->nombre = $row->nombre;
                $publica->apellido = $row->apellido;
                $publica->email = $row->email;
                $publica->estado = $row->estado;
             



            }


        }
         $stmt->close();
        return $publica;


        
    }

    public function add($entity){
 
   
      
       
        $stmt = $this->context->db->prepare(" insert into ciudadanos (cedula,nombre,apellido,email,estado) values (?,?,?,?,?)");
        $stmt->bind_param("sssss",$entity->cedula,$entity->nombre,$entity->apellido,$entity->email,$entity->estado);

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
                    
        $stmt = $this->context->db->prepare("update publicar set photo = ? where id = ?");
        $stmt->bind_param("si",$name, $estudianteID);
        $stmt->execute();
        $stmt->close();

    
                }
    

            }


      
        }

        


    }

    public function update($id,$entity){

        $elemento = $this->GetByid($id);


        $stmt = $this->context->db->prepare("update ciudadanos set cedula = ?, nombre = ? ,apellido = ? ,email = ? ,estado = ? where id = ?");
        $stmt->bind_param("sssssi",$entity->cedula,$entity->nombre,$entity->apellido,$entity->email,$entity->estado,$id);
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
                    $stmt = $this->context->db->prepare("update publicar set photo = ? where id = ?");
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

        $stmt = $this->context->db->prepare("delete from ciudadanos where id = ?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->close();

      

    }

}

?>