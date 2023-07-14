<?php
include("configklik.php");

if (isset($_POST['daftar'])) {
    // Ambil data dari formulir
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $agama = $_POST["agama"];
    $sekolah_asal = $_POST["sekolah_asal"];

    // Buat query
    $sql = "INSERT INTO calon_siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal, user, pass) VALUES ('$nama', '$alamat', '$jenis_kelamin', '$agama', '$sekolah_asal', '$user', '$pass')";
    $query = mysqli_query($db, $sql);

    // Apakah query simpan berhasil?
    if ($query) {
        // Jika berhasil, alihkan ke halaman index.php dengan status-sukses
        header('Location: klik.php?status=sukses');
    } else {
        // Jika gagal, alihkan ke halaman index.php dengan status-gagal
        header('Location: klik.php?status=gagal');
    }
} else {
    die("Akses dilarang...");
}
?>