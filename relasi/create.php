<?php
include 'connect.php';
if (isset($_POST['submit'])) {

    // post
    $nama_siswa = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $gender = $_POST['gender'];
    $input_id_kelas = $_POST['id_kelas'];

    // get all data kelas
    $get_data_kelas = "select * from kelas";
    $result_data_kelas = mysqli_query($conn, $get_data_kelas);
    $kelas = mysqli_fetch_assoc($result_data_kelas);
    $id_kelas = $kelas['id'];
    $tingkat_kelas = $kelas['tingkat_kelas'];
    $jurusan_kelas = $kelas['jurusan_kelas'];

    // untuk menambahkan data ke database
    $sql = "INSERT INTO siswa(nama_siswa, nisn, gender, id_kelas) VALUES('$nama_siswa', '$nisn', '$gender', '$input_id_kelas')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:siswa.php');
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
    <title>Tambah Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body class="min-vh-100 d-flex align-items-center">
    <div class='card w-50 m-auto p-3'>
        <h3 class="text-center ">Tambah Data Siswa</h3>
        <form method="post" class="row">
            <div class="mb-3 col-6">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3 col-6">
                <label for="nisn" class="form-label">NISN</label>
                <input type="text" class="form-control" id="nisn" name="nisn">
            </div>
            <div class="mb-3 col-6">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Pilih Gender</option>
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