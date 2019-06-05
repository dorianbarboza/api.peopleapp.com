
<?php

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    require 'Conexion.php';
    insertar(); 
}


function insertar(){

    global $connection;

    $nombre1 = $_POST['nombre1'];
    $nombre2 = $_POST['nombre2'];

    $sql = "INSERT INTO `prueba` (`nombre1`, `nombre2`) VALUES ('$nombre1', '$nombre1');";
    
    if ($connection->query($sql)) {
    $msg = array("status" =>1 , "msg" => "Registro insertado con exito");
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
 
}
 
?>
