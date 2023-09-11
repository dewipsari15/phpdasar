<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_sekolah";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE admin (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(255) NOT NULL,
username VARCHAR(255) NOT NULL,
passwordd VARCHAR(255) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table admin created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
