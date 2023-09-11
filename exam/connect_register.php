<?php
$servername = "localhost:3306";
$username_db = "root";
$password_db = "";
$dbname = "db_sekolah";

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

// Create connection
$conn = new mysqli($servername, $username_db, $password_db, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO admin (email, username, password) VALUES (?, ?, ?)");
    $password_hash = md5($password);
    $stmt->bind_param("sss", $email, $username, $password_hash);
    $stmt->execute();
    echo "Registrasi berhasil";
    $stmt->close();
    $conn->close();
}
?>