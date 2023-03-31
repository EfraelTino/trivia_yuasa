<?php 
   
   $host = "localhost";
   $user = "root";
//    $pass = "divino.1";
   $pass = "";
   $database = "yuasabd";
   $dblink = mysqli_connect($host, $user, $pass, $database);
 
   
    if($dblink){
        echo "conectado";
    }else{
        echo "no esta cAnectadooooo";
    }
    /*
   $host = "localhost";
   $user = "u960900126_inti_munay";
   $pass = "Cocorilow.1";
   $database = "u960900126_celdv";
   */
?>
