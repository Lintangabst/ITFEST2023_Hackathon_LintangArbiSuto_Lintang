<?php
session_start();

$server = "localhost"; 
$user = "syldamyi_mood";
$password = "Lintangas123!";
$nama_database = "syldamyi_mood";
$db = mysqli_connect($server, $user, $password, $nama_database); 
if( !$db ){
	die("Gagal terhubung dengan database: " . mysqli_connect_error());
}
?>