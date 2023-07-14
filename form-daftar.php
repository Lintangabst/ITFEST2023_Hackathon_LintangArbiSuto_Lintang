<?php
session_start();
include_once("configklik.php");

// Memeriksa apakah tombol "Daftar" telah diklik
if (isset($_POST['daftar'])) {
    // Lakukan proses pendaftaran

    // Ambil data dari formulir pendaftaran
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $agama = $_POST["agama"];
    $sekolah_asal = $_POST["sekolah_asal"];

    // Proses penyimpanan data atau tindakan lain sesuai kebutuhan Anda
    // ...

    // Setelah proses pendaftaran selesai, Anda dapat mengarahkan pengguna ke halaman index.php atau halaman lain yang sesuai
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Formulir Pendaftaran Mood | Website Pembelajaran</title>
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
	<style>
		.animated {
			animation-duration: 1s;
			animation-fill-mode: both;
		}

		@keyframes fadeIn {
			from {
				opacity: 0;
			}
			to {
				opacity: 1;
			}
		}

		.fadeIn {
			animation-name: fadeIn;
		}

		@keyframes slideInUp {
			from {
				transform: translateY(100%);
			}
			to {
				transform: translateY(0);
			}
		}

		.slideInUp {
			animation-name: slideInUp;
		}

		.container {
			width: 400px;
			margin: 0 auto;
			padding: 40px;
			border-radius: 8px;
			box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
			background-color: #ffffff;
		}
	</style>
</head>
<body class="bg-gradient-to-b from-blue-200 to-orange-500 min-h-screen">
	<div class="flex justify-center items-center h-screen">
		<div class="container animate__animated animate__fadeIn">
			<h3 class="text-2xl text-center mb-4">Formulir Pendaftaran</h3>
			<form action="proses-pendaftaran.php" method="POST" class="p-4">
				<fieldset>
				    <div class="mb-4">
					<label for="user" class="font-bold">Username:</label>
					<input type="text" name="user" placeholder="Username Anda" class="border border-gray-300 p-2 rounded-md w-full" />
					</div>
					<div class="mb-4">
					<label for="pass" class="font-bold">Password:</label>
					<input type="text" name="pass" placeholder="Password Anda" class="border border-gray-300 p-2 rounded-md w-full" />
					</div>
					<div class="mb-4">
						<label for="nama" class="font-bold">Nama:</label>
						<input type="text" name="nama" placeholder="Nama lengkap" class="border border-gray-300 p-2 rounded-md w-full" />
					</div>
					<div class="mb-4">
						<label for="alamat" class="font-bold">Alamat:</label>
						<textarea name="alamat" class="border border-gray-300 p-2 rounded-md w-full"></textarea>
					</div>
					<div class="mb-4">
						<label for="jenis_kelamin" class="font-bold">Jenis Kelamin:</label>
						<div class="mt-2">
							<label class="mr-2">
								<input type="radio" name="jenis_kelamin" value="laki-laki" class="mr-1"> Laki-laki
							</label>
							<label>
								<input type="radio" name="jenis_kelamin" value="perempuan" class="mr-1"> Perempuan
							</label>
						</div>
					</div>
					<div class="mb-4">
						<label for="agama" class="font-bold">Agama:</label>
						<select name="agama" class="border border-gray-300 p-2 rounded-md mt-2">
							<option>Islam</option>
							<option>Kristen</option>
							<option>Hindu</option>
							<option>Budha</option>
							<option>Atheis</option>
						</select>
					</div>
					<div class="mb-4">
						<label for="sekolah_asal" class="font-bold">Sekolah Asal:</label>
						<input type="text" name="sekolah_asal" placeholder="Nama sekolah" class="border border-gray-300 p-2 rounded-md w-full" />
					</div>

					<div class="flex justify-between">
						<input type="submit" value="Daftar" name="daftar" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" />
						<a href="klik.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Kembali</a>
					</div>
				</fieldset>
			</form>
		</div>
	</div>

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			document.querySelector("form").classList.add("animate__animated", "animate__slideInUp");
		});
	</script>
</body>
</html>
