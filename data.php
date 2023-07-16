<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
      $query = "SELECT nama, uname, order_id, transaction_status, metode_pembayaran, biaya FROM klien ORDER BY id DESC LIMIT 1";
      $result = $conn->query($query);

      // Tampilkan data
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nama = $row["nama"];
        $uname = $row["uname"];
        $orderId = $row["order_id"];
        $transactionStatus = $row["transaction_status"];
        $metodePembayaran = $row["metode_pembayaran"];
        $biaya = $row["biaya"];

        echo '<div class="mb-4">';
        echo '<label class="block font-medium text-gray-700 font-bold">Nama:</label>';
        echo '<span class="block text-gray-500">' . $nama . '</span>';
        echo '<label class="block font-medium text-gray-700 font-bold">Username:</label>';
        echo '<span class="block text-gray-500">' . $uname . '</span>';
        echo '<label class="block font-medium text-gray-700 font-bold">Order ID:</label>';
        echo '<span class="block text-gray-500">' . $orderId . '</span>';
        echo '<label class="block font-medium text-gray-700 font-bold">Harus Di Bayar:</label>';
        echo '<span class="block text-gray-500">' . $biaya . '</span>';
        echo '<label class="block font-medium text-gray-700 font-bold">Rekening Tujuan:</label>';

        // Tampilkan informasi rekening tujuan berdasarkan metode pembayaran
        switch ($metodePembayaran) {
          case 'BCA':
            $rekeningTujuan = '7010489185';
            break;
          case 'OVO':
          case 'DANA':
          case 'SHOPEEPAY':
            $rekeningTujuan = '081317157363';
            break;
          default:
            $rekeningTujuan = '-';
            break;
        }

        echo '<span class="block text-gray-500">' . $rekeningTujuan . '</span>';
        echo '<label class="block font-medium text-gray-700 font-bold">Status Transaksi:</label>';

        // Tampilkan informasi status transaksi berdasarkan nilai transaction_status
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

<a href="https://api.whatsapp.com/send?phone=081317157363" target="_blank" class="fixed bottom-4 right-4">
  <i class="fas fa-question-circle text-4xl text-yellow-400"></i>
</a>


    </div>
  </div>
</body>

</html>
