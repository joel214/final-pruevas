
<?php

class Ncodes {

  public $carre = [1 => 'Redes', 2 => 'Software', 3 =>'Multimedia', 4 => 'Mecatronica', 5 =>'Seguridad_informática'];

  public $fav = [1 => 'programacion', 2 => 'base_de_datos', 3 =>'calculo', 4 => 'etica', 5 =>'ingles'];


public function sumas($list)
{
$contlist = count($list);
$ultielement = $list[$contlist - 1];
 return $ultielement;
}


public function buscar($list,$properti,$valu){

    $filtro = [];

foreach($list as $listm){
if($listm->$properti == $valu){

    array_push($filtro, $listm);
}

}
return $filtro;

}


function getCookiesTime(){
    return time() + 60*60*24*30;
    
    
    }
    


public function deletear($list,$properti,$valu){

    $index = 0;

foreach($list as $key => $listm){

if($listm->$properti == $valu){

    $index = $key;
  
}

}
return $index;

}

public function uploadImagen($directory,$name,$tmpFile,$type,$size){

    $isSucces = false;
    if(($type == "image/gif") 
    || ($type =="image/jpeg") 
    || ($type =="image/png") 
    || ($type =="image/jpg") 
    || ($type =="image/JPG") 
    || ($type =="image/pjpeg") && ($size < 1000000 )){

        if(!file_exists($directory)){

            mkdir($directory,0777,true);

            if(file_exists($directory)){

                $this->uploadFile($directory . $name,$tmpFile);

                $isSucces = true;

            }

        }else {

            $this->uploadFile($directory . $name,$tmpFile);

    
            $isSucces = true;

        }


    }else{
        $isSucces = false;

    }

    return $isSucces;


}

private function uploadFile($name,$tmpFile){

    if(file_exists($name)){
        unlink($name);
    }
    
    move_uploaded_file($tmpFile, $name);
    $isSucces = true;

}

}


?>