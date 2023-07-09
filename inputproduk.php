<?php
// Koneksi ke database
require 'koneksi.php';

// Mengambil data brand dari tabel brand
$brandQuery = "SELECT distinct BRAND FROM produk ";
$brandResult = $conn->query($brandQuery);

// Mengambil data model dari tabel model
$brand='';

$modelQuery = "SELECT distinct MODEL FROM produk";
$modelResult = $conn->query($modelQuery);

// Mengambil data warna dari tabel warna
$warnaQuery = "SELECT distinct WARNA FROM produk";
$warnaResult = $conn->query($warnaQuery);

// Mengambil data size dari tabel size
$sizeQuery = "SELECT distinct SIZE FROM produk";
$sizeResult = $conn->query($sizeQuery);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Form Input Data Produk</title>
  <style>
    .container {
      max-width: 400px;
      margin: 0 auto;
      margin-top: 50px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2 class="text-center">Form Input Data Produk</h2>
    <form method="POST" action="">
      <div class="form-group">
        <label for="brand">Brand:</label>
        <select class="form-control" name="brand" id="brand">
          <option value="">Pilih Brand</option>
          <?php while ($brandRow = $brandResult->fetch_assoc()) { ?>
            <option value='"<?php echo $brandRow['ID']; ?>"'><?php echo $brandRow['BRAND']; ?></option>
          <?php } ?>
        </select>
        <input type="text" class="form-control mt-2" name="brand_custom" id="brand_custom" placeholder="Masukkan Brand Lainnya">
      </div>
      <div class="form-group">
        <label for="model">Model:</label>
        <select class="form-control" name="model" id="model">
          <option value="">Pilih Model</option>
          <?php while ($modelRow = $modelResult->fetch_assoc()) { ?>
            <option value='"<?php echo $modelRow['ID']; ?>"'><?php echo $modelRow['MODEL']; ?></option>
          <?php } ?>
        </select>
       
        <input type="text" class="form-control mt-2" name="model_custom" id="model_custom" placeholder="Masukkan Model Lainnya">
      </div>
      <div class="form-group">
        <label for="warna">Warna:</label>
        <select class="form-control" name="warna" id="warna">
          <option value="">Pilih Warna</option>
          <?php while ($warnaRow = $warnaResult->fetch_assoc()) { ?>
            <option value='"<?php echo $warnaRow['ID']; ?>"'><?php echo $warnaRow['WARNA']; ?></option>
          <?php } ?>
        </select>
        <input type="text" class="form-control mt-2" name="warna_custom" id="warna_custom" placeholder="Masukkan Warna Lainnya">
      </div>
      <div class="form-group">
        <label for="size">Size:</label>
        <select class="form-control" name="size" id="size">
          <option value="">Pilih Size</option>
          <?php while ($sizeRow = $sizeResult->fetch_assoc()) { ?>
            <option value='"<?php echo $sizeRow['id']; ?>"'><?php echo $sizeRow['SIZE']; ?></option>
          <?php } ?>
        </select>
        <input type="text" class="form-control mt-2" name="size_custom" id="size_custom" placeholder="Masukkan Size Lainnya">
      </div>
      <div class="form-group">
        <label for="harga">Harga:</label>
        <input type="number" class="form-control" name="harga" id="harga" placeholder="Masukkan Harga">
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
