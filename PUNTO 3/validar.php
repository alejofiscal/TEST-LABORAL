<?php   
    session_start();
    $host = "localhost";
	$user = "root";

$connection = mysqli_connect($host, $user);

if (!$connection) {
    echo "Error: Unable to connect to MySQL: " . mysqli_connect_error();
    exit();
}

$database = "usuariosalcaldia";
$db = mysqli_select_db($connection, $database);


    if (isset($_POST['ingresar']) ) {
		$email = trim($_POST['email']);
	    $password= trim($_POST['password']);
		$query = "SELECT * FROM users WHERE email='$email'and password= '$password'";
		$results = mysqli_query($connection, $query);
		
			
  if (mysqli_num_rows($results) >= 1) {
   
      $_SESSION['email'] = $email;
	 echo($email); 
      header("Location: dashboard.php");
    } else {
           echo("Nombre de usuario/contraseña inválidos");
    }
	$sql="SELECT name FROM users WHERE email='$email'";
		$results1 = mysqli_query($connection, $sql);
		if (mysqli_num_rows($results1) >= 1) {
   
    $row = mysqli_fetch_assoc($results1);
    $name = $row['name'];
			$_SESSION['name'] = $name;	
 echo($name);  
			
}
   
	}
?>
