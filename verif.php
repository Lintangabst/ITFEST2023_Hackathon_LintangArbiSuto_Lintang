<?php
session_start();
include_once("config.php");

// Set default status validasi kode voucher
$validVoucher = true;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ambil nilai kode voucher dari formulir
    $voucher = $_POST['voucher'];

    // Sanitasi kode voucher sebelum digunakan dalam query SQL
    $voucher = mysqli_real_escape_string($conn, $voucher);

    // Query SQL untuk memeriksa keberadaan kode voucher dalam tabel 'voucher'
    $sql = "SELECT * FROM voucher WHERE kode = '$voucher'";
    $result = $conn->query($sql);

    // Periksa apakah query berhasil dan kode voucher ditemukan
    if ($result->num_rows > 0) {
        // Kode voucher ditemukan
        // Hapus kode voucher dari tabel 'voucher'
        $deleteSql = "DELETE FROM voucher WHERE kode = '$voucher'";
        if ($conn->query($deleteSql) === TRUE) {
            $validVoucher = true;
        } else {
            $validVoucher = false;
            $message = "Terjadi kesalahan saat menghapus kode voucher: " . $conn->error;
        }
    } else {
        // Kode voucher tidak ditemukan
        $validVoucher = false;
    }

    // Tutup koneksi database
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Page</title>
    <!-- Add Tailwind CSS link here -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @keyframes checkmark {
            0% {
                stroke-dashoffset: 24;
                transform: scale(0.5);
            }
            50% {
                stroke-dashoffset: 0;
                transform: scale(1);
            }
            100% {
                stroke-dashoffset: 0;
                transform: scale(1);
            }
        }

        .checkmark__circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke-miterlimit: 10;
            stroke: #4BB543;
            fill: none;
            animation: checkmark 0.6s ease-in-out;
        }

        .checkmark__check {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            stroke-width: 2;
            stroke: #4BB543;
            fill: none;
            animation: checkmark 0.6s ease-in-out;
        }
    </style>
</head>

<body class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-sm p-6 bg-white rounded-md shadow-md">
        <h1 class="text-2xl font-bold mb-4">Verification Code</h1>
        <form method="POST">
            <div class="mb-4">
                <label for="voucher" class="block mb-2">Kode Voucher:</label>
                <input type="text" id="voucher" name="voucher" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" placeholder="Masukkan kode voucher">
            </div>
            <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600">Verifikasi</button>
        </form>

        <?php if ($_SERVER["REQUEST_METHOD"] === "POST" && $validVoucher) { ?>
            <div class="mt-4 flex items-center">
                <svg class="checkmark w-6 h-6 text-green-500 mr-2" viewBox="0 0 52 52">
                    <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                    <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                </svg>
                <span class="text-green-500">Kode voucher valid!</span>
            </div>
            <script>
                setTimeout(function() {
                    window.location.href = 'chatbot.html';
                }, 2000); // Mengarahkan ke halaman chatbot.html setelah 2 detik
            </script>
        <?php } elseif ($_SERVER["REQUEST_METHOD"] === "POST" && !$validVoucher) { ?>
            <div class="mt-4 flex items-center">
                <span class="text-red-500">Kode voucher tidak valid!</span>
            </div>
            <?php if (isset($message)) { ?>
                <div class="mt-2 text-red-500"><?php echo $message; ?></div>
            <?php } ?>
        <?php } ?>
    </div>
</body>

</html>
