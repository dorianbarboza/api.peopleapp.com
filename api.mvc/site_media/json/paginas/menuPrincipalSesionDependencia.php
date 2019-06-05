
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Men&uacute;</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
       <style>  html, body{height:100%;}

body {
background: url(../imagenes/fondo.jpg);

background-size: cover;
background-repeat: no-repeat;
    background-position: top center;
    background-attachment: fixed;
}
 

</style>
</head>
<body style=" font-size: 18px;">
  <header>
    <div class="container" align="center">
      <div class="thumbnail">
        <img src="../imagenes/Banner buzon pqci-01.png" alt="Lights" style="width:100%" align="center" >
      </div>
    </div>
        <header>
        </br>
<body>
<div class="container">
<nav style="border:2px solid lightgrey" class="navbar navbar-expand-lg navbar-light bg-light">
          <?php session_start();
          echo '<strong>Bienvenido(a): &nbsp</strong>'.$_SESSION['user']."&nbsp"."|"."&nbsp".'';
          echo "&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp".'';
          ?>
          <ul class="navbar-nav mr-auto">


          </ul>
         
              &nbsp  &nbsp


              <button type="submit" class="btn btn-outline-dark" onclick="location='cerrarSesion.php'"><img src="../iconos/cerrarSesion.png" width="30" height="30"> Cerrar sesión</button>

            </nav>
            <br>
  <div align="center">
    <div class="list-group" style="width:55%;" align="left">
      <a class="list-group-item list-group-item-action active">
      Men&uacute;
      </a>

      <a href="denunciasDependencia.php" class="list-group-item list-group-item-action">
        <div class="form-row">
          <div style="width: 390px;">
            <img src="../imagenes/icon-nueva-denuncia.png" width="45" height="45"> Ver Denuncias <br>
          </div>
        </div>           
      </a>

  <a href="sugerenciasDependencia.php" class="list-group-item list-group-item-action">
    <div class="form-row">
      <div style="width: 390px;">
        <img src="../iconos/icon-sugerencias.png" width="45" height="45"> Ver Sugerencias <br>
      </div>
      
    </div>           
  </a>

  <a href="necesidadesDependencia.php" class="list-group-item list-group-item-action">
    <div class="form-row">
      <div style="width: 390px;">
        <img src="../iconos/icon-necesidad.png" width="45" height="45"> Ver Necesidades <br>
      </div>
      <div class="form-row" style="padding: 8px;">
        
      </div> 
    </div>           
  </a>
  
  <a href="formulario.php" class="list-group-item list-group-item-action">
    <img src="../iconos/formulario.png" width="45" height="45"> Formulario</a>
</div>
</div>
</div>
<!-- Scripts para ejecutar Javascript en la página -->
    	<script type = "text/javascript" src="../js/comandos.js"></script>
    	<script src="../js/jquery-3.3.1.js" ></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    	<script src="../js/bootstrap.min.js"></script>
</body>
<footer class="container | p-3 mb-2 bg-light text-dark " style="margin-top: 40px; ">

        <div class="container">
          <div class="thumbnail">
            <img src="../imagenes/Banner-buzon-pqci-02.png" alt="Lights" style="width:100%" align="center" >
          </div>
        </div>

        <div class="" style="text-align: center;">      
          <p>&copy; 2018 <a href="">IQM</a></p>
        </div>
      </footer>
</html>
<?php
session_start();  // Continuar la sesi�n


?>