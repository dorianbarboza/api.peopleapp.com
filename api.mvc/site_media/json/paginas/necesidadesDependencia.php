<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
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
            <table style="background-color:white;"class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Tipo de queja </th>
                        <th>Área</th>
                        <th>Municipio</th>
                        <th>Descripción</th>
                        <th>Fecha de la solicitud</th>
                        <th>Fecha de registro</th>
                        <th>Propuesta</th>
                        <th>Hora</th>
                    </tr>
                    <?php 
                        session_start();  // Continuar la sesi�n
                        
                        echo  '<h3>'.$_SESSION['user'].'</h3>';
                        echo '<h3>'.$_SESSION['pass'].'</h3>';

                        $_SESSION['prueba']="hola";

                        $url = 'http://localhost/buzon/api.mvc/solicitud/allNecesidades'; // path to your JSON file
                        $data = file_get_contents($url); // put the contents of the file into a variable
                        $denuncias = json_decode($data); // decode the JSON feed

                    //var_dump($characters->datos);
                    foreach ($denuncias->datos as $denuncia) : ?>
                    <tr>
                        <td> <?php echo($denuncia->descripcion);?></td>
                        <td> <?php echo($denuncia->area_dependencia);?> </td>
                        <td> <?php echo($denuncia->municipio_dependencia);?> </td>
                        <td> <?php echo($denuncia->descripcion);?> </td>
                        <td> <?php echo($denuncia->fecha_solicitud);?> </td>
                        <td> <?php echo($denuncia->fecha_registro);?> </td>
                        <td> <?php echo($denuncia->propuesta);?> </td>
                        <td> <?php echo($denuncia->hora);?> </td>
                        
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

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
<style>
body {
background: url(../imagenes/fondo.jpg);

background-size: cover;
background-repeat: no-repeat;
    background-position: top center;
    background-attachment: fixed;
}
</style>