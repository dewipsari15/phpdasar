<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "task_crud";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE bookstore  (
id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    penulis VARCHAR(255) NOT NULL,
    penerbit VARCHAR(255) NOT NULL,
    tahun_terbit INT NOT NULL,
    harga DECIMAL(10, 2) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table bookstore created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>