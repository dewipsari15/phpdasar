<?php
$servername = "localhost:3306";
$username_db = "root";
$password_db = "";
$dbname = "task_crud";

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

// Create connection
$conn = new mysqli($servername, $username_db, $password_db, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO user (email, username, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $username, md5($password));
    $stmt->execute();
    header("Location: login.php");
    $stmt->close();
    $conn->close();
}
?>