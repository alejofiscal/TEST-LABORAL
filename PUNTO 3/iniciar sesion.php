<!DOCTYPE html>
<html>
<head>
	<title>iniciar sesion</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <form method="post">
    	<h1>¡Inicia Sesion!</h1>
    	<input type="email" name="email" placeholder="Email">
		<input type="password" name="password" placeholder="Password">
    	<input type="submit" name="ingresar" value="Ingresar">
    </form>
        <?php 
        include("validar.php");
        ?>
</body>
</html>