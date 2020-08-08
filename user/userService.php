<?php 
require_once '../ayudas/Ncode.php';
require_once '../ayudas/FileHandler/IfileHandler.php';
require_once '../ayudas/FileHandler/JsonFileHandler.php';
require_once '../database/estudianteContext.php';

class userService{


    private $context;
    private $Ncodes;
    

    public function __construct($directory){
        

        $this->Ncodes = new Ncodes(); 
        $this->context = new estudianteContext($directory);
     
    

    }
    public function login($user, $password){

        $stmt = $this->context->db->prepare(" select * from user where userName = ? and password = ?");
        $stmt->bind_param("ss",$user , $password);
         $stmt->execute();
         $result = $stmt->get_result();

         if( $result->num_rows === 0){
             return null;

         }else{


          $entity = $result->fetch_object();
          $user = new user();

         

          $user->id = $entity->id;
          $user->userName = $entity->userName;
          $user->password = $entity->password;
          $user->firstName = $entity->firstName;
          $user->lastName = $entity->lastName;
          $user->email = $entity->email;
          $user->photo = $entity->photo;

       

         return $user;

         }



    }

    public function add($entity){
 
    

        $stmt = $this->context->db->prepare("insert into user(userName,password,firstName,lastName,email) values (?,?,?,?,?)");
        $stmt->bind_param("sssss",$entity->userName,$entity->password,$entity->firstName,$entity->lastName,$entity->email);
        $stmt->execute();
        $stmt->close();


        $userID = $this->context->db->insert_id;
 

        if( isset($_FILES['photo'])){


            $photoFile = $_FILES['photo'];


            if($photoFile['error'] == 4){

                $entity->photo = "";
            }else{

                $photoFile = $_FILES['photo'];

                $typeReplace = str_replace("image/","",$_FILES['photo']['type']);
                $type =  $photoFile['type'];
                $size =  $photoFile['size'];
                $name =  $userID . '.' . $typeReplace;
                $tmpname =  $photoFile['tmp_name'];
    
                $succes = $this->Ncodes->uploadImagen('../asses/img/estudiantes/',$name, $tmpname, $type, $size);
    
                if($succes){
                    
        $stmt = $this->context->db->prepare("update user set photo = ? where id = ?");
        $stmt->bind_param("si",$name, $userID);
        $stmt->execute();
        $stmt->close();

    
                }
    

            }


      
        }

        


    }
    public function Getlist(){

        $listadoE = array();

        $stmt = $this->context->db->prepare("select * from user");
        $stmt->execute();
       
        $result = $stmt->get_result();

        if($result->num_rows == 0){

            return $listadoE;


        }else{

            while($row = $result->fetch_object()){
                
                $user = new user();

            
          $user->id = $entity->id;
          $user->userName = $entity->userName;
          $user->password = $entity->password;
          $user->firstName = $entity->firstName;
          $user->lastName = $entity->lastName;
          $user->email = $entity->email;
          $user->photo = $entity->photo;
            

                array_push($listadoE,$user);

               


            }


        }
        $stmt->close();
        return $listadoE;

    }

   public function seguri($user){

    $stmt = $this->context->db->prepare("select * from user where userName = ?");
    $stmt->bind_param("s",$user);
    $stmt->execute();

    $result = $stmt->get_result();

    


    if($result->num_rows == 0){

        $truename = true;



    }else{

        $truename = false;
    
        }

        return $truename;
    }




   








}

?>