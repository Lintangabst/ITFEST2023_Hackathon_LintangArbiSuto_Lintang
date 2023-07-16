<?php
session_start();
include_once("config.php");

// Periksa apakah ada data yang dikirim melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Ambil data dari formulir
  $nama = $_POST["nama"];
  $username = $_POST["username"];
  $metode_pembayaran = $_POST["metode_pembayaran"];

  // Generate order_id secara acak
  $order_id = rand();

  // Set biaya dan status transaksi
  $biaya = 20000;
  $transaction_status = 1;

  // Query untuk menyimpan data ke tabel klien
  $query = "INSERT INTO klien (nama, uname, biaya, order_id, transaction_status, metode_pembayaran) VALUES ('$nama', '$username', $biaya, $order_id, $transaction_status, '$metode_pembayaran')";

  if ($conn->query($query) === TRUE) {
    // Redirect ke halaman data.php setelah data berhasil disimpan
    header("Location: data.php");
    exit();
  } else {
    echo "Terjadi kesalahan saat menyimpan data: " . $conn->error;
  }

  // Tutup koneksi
  $conn->close();
}
?>
