<?php

// Change this to your connection info.
$servername = "localhost";
$username = "root";
$password = "";
$db = "motherwine";
$sessionid_ = $_POST["sessionid_"];
$rating = $_POST["onStar"];
$pairing = $_POST["pairing"];

// Try and connect using the info above.
$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Erro: " . $conn->connect_error);
}

$sql = "SELECT pairing_id, user_id, grade_id
FROM rating where pairing_id like '$pairing' and user_id like '$sessionid_'
GROUP BY pairing_id, user_id, grade_id;"; 

$result = $conn->query($sql);

if ($result->num_rows > 0) {
$sql = "UPDATE rating SET grade_id='$rating' WHERE user_id LIKE '$sessionid_' and pairing_id like '$pairing';";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

else {
$sql2 = "INSERT into rating (pairing_id, grade_id, user_id) VALUES ('$pairing', '$rating', '$sessionid_');";

if ($conn->query($sql2) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
    }
}


$conn->close();


?>