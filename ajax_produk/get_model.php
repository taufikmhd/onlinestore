<?php
// Koneksi ke database
require '../ajax_produk/koneksi.php';

$brand = $_POST['brand'];

// Ambil model berdasarkan brand yang dipilih
$modelQuery = "SELECT MODEL FROM produk WHERE BRAND = '$brand'";
$modelResult = $conn->query($modelQuery);

$models = array();

while ($modelRow = $modelResult->fetch_assoc()) {
  $models[] = $modelRow['MODEL'];
}

$conn->close();

// Kirim data model dalam format JSON
echo json_encode($models);
?>
