<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" type="text/css" href="diseñoInsertar.css">
    <title>Document</title>
</head>
<body>
   <h2 class = "centro">Registro de Usuarios</h2>
    
    <div class = "general">
    <form name="nombre_formulario" method="POST" action="http://localhost/api.peopleapp.com/v1/usuarios/insertar">
        
        <fieldset>
               
                <div>
                    <input type="text" name="nombre" placeholder="Nombre">
                </div>
                <div>
                    <input type="text" name="contrasena" placeholder="Contraseña"/>
                </div>
                <div>
                    <input type="password" name="correo" placeholder="Correo"/>
                </div>
                <div>
                    < input type="text" name="sexo" placeholder="Sexo"/>
                </div>
               
                <div>
                    <input type="text" name="fechaNacimiento" placeholder="Fecha de nacimiento"/>
                </div>
                <input type="submit" name="submit" value="Guardar"/>
            </fieldset>  
       
    </form>
    </div>
</body>
</html>








<!-- 
            <table>
            <tr>
                <td><h2>Nombre:</h2></td><td><input type='text' name='nombre'></td>
            </tr>
            <tr>
                <td><h2>Contraseña</h2></td><td><input type='text' name='contrasena'></td>
            </tr>
            <tr>
                <td><h2>Correo</h2></td><td><input type='text' name='correo'></td>
            </tr>
            <tr>
                <td><h2>Sexo</h2></td><td><input type='text' name='sexo'></td>
            </tr>
            <tr>
                <td><h2>Fecha de nacimiento</h2></td><td><input type='text' name='fechaNacimiento'></td>
            </tr>
        </table> -->