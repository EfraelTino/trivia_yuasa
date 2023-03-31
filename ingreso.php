<?php   
    require 'logica/conexion.php';
    $pass = $_POST['pass'];
    $usuario = $_POST['usuario'];
    $nombre="";
    $premios="";
    $id="";
    $dato="1120a";
    
    $query =mysqli_query($dblink, "SELECT * FROM clientes WHERE usuario = '$usuario' and pass ='$pass'  " ) or die(mysqli_error($dblink));
    // $query =mysqli_query($dblink, "SELECT * FROM clientestri WHERE usuario = '$usuario' and pass ='$pass'  " ) or die(mysqli_error($dblink));
    $row = mysqli_num_rows($query);
        if($row > 0)
        {
	     while ($row = mysqli_fetch_assoc($query)) {
		    $pack = array(
	    	'nombre' =>  $row["nombre"],
            'id' => $row["id"],
            'premios' => $row["premios"]
	        );
            $nombre= $pack['nombre'];
            $id=$pack['id'];
            $premios=$pack['premios'];
            
    	 }
         if($premio!=""){$dato="654822abac";}
         header ('Location: ./4.php?id='.$id."&dato=".$dato);
	   }else{
	       echo "Al PARECER HAY UN PROBLEMA CON EL TOKEN O EL USUARIO  ".$usuario." y la contraseña";
          // header ('Location: ./nofind.php');
    
	   }

?> 