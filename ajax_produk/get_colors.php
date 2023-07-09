<?php
// Koneksi ke database
require '../ajax_produk/koneksi.php';

$model = $_POST['model'];

// Ambil warna berdasarkan model yang dipilih
$warnaQuery = "SELECT WARNA FROM produk WHERE MODEL = '$model'";
$warnaResult = $conn->query($warnaQuery);

$warna = array();

while ($warnaRow = $warnaResult->fetch_assoc()) {
  $warna[] = $warnaRow['WARNA'];
}

$conn->close();

// Kirim data warna dalam format JSON
echo json_encode($warna);
?>
