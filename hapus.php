<?php
include("configklik.php");
if (isset($_GET['id'])) {
	// ambil id dari query string
	$id = $_GET['id'];
	// buat query hapus
	$sql = "SELECT * FROM calon_siswa WHERE id=$id";
	$query = mysqli_query($db, $sql);
	$siswa = mysqli_fetch_assoc($query);
	if ($siswa) {
		// tampilkan peringatan konfirmasi sebelum menghapus
		echo "<script>
			var result = confirm('Apa Anda yakin akan menghapus data ini?');
			if (result) {
				window.location.href = 'proses-hapus.php?id=" . $id . "';
			} else {
				window.location.href = 'list-siswa.php';
			}
		</script>";
	} else {
		die("Data tidak ditemukan...");
	}
} else {
	die("Akses dilarang...");
}
?>
