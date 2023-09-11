<?php
include '../connect/connect.php';
session_start();

if (!isset($_SESSION['email'])) {
    echo "<script>alert('Maaf anda harus login terlebih dahulu');</script>";
    echo "<script>window.location.href = '../user/login.php';</script>;";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body class="min-vh-100 align-items-center">
    <h3 class="text-center mt-5">Bookstore</h3>
    <div class="card w-75 m-auto p-3">
        <table class="table table-striped table-hover">
            <div class="d-flex justify-content-sm-end">
                <button onClick="window.location.href='create.php'" class="btn btn-sm btn-primary">Tambah</button>
            </div>
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun terbit</th>
                    <th>harga</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                $sql = 'select * from bookstore';
                $result = mysqli_query($conn, $sql);
                if ($result->num_rows > 0) {
                    while ($data = mysqli_fetch_assoc($result)) {
                        $id = $data['id'];
                        $judul = $data['judul'];
                        $penulis = $data['penulis'];
                        $penerbit = $data['penerbit'];
                        $tahun_terbit = $data['tahun_terbit'];
                        $harga = $data['harga'];
                        echo '
                            <tr>
                                <td>' . $judul . '</td>
                                <td>' . $penulis . '</td>
                                <td>' . $penerbit . '</td>
                                <td>' . $tahun_terbit . '</td>
                                <td>Rp.' . $harga . '</td>
                                <td class="text-center">
                                    <a href="update.php?id=' . $id . '" class="btn btn-sm btn-primary">Update</a>
                                    <button onClick="hapus(' . $id . ')" class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                        ';
                    }
                } else {
                    echo "<tr><td colspan='6'>Tidak ada data buku.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="d-flex justify-content-sm-end">
            <button onClick="window.location.href='../user/logout.php'" class="btn btn-sm btn-danger">Log Out</button>
        </div>
    </div>
    <script>
        function hapus(id) {
            var yes = confirm('Yakin Di Hapus?');
            if (yes == true) {
                window.location.href = "delete.php?id=" + id;
            }
        }
    </script>
</body>

</html>