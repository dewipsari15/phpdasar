<?php
$servername = "localhost:3306";
$username = "root";
$password_db = "";
$dbname = "db_sekolah";

$email = $_POST['email'];
$password = $_POST['password'];

// Create connection
$conn = new mysqli($servername, $username, $password_db, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("select * from admin where email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if ($data['password'] === md5($password)) {
            echo "<h2>Login Berhasil, Halo " . $data['username'] . "</h2>";
        } else {
            echo "<h2>Email Atau Password salah</h2>";
        }
    } else {
        echo "<h2>Email Atau Password salah</h2>";
    }
}
?>