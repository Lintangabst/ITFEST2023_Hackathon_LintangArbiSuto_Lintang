<?php
include("configklik.php");
// kalau tidak ada id di query string 
if (!isset($_GET['id'])) {
	header('Location: list-siswa.php');
}
//ambil id dari query string 
$id = $_GET['id'];
// buat query untuk ambil data dari database 
$sql = "SELECT * FROM calon_siswa WHERE id=$id";
$query = mysqli_query($db, $sql);
$siswa = mysqli_fetch_assoc($query);
// jika data yang di-edit tidak ditemukan 
if (mysqli_num_rows($query) < 1) {
	die("data tidak ditemukan...");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Formulir</title>
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
	<style>
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
		<div class="container animate__animated animate__fadeInUp">
			<h3 class="text-2xl text-center mb-4">Edit Formulir</h3>
			<form action="proses-edit.php" method="POST" class="p-4">
				<fieldset>
					<input type="hidden" name="id" value="<?php echo $siswa['id'] ?>" />
					<div class="mb-4">
						<label for="nama" class="font-bold">Nama:</label>
						<input type="text" name="nama" placeholder="Nama lengkap" value="<?php echo $siswa['nama'] ?>" class="border border-gray-300 p-2 rounded-md w-full" />
					</div>
					<div class="mb-4">
						<label for="alamat" class="font-bold">Alamat:</label>
						<textarea name="alamat" class="border border-gray-300 p-2 rounded-md w-full"><?php echo $siswa['alamat'] ?></textarea>
					</div>
					<div class="mb-4">
						<label for="jenis_kelamin" class="font-bold">Jenis Kelamin:</label>
						<?php $jk = $siswa['jenis_kelamin']; ?>
						<div class="mt-2">
							<label class="mr-2">
								<input type="radio" name="jenis_kelamin" value="laki-laki" <?php echo ($jk == 'laki-laki') ? "checked" : "" ?> class="mr-1"> Laki-laki
							</label>
							<label>
								<input type="radio" name="jenis_kelamin" value="perempuan" <?php echo ($jk == 'perempuan') ? "checked" : "" ?> class="mr-1"> Perempuan
							</label>
						</div>
					</div>
					<div class="mb-4">
						<label for="agama" class="font-bold">Agama:</label>
						<?php $agama = $siswa['agama']; ?>
						<select name="agama" class="border border-gray-300 p-2 rounded-md mt-2">
							<option <?php echo ($agama == 'Islam') ? "selected" : "" ?>>Islam</option>
							<option <?php echo ($agama == 'Kristen') ? "selected" : "" ?>>Kristen</option>
							<option <?php echo ($agama == 'Hindu') ? "selected" : "" ?>>Hindu</option>
							<option <?php echo ($agama == 'Budha') ? "selected" : "" ?>>Budha</option>
							<option <?php echo ($agama == 'Atheis') ? "selected" : "" ?>>Atheis</option>
						</select>
					</div>
					<div class="mb-4">
						<label for="sekolah_asal" class="font-bold">Sekolah Asal:</label>
						<input type="text" name="sekolah_asal" placeholder="Nama sekolah" value="<?php echo $siswa['sekolah_asal'] ?>" class="border border-gray-300 p-2 rounded-md w-full" />
					</div>
					<div class="mb-4">
            						<div class="mb-4 flex justify-center">
            	<input type="submit" value="Simpan" name="simpan" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" />
            </div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			document.querySelector(".container").classList.add("animate__fadeInUp");
		});
	</script>
</body>
</html>