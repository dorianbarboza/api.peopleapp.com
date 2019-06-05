<?php
	session_start();
	include 'Conexion.php';
	if(isset($_SESSION['nombre'])){
	echo '<script> window.location="panel.php"; </script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>login Admin</title>
	<meta charset="utf-8">
	
</head>
<body>
	<div class = "espacio">
		<div class = "centrado">
			<img src="login.png">
			<div class = "espacioText">
			<form method="post" action="validar.php">
				<input type="text" class="form-control" name="user" required><br><br>
				<input type="password" class="form-control" name="pw" autocomplete="off" required><br><br>
				<input type="submit" class="btn btn-success" name="login" value="Entrar">
			</form>
			</div>
		</div>
	</div>
</body>
</html>
