<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>materi 1</title>
</head>
<body>
    
<!-- input nama -->
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Nama: <input type="text" name="fname">
  <br>
  Umur: <input type="text" name="umur">
  <br>
  <input type="submit">
</form>

<br>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai dari input field
    $name = $_POST['fname'];
    $umur = $_POST['umur'];
    
    // Validasi data
    if (empty($name) && empty($umur)) {
      echo "Nama dan umur kosong";
    } else {
      // Menampilkan hasil
      if (!empty($name)) {
        echo "Nama saya" . " " . $name;
      }
      if (!empty($umur)) {
        echo " dan umur ku" . " " . $umur;
      }
    }
  }
  ?>

</body>
</html>