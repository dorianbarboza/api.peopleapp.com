<?php
	session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
<head>
	<title>Validando...</title>
	<meta charset="utf-8">
</head>
</head>
<body>
		<?php
		include 'Conexion.php';
			if(isset($_POST['login'])){
				$user = $_POST['user'];
				$pass = $_POST['pw'];
				$log = $conect ->query("SELECT * FROM usuario WHERE nombre='$user' AND contrasena='$pass'");
				 if (mysqli_num_rows($log)>0) {
				 	$row = mysqli_fetch_array($log);
					$_SESSION["nombre"] = $row['nombre']; 

					echo '<script> window.location="panel.php"; </script>';
					
				}
				else{
					echo '<script> alert("Usuario o contraseña incorrectos.");</script>';
					echo '<script> window.location="index.php"; </script>';
				}
			}
		?>	
</body>
</html>