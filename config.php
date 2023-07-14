<?php
session_start();

$servername = "localhost"; // Ubah dengan servername Anda
$username = "syldamyi_mood"; // Ubah dengan username database Anda
$password = "Lintangas123!"; // Ubah dengan password database Anda
$database = "syldamyi_mood"; // Ubah dengan nama database Anda

// Membuat koneksi ke database
$conn = mysqli_connect($servername, $username, $password, $database);
?>