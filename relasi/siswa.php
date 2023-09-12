<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body class="min-vh-100 d-flex align-items-center">
    <div class="card w-75 m-auto p-3">
        <h3 class="text-center">Siswa</h3>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>NISN</th>
                    <th>Gender</th>
                    <th>Kelas</th>
                    <th>Sekolah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
            <?php
                $sql = "select * from siswa 
                INNER JOIN kelas ON siswa.id_kelas = kelas.id 
                INNER JOIN sekolah ON kelas.id_sekolah = sekolah.id";
                $result = mysqli_query($conn, $sql);
                $no = 1;
                foreach ($result as $row) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['nama_siswa']; ?></td>
                        <td><?= $row['nisn']; ?></td>
                        <td><?= $row['gender']; ?></td>
                        <td><?= $row['tingkat_kelas'] . ' ' . $row['jurusan_kelas'] ?></td>
                        <td><?= $row['nama_sekolah']; ?></td>
                        <td class="text-center">
                            <a href="<?= 'update.php?id='.$row['id'];?>" class="btn btn-sm btn-primary">Update</a>
                            <a href="<?= 'detail.php?id='.$row['id'];?>" class="btn btn-sm btn-primary">Detail</a>
                            <button onClick="<?= 'hapus('.$row['id'].')'?>" class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                <?php
                }
            ?>
            </tbody>
        </table>
        <a href="create.php" class="btn btn-sm btn-primary">tambah</a>
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