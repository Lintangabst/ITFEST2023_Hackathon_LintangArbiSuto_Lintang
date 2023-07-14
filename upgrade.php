<?php
session_start();
include_once("config.php");

if (isset($_POST['Submit'])) {
    $username = $_POST["username"];

    // Melakukan query untuk memeriksa data pengguna
    $query = "SELECT * FROM calon_siswa WHERE user = '$username'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // Mengubah status akun menjadi premium
        $query = "UPDATE calon_siswa SET status = 'premium' WHERE user = '$username'";
        mysqli_query($conn, $query);

        echo "<script>alert('Akun berhasil di-upgrade menjadi akun premium.');</script>";
    } else {
        echo "<script>alert('Username tidak valid.');</script>";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upgrade Akun</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="flex items-center justify-center h-screen">
        <div class="bg-white shadow-lg rounded-lg p-8">
            <h2 class="text-2xl font-bold mb-4">Upgrade Akun</h2>
            <p class="mb-4">Masukkan username akun yang ingin diupgrade menjadi akun premium.</p>
            <form method="POST" action="">
                <label for="username" class="block mb-2">Username:</label>
                <input type="text" id="username" name="username" required class="border border-gray-300 px-4 py-2 mb-4 rounded-md w-full">

                <input type="submit" name="Submit" value="Upgrade Akun" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
            </form>
        </div>
    </div>
</body>

</html>
