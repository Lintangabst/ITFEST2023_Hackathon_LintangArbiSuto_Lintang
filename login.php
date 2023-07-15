<?php
session_start();
include_once("config.php");

// Memeriksa apakah form login telah disubmit
if (isset($_POST['Submit'])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Melakukan query untuk memeriksa data pengguna
    $query = "SELECT * FROM calon_siswa WHERE user = '$username' AND pass = '$password'";
    $result = mysqli_query($conn, $query);
    $res = mysqli_num_rows($result);

    // Memeriksa apakah pengguna ditemukan
    if ($res > 0) {
        // Ambil data pengguna dari hasil query
        $row = mysqli_fetch_assoc($result);
        $nama = $row["nama"];

        // Simpan nama dalam session
        $_SESSION["nama"] = $nama;
        $_SESSION["username"] = $username;
        $_SESSION['loggedin'] = true;

        // Redirect ke halaman beranda atau halaman lainnya
        header("Location: index.php");
        exit(); // tambahkan exit() untuk menghentikan eksekusi kode selanjutnya
    } else {
        // Data pengguna tidak ditemukan, tampilkan pesan kesalahan
        echo "<script>
            alert('Login gagal! Username dan Password Anda salah.');
            </script>";
    }
}

mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .gradient-bg {
            background: linear-gradient(to right, #C4DFDF, #FF7F50);
        }
        
        .animate-pulse {
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
        }
    </style>
    <script src="script.js"></script>
</head>
<body>
    <div class="flex items-center justify-center h-screen gradient-bg">
        <div class="bg-white shadow-lg rounded-lg p-8 transform transition-all duration-500 ease-in-out hover:scale-110">
            <h2 class="text-2xl font-bold mb-4">Login Pengguna</h2>
            <form method="POST" action="">
                <label for="username" class="block mb-2">Username:</label>
                <input type="text" id="username" name="username" required class="border border-gray-300 px-4 py-2 mb-4 rounded-md w-full">

                <label for="password" class="block mb-2">Password:</label>
                <input type="password" id="password" name="password" required class="border border-gray-300 px-4 py-2 mb-4 rounded-md w-full">
                <input type="checkbox" id="showPassword" onchange="togglePasswordVisibility()" />
                <label for="showPassword">Tampilkan kata sandi</label>

                <input type="submit" value="Login" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300" name="Submit">
            </form>
            <p class="mt-4">Akses Gratis! <a href="klik.php" class="text-blue-500">Klik disini</a></p>
        </div>
    </div>

    <script>
        function validateForm() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;

            if (username === "" || password === "") {
                alert("Username dan password harus diisi");
                return false;
            }

            return true;
        }
    </script>
        <script>
function togglePasswordVisibility() {
  var passwordInput = document.getElementById("password");
  var showPasswordCheckbox = document.getElementById("showPassword");

  if (showPasswordCheckbox.checked) {
    passwordInput.type = "text";
  } else {
    passwordInput.type = "password";
  }
}
</script>
</body>
</html>
