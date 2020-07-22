<?php

// Change this to your connection info.
$servername = "localhost";
$username = "root";
$password = "";
$db = "motherwine";
$sessionid_ = $_POST["sessionid_"];
$pass = $_POST["pass"];
$email= $_POST["email"];
$username_update = $_POST["username"];

// Try and connect using the info above.
$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Erro: " . $conn->connect_error);
}

$sql = "UPDATE users SET username='$username_update', pass='$pass', email='$email' WHERE id LIKE '$sessionid_';";

if (mysqli_query($conn, $sql)) {
    header("Location: profile.php?success=true");
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

$conn->close();

?>

