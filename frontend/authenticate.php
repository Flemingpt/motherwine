<?php

// Change this to your connection info.
$servername = "localhost";
$username = "root";
$password = "";
$db = "motherwine";
// Try and connect using the info above.
$con = new mysqli($servername, $username, $password, $db);
session_start();

if ($con->connect_error) {
    die("Erro: " . $con->connect_error);
}

if ( !isset($_POST["username"], $_POST["password"]) ) {
	// Could not get the data that should have been sent.
	die ("Por favor preencha os campos!");
}

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare("SELECT users.id, users.pass FROM users WHERE username = ?")) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        // Account exists, now we verify the password.
        if ($_POST['password'] === $password) {
            // Verification success! User has loggedin!
            // Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            header('Location:index.php');
        } else {
            echo "Password incorrecta!";
        }
    } else {
        echo "Nome de utilizador inexistente!";
    }
    }
    $stmt->close();
    ?>

    