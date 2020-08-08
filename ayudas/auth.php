
<?php 

session_start();

if(isset($_SESSION['user'])) {

    if($_SESSION['user'] != null){


        $_SESSION['messageAutn'] = "no has iniciado tu buena sesion";

 } 
   } else{


        $_SESSION['messageAutn'] = "no has iniciado tu buena sesion";

     
header("location: ../user/login.php");
exit();


    }


?>
