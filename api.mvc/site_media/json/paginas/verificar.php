<?php
	// Si se usa debe contener (s�lo caracteres alfanum�ricos) e ir antes de session_start():
	session_id("identificadorDeSesion");	

    session_start();  // Continuar la sesi�n
    
    if( ! empty($_POST)){
	if( isset($_POST['user']) && isset($_POST['pass'])){
        $_SESSION['user']=$_POST['user'];
        $_SESSION['pass']=$_POST['pass'];
        $_SESSION['verificador']=3;
        header('Location:menuPrincipalSesionDependencia.php');
    }
	else
	{
		header('Location:index.php');
	}
    }

?>		
