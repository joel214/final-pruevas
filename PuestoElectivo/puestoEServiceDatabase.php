<?php 

require_once '../database/estudianteContext.php';
require_once '../ayudas/Ncode.php';
class puestoEServiceDatabase implements servirBase{


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

        $stmt = $this->context->db->prepare(" select * from puestoelectivo ");
       
        $stmt->execute();
       
        $result = $stmt->get_result();

        if($result->num_rows == 0){

            return $listadoE;


        }else{

            while($row = $result->fetch_object()){
                
                $puestoE = new  puestoE();

                $puestoE->id = $row->id;
                $puestoE->nombre = $row->nombre;
                $puestoE->descripcion = $row->descripcion;
                $puestoE->estado = $row->estado;
             
            

                array_push($listadoE,$puestoE);

               


            }


        }
        $stmt->close();
        return $listadoE;

    }

    public function GetByid($id){

        $puestoE = new  puestoE();

        $stmt = $this->context->db->prepare(" select * from puestoelectivo where id = ?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
       

        $result = $stmt->get_result();

        if($result->num_rows == 0){

            return null;


        }else{

            while($row = $result->fetch_object()){
                
            

                $puestoE->id = $row->id;
                $puestoE->nombre = $row->nombre;
                $puestoE->descripcion = $row->descripcion;
                $puestoE->estado = $row->estado;
             
            


            }


        }
         $stmt->close();
        return $puestoE;

        
    }

    public function add($entity){
 
   
      var_dump($entity);
       
        $stmt = $this->context->db->prepare("insert into puestoelectivo(nombre,descripcion,estado)values(?,?,?)");
        $stmt->bind_param("sss", $entity->nombre, $entity->descripcion, $entity->estado);
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

        $stmt = $this->context->db->prepare("update puestoelectivo set nombre = ?, descripcion = ? ,estado = ? where id = ?");
        $stmt->bind_param("sssi",$entity->nombre,$entity->descripcion,$entity->estado,$id);
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

        $stmt = $this->context->db->prepare("delete from puestoelectivo where id = ?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->close();

      

    }

}

?>