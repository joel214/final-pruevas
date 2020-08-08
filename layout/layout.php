<?php 

class Layout{
    private $ispage;
    private $directory;

   public function __construct($page){

        $this->ispage = $page;

        $this->directory = ($this->ispage) ? "../":"";


    }

    
public function printheader(){

 $login =  '<li>  <a href="'. $this->directory .'user/login.php" class="text-white"> iniciar session</a></li>' ; 


  if(isset($_SESSION['user']) && $_SESSION['user'] != null ){

    $user = json_decode($_SESSION['user']);




   $login =  '<li> <spam class = "text-white">'.  $user->userName . ' </spam> <a href="'. $this->directory .'user/logout.php" class="text-white">(cerrar sesion) </a></li>'; 


  }



    $header = <<< EOF
    <html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title> Administracion </title>


    <!-- Bootstrap core CSS -->
<link href="{$this->directory}asses\css\bootstrap.min.css" rel="stylesheet" type = "text/css">
 <link href="{$this->directory}asses\css\bootstrap.min.css" rel="stylesheet"  type = "text/css">

 
    <!-- Custom styles for this template -->
   
  </head>
  <body class="bg-light ">
    <header>
  <div class="bg-dark collapse" id="navbarHeader" style="">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4"> 
          <h4 class="text-white">Acceso de administrador</h4>
          <p class="text-muted">Buenos dias {$user->userName } </p>
        </div>

        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Enlaces</h4>
          <ul class="list-unstyled">
           {$login}
     
          </ul>
        </div>
       
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container d-flex justify-content-between">
      <a href="{$this->directory}servidor/index.php" class="navbar-brand d-flex align-items-center">
       
        <strong>Administracion</strong>
      </a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>
EOF;

ECHO $header;

}



public function printfooder(){

    $header = <<< EOF

    <footer class="text-muted">
  <div class="container">
    <p class="float-right">
     
    </p>
    <p>administracion de la JCE/faik </p>
   
  </div>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="{$this->directory}asses\js\bootstrap.min.js"></script>

</body></html>


EOF;

ECHO $header;

}



}

?>