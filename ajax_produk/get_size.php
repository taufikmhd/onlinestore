<?php
// Koneksi ke database
require '../ajax_produk/koneksi.php';

$warna = $_POST['warna'];

// Ambil size berdasarkan warna yang dipilih
$sizeQuery = "SELECT SIZE FROM produk WHERE WARNA = '$warna'";
$sizeResult = $conn->query($sizeQuery);

$sizes = array();

while ($sizeRow = $sizeResult->fetch_assoc()) {
  $sizes[] = $sizeRow['SIZE'];
}

$conn->close();

// Kirim data size dalam format JSON
echo json_encode($sizes);
?>
