<?php
include '../connect/connect.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "delete from bookstore where id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:dashboard.php');
    } else {
        die($conn->$connect_error);
    }
}
?>