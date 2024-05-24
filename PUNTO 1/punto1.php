<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>punto 1</title>
</head>

<body>
	 	
 <?php
// MySQL connection information
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
// Create the users table
$sql = "CREATE TABLE IF NOT EXISTS users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
)";
if (mysqli_query($connection, $sql)) {
    echo "Table users created successfully\n";
} else {
    echo "Error creating users table: " . mysqli_error($connection);
}

$records = [
    ["Alejandro Fiscal", "fiscalpogo@gmail.com", "1234"],
    ["Alejandro Rodriguez", "rodriguezpogo@gmail.com", "1234"],
    ["Alejandro Varon", "varonpogo@gmail.com", "1234"]
];

// Insert data
foreach ($records as $record) {
    $name = $record[0];
    $email = $record[1];
    $password = $record[2];

    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

    if (mysqli_query($connection, $sql)) {
        echo "<br>Record inserted successfully: $name ($email)";
    } else {
        echo "<br>Failed to insert record: " . mysqli_error($connection);
    }
}

// Function to get username by email
function getUsernameByEmail($email)
{
    global $connection;
    $sql = "SELECT name FROM users WHERE email ='$email'";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row["name"];
    } else {
        return null;
    }
}

// Function to update password by username
function updatePasswordByUsername($name, $newPassword)
{
    global $connection;
    $sql = "UPDATE users SET password ='$newPassword' WHERE name = '$name'";

    if (mysqli_query($connection, $sql)) {
        echo "<br>Password updated successfully for user: '$name'";
    } else {
        echo "Error updating password: " . mysqli_error($connection);
    }
}

// Test functions
$username = getUsernameByEmail("varonpogo@gmail.com");
echo "<br>Username corresponding to the email varonpogo@gmail.com: $username\n";

updatePasswordByUsername("Alejandro Varon", "newpassword123");
echo "<br>Password updated";

mysqli_close($connection);
?>
</body>
</html>