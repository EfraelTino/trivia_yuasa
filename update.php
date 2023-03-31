<?php   
    require 'logica/conexion.php';

    $nombre = $_POST['nombre'];
    $cedula = $_POST['cedula'];
    $pais = $_POST['pais'];
    $telefono = $_POST['movil'];
    $ciudad = $_POST['ciudad'];
    $correo = $_POST['correo'];
    $localidad = $_POST['localidad'];
    $barrio = $_POST['barrio'];   
    $id= $_POST['id'];
    $puntos= $_POST['puntos'];
    $premio= $_POST['premio'];  

    $query = "select * from clientestri where id = ' $id '";
    $consulta = mysqli_query($dblink, $query);
    $array = mysqli_fetch_array($consulta); 
 
   
    if($array['id'] === $id){
        $stmt = $dblink->prepare("UPDATE `clientestri` SET 
        `nombre` = ?,
        `cedula` = ?,
        `telefono` = ?,
        `ciudad` = ?,
        `pais` = ?,
        `correo` = ?,
        `localidad` = ?,
        `puntos` = ?,
        `premios` = ?
        WHERE id = ?  ");
        if(!$stmt) {
         echo "error";
        }
        $stmt->bind_param('ssssssssss', 
        $nombre, 
        $cedula,
        $telefono,
        $ciudad,
        $pais,
        $correo,
        $localidad,
        $puntos,
        $premio,
        $id
        );
        $stmt->execute();
        $stmt->close();
        
    }else{
       echo "NO eSTA EL ";
    }
?>