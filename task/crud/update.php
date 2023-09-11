<?php
include '../connect/connect.php';
$id = $_GET['id'];
$get_data = "select * from bookstore where id=$id";
$result_data = mysqli_query($conn, $get_data);
$row = mysqli_fetch_assoc($result_data);
$judul = $row['judul'];
$penulis = $row['penulis'];
$penerbit = $row['penerbit'];
$tahun_terbit = $row['tahun_terbit'];
$harga = $row['harga'];
if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $harga = $_POST['harga'];
    $sql = "update bookstore set id=$id, judul='$judul', penulis='$penulis', penerbit='$penerbit', tahun_terbit='$tahun_terbit', harga='$harga' where id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:dashboard.php');
    } else {
        die($conn->$connect_error);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body class="min-vh-100 d-flex align-items-center">
    <div class='card w-50 m-auto p-3'>
        <h3 class="text-center ">Update</h3>
        <form method="post">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $judul; ?>">
            </div>
            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis</label>
                <input type="text" class="form-control" id="penulis" name="penulis" value="<?php echo $penulis; ?>">
            </div>
            <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?php echo $penerbit; ?>">
            </div>
            <div class="mb-3">
                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit"
                    value="<?php echo $tahun_terbit; ?>">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $harga; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
</body>

</html>