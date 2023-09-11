<?php
include '../connect/connect.php';

session_start();

if (!isset($_SESSION['email'])) {
    echo "<script>alert('Maaf anda harus login terlebih dahulu');</script>";
    echo "<script>window.location.href = '../user/login.php';</script>";
}

if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $harga = $_POST['harga'];
    $sql = "INSERT INTO bookstore(judul, penulis, penerbit, tahun_terbit, harga) VALUES('$judul', '$penulis', '$penerbit', '$tahun_terbit', '$harga')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:dashboard.php');
    } else {
        die($conn->connect_error);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body class="min-vh-100 d-flex align-items-center">
    <div class='card w-50 m-auto p-3'>
        <h3 class="text-center ">Tambah Data Buku</h3>
        <form method="post">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul">
            </div>
            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis</label>
                <input type="text" class="form-control" id="penulis" name="penulis">
            </div>
            <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit">
            </div>
            <div class="mb-3">
                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
        </form>
    </div>
</body>

</html>