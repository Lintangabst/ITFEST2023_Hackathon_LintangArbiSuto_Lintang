<?php include("configklik.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tabel Pengguna</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
	<style>
		@keyframes fadeInUp {
			from {
				opacity: 0;
				transform: translateY(20px);
			}
			to {
				opacity: 1;
				transform: translateY(0);
			}
		}
	</style>
</head>
<body class="bg-gray-100">
	<header class="bg-indigo-700 text-white py-4">
		<h3 class="text-xl text-center">Daftar Pengisi Formulir</h3>
	</header>
	<div class="container mx-auto py-8">
		<a href="form-daftar.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block mb-4">[+] Tambah Baru</a>
		<table class="border-collapse border w-full">
			<thead>
				<tr>
					<th class="border bg-indigo-100 px-4 py-2">Nama</th>
					<th class="border bg-indigo-100 px-4 py-2">Alamat</th>
					<th class="border bg-indigo-100 px-4 py-2">Jenis Kelamin</th>
					<th class="border bg-indigo-100 px-4 py-2">Agama</th>
					<th class="border bg-indigo-100 px-4 py-2">Sekolah Asal</th>
					<th class="border bg-indigo-100 px-4 py-2">Tindakan</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql = "SELECT * FROM calon_siswa";
				$query = mysqli_query($db, $sql);
				$i = 1;
				while($siswa = mysqli_fetch_array($query)){
					echo "<tr class='animate__animated animate__fadeInUp'>";
					echo "<td class='border px-4 py-2'>".$siswa['nama']."</td>";
					echo "<td class='border px-4 py-2'>".$siswa['alamat']."</td>";
					echo "<td class='border px-4 py-2'>".$siswa['jenis_kelamin']."</td>";
					echo "<td class='border px-4 py-2'>".$siswa['agama']."</td>";
					echo "<td class='border px-4 py-2'>".$siswa['sekolah_asal']."</td>";
					echo "<td class='border px-4 py-2'>";
					echo "<a href='form-edit.php?id=".$siswa['id']."' class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded'>Edit</a>";
					echo "<a href='hapus.php?id=".$siswa['id']."' class='bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded ml-2'>Hapus</a>";
					echo "</td>";
					echo "</tr>";
					$i++;
				}
				?>
			</tbody>
		</table>
		<p class="mt-4">Total: <?php echo mysqli_num_rows($query) ?></p>
		<p class="text-center mt-8">
			<a href="klik.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">Kembali</a>
		</p>
	</div>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			const rows = document.querySelectorAll("tr.animate__fadeInUp");
			rows.forEach(function(row, index) {
				row.style.animationDelay = (index * 0.1) + "s";
			});
		});
	</script>
</body>
</html>
