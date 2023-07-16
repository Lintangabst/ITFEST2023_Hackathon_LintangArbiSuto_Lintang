<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
  <style>
    .invoice-container {
      background-image: url('img/mood.png');
      background-size: 80% auto;
      background-position: center center;
      background-repeat: no-repeat;
    }
  </style>
  <title>Data Transaksi</title>
</head>

<body class="bg-gray-100">
  <div class="flex items-center justify-center h-screen invoice-container">
    <div class="p-6 bg-white rounded-md shadow-md w-[400px]">
      <h1 class="text-2xl font-bold mb-6">Data Transaksi</h1>

      <?php
      // Impor file config.php
      require_once 'config.php';

      // Koneksi ke database
      $conn = new mysqli($servername, $username, $password, $database);

      // Periksa koneksi
      if ($conn->connect_error) {
        die("Koneksi ke database gagal: " . $conn->connect_error);
      }

      // Query untuk mengambil data terbaru dari tabel klien
      $query = "SELECT nama, uname, order_id, transaction_status FROM klien ORDER BY id DESC LIMIT 1";
      $result = $conn->query($query);

      // Tampilkan data
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nama = $row["nama"];
        $uname = $row["uname"];
        $orderId = $row["order_id"];
        $transactionStatus = $row["transaction_status"];

        echo '<div class="mb-4">';
        echo '<label class="block font-medium text-gray-700 font-bold">Nama:</label>';
        echo '<span class="block text-gray-500">' . $nama . '</span>';
        echo '<label class="block font-medium text-gray-700 font-bold">Username:</label>';
        echo '<span class="block text-gray-500">' . $uname . '</span>';
        echo '<label class="block font-medium text-gray-700 font-bold">Order ID:</label>';
        echo '<span class="block text-gray-500">' . $orderId . '</span>';
        echo '<label class="block font-medium text-gray-700 font-bold">Status Transaksi:</label>';

        // Ubah tampilan status berdasarkan nilai transaction_status
        switch ($transactionStatus) {
          case 1:
            echo '<span class="block text-red-500">Pembayaran Belum Dilakukan</span>';
            break;
          case 2:
            echo '<span class="block text-orange-500">Pesanan Pending</span>';
            break;
          case 3:
            echo '<span class="block text-green-500">Pesanan Berhasil</span>';
            break;
          default:
            echo '<span class="block text-gray-500">Status Transaksi Tidak Valid</span>';
            break;
        }

        echo '</div>';
      } else {
        echo "Tidak ada data transaksi yang ditemukan.";
      }

      // Tutup koneksi
      $conn->close();
      ?>

    </div>
  </div>
</body>

</html>
