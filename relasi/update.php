<?php
include 'connect.php';
// get id dari parameter
$id = $_GET['id'];

// get siswa by id
$get_data = "select * from siswa where id_siswa = $id";
$result_data = mysqli_query($conn, $get_data);
$siswa = mysqli_fetch_assoc($result_data);
$nama_siswa = $siswa['nama_siswa'];
$nisn = $siswa['nisn'];
$gender = $siswa['gender'];
$id_kelas = $siswa['id_kelas'];

if (isset($_POST['submit'])) {
    $nama_siswa = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $gender = $_POST['gender'];
    $id_kelas = $_POST['id_kelas'];
    $sql = "update siswa set id=$id, nama_siswa='$nama_siswa', nisn='$nisn', gender='$gender', id_kelas='$id_kelas' where id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:siswa.php');
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
        <form method="post" class="row">
            <div class="mb-3 col-6">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama_siswa ?>">
            </div>
            <div class="mb-3 col-6">
                <label for="nisn" class="form-label">NISN</label>
                <input type="text" class="form-control" id="nisn" name="nisn" value="<?php echo $nisn ?>">
            </div>
            <div class="mb-3 col-6">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected value="<?php echo $nama_siswa ?>"><?php echo $nama_siswa ?></option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="kelas" class="form-label">Kelas</label>
                <select name="id_kelas" class="form-select">
                    <option selected>Pilih Kelas</option>
                    <?php
                    $sql = 'SELECT * FROM kelas';
                    $result = mysqli_query($conn, $sql);
                    foreach ($result as $row): ?>
                        <option value="<?= $row['id'] ?>"><?= $row['tingkat_kelas'] .' ' .$row['jurusan_kelas'] ?>
                    </option>
                    <?php endforeach;
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>