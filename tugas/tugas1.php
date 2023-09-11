<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas1</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        Nama: <input type="text" name="name">
        <br>
        Umur: <input type="text" name="umur">
        <br>
        Gender:
        <input type="radio" name="gender" value="pria">Pria
        <input type="radio" name="gender" value="wanita">Wanita
        <br>
        Hobi:
        <input type="checkbox" name="hobi[]" value="Membaca"> Membaca
        <input type="checkbox" name="hobi[]" value="Olahraga"> Olahraga
        <input type="checkbox" name="hobi[]" value="Musik"> Musik
        <br>
        <input type="submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai dari input field
    $name = $_POST['name'];
    $umur = $_POST['umur'];
    $gender = $_POST['gender'];
    $hobi = $_POST['hobi'];
    
    // Validasi data
    if (empty($name) && empty($umur)) {
      echo "Nama dan umur kosong";
    } else {
        echo "Nama saya $name," . "Umur saya $umur tahun," . " Saya seorang $gender," .  "Dan hobi saya adalah";
        foreach ($hobi as $kegemaran) {
            echo " ". " $kegemaran";
        }
    }
  }
  ?>
</body>
</html>