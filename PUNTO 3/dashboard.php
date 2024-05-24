<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estiloD.css">
<title>BIENVENIDO</title>
</head>
	<form method="post">
		<?php
		session_start();
		
		$user = $_SESSION['name'];
		
		?>
    	<h1>BIENVENIDO(A) <?php echo($user);?> </h1>
		   <input type="submit" name="sessiondead" value="Cerrar sesion">
		<?php
		if (isset($_POST['sessiondead']) ){
			
    		session_unset();
    		session_destroy();
			header("Location: inicio.php");
		}
		
		?>
	</form>
<body>
</body>
</html>