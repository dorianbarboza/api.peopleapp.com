<?php

	session_start();  // Continuar la sesi�n

	
		session_unset();													// Borrar las variables de sesi�n
		setcookie(session_name(), 0, 1 , ini_get("session.cookie_path"));	// Eliminar la cookie
		session_destroy();													// Destruye el resto de informaci�n sobre la sesi�n

        echo  $_SESSION['prueba'];

        echo '<a href="index.php">Cerrar sesión</a>';

?>		
