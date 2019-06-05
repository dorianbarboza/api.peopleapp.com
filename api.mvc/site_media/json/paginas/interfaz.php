<!DOCTYPE html>
<html background="css/fondo.png" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tbody>
            <tr>
                <th>Name</th>
            </tr>
            <?php 
            session_start();  // Continuar la sesi�n
            
            echo  '<h3>'.$_SESSION['user'].'</h3>';
            echo '<h3>'.$_SESSION['pass'].'</h3>';

            $_SESSION['prueba']="hola";

$url = 'http://localhost/api.mvc/solicitud/all'; // path to your JSON file
$data = file_get_contents($url); // put the contents of the file into a variable
$characters = json_decode($data); // decode the JSON feed

//var_dump($characters->datos);
foreach ($characters->datos as $character) : ?>
            <tr>
                <td> <?php echo($character->id_solicitud);?> </td>
                
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

   <?php echo "<a href='cerrarSesion.php'>Cerrar sesi�n</a>";?>
</body>
</html>

