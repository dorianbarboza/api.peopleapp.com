<?php
session_start();
include 'Conexion.php';

if(isset($_SESSION['nombre'])) {?>


<!DOCTYPE html>
<html>
  <head>
      <title>Dashboard</title>
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="diseñoMenu.css">
  </head>
  <body>


        <ul id="button">
            <li><a href="">Inicio</a></li>
            <li><a href="insertar.php">Nuevo usuario</a></li>
            <li><a href="#">Servicios</a></li>
            <li><a href="#">Productos</a></li>
            <li><a href="#">Contacto</a></li>
        </ul>
        <br>
        <br>
        <br>
       <div class = "admin">
        <?php
            echo "Administrador: " .$_SESSION['nombre'] . "<p/>";
            ?>
            <a href="logout.php"><button>Salir</button></a> 
       </div>
          
          
          <h1 class = "centrado">Servicio Express</h1>
          <hr width=900>

          <h3 class = "centrado">Usuarios Registrados</h3>
     

      <div class = "tabla">
          
        <table>
            <tr>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Correo electronico</th>
                <th>Sexo</th>
                <th>Fecha de nacimiento</th>
            </tr>
            <?php 
            $url='http://localhost/api.peopleapp.com/v1/usuarios/buscartodos';
            $data=file_get_contents($url);
            $prueba = json_decode($data);

            foreach($prueba->datos as $dato) : ?>
            <tr>
                <td><?php echo ($dato->idUsuario);?></td> 
                <td><?php echo ($dato->nombre);?></td>
                <td><?php echo ($dato->correo);?></td>  
                <td><?php echo ($dato->sexo);?></td>   
                <td><?php echo ($dato->fechaNacimiento);?></td>   
                  
            </tr>
          <?php endforeach;?>
        </table>
      </div>
    
    
  </body>
</html>
<?php
}else{
	echo '<script> window.location="index.php"; </script>';
}
?>