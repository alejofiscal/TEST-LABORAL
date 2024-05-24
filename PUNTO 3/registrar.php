<?php 

$host = "localhost";
$user = "root";

// MySQL connection
$connection = mysqli_connect($host, $user);
// Verification
if (!$connection) {
    echo "Error: Unable to connect to MySQL: " . mysqli_connect_error();
    exit();
}
// Database name
$database = "usuariosalcaldia";
// Select the database
$db = mysqli_select_db($connection, $database);

if (isset($_POST['register'])) {
    if (strlen($_POST['name']) >= 1 && strlen($_POST['email']) >= 1 && strlen($_POST['password']) >= 1) {
	    $name = trim($_POST['name']);
	    $email = trim($_POST['email']);
	    $password= trim($_POST["password"]);
	    $consulta = "INSERT INTO users(name, email, password) VALUES ('$name','$email','$password')";
	    $resultado = mysqli_query($connection,$consulta);
	    if ($resultado) {
	    	?> 
	    	<h3 class="ok">¡Te has inscripto correctamente!</h3>
           <?php
	    } else {
	    	?> 
	    	<h3 class="bad">¡Ups ha ocurrido un error!</h3>
           <?php
	    }
    }   else {
	    	?> 
	    	<h3 class="bad">¡Por favor complete los campos!</h3>
           <?php
    }
	
}
if (isset($_POST['session'])){
			header("Location: iniciar sesion.php");
					
	}else 
		?> 
	    	
           