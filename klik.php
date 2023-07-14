<!DOCTYPE html>
<html>
<head>
	<title>Formulir Pendaftaraan | MOOD</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Potta+One&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
	<style>
		@keyframes gradientAnimation {
			0% {
				background-position: 0% 50%;
			}
			100% {
				background-position: 100% 50%;
			}
		}

		.bg-gradient-animation {
			animation: gradientAnimation 10s ease infinite;
			background: linear-gradient(to right, #C4DFDF, #87CEEB);
			background-size: 200% auto;
		}

		/* Remaining styles */

		.popup {
			animation: fadeIn 0.3s ease forwards;
		}

		@keyframes checkmark {
			0% {
				stroke-dashoffset: 30px;
			}
			100% {
				stroke-dashoffset: 0;
			}
		}

		.checkmark {
			stroke-dasharray: 30px;
			stroke-dashoffset: 30px;
			stroke-width: 4px;
			stroke: #4CAF50;
			fill: none;
			animation: checkmark 0.3s ease-in-out forwards;
		}
	</style>
	<script>
		function toggleForm() {
			var formContainer = document.getElementById("form-container");
			var pendaftaranContainer = document.getElementById("pendaftaran-container");
			var toggleButton = document.getElementById("toggle-button");
			var toggleIndicator = document.getElementById("toggle-indicator");

			if (formContainer.style.display === "none") {
				formContainer.style.display = "block";
				pendaftaranContainer.style.display = "none";

				toggleIndicator.style.transform = "translateX(0)";
			} else {
				formContainer.style.display = "none";
				pendaftaranContainer.style.display = "block";

				toggleIndicator.style.transform = "translateX(100%)";
			}
		}

		document.addEventListener("DOMContentLoaded", function(event) {
			<?php if(isset($_GET['status']) && $_GET['status'] == 'sukses'): ?>
				var countdownElement = document.getElementById("countdown");
				var count = 10;
				var redirect = setInterval(function() {
					count--;
					countdownElement.textContent = count;
					if (count <= 0) {
						clearInterval(redirect);
						window.location.href = "index.php";
					}
				}, 1000);
			<?php endif; ?>
		});
	</script>
</head>
<body class="bg-gradient-animation flex justify-center items-center h-screen">
	<div class="absolute top-0 left-0 right-0 bg-#C4DFDF p-4">
		<h4 class="text-2xl font-bold mt-20 text-center shadow-white" style="font-style: oblique; font-family: 'Potta One', cursive;">Halaman Pendaftaran MOOD!</h4>
	</div>
	<div class="flex justify-center items-center h-screen">
		<div class="bg-white rounded-lg shadow-lg p-8 transform hover:scale-105 transition duration-300 w-96">
			<button id="toggle-button" class="relative bg-gradient-to-r from-blue-700 to-blue-500 text-white font-bold py-2 px-4 rounded-full text-center hover:shadow-xl transition duration-300" onclick="toggleForm()">
				<span id="toggle-indicator" class="absolute left-0 top-0 bg-white w-4 h-4 rounded-full shadow-md transition-transform duration-300 ease-in-out transform translate-x-0"></span>
			</button>
			<div id="form-container">
				<h2 class="text-3xl font-bold mb-4 text-center" style="color: #FF7F50; font-style: oblique; font-family: 'Potta One', cursive;">Formulir</h2>
				<p class="text-xl mb-4 text-center">Semua akses yang disediakan oleh MOOD adalah gratis, isi formulir terlebih dahulu!</p>
				<a href="form-daftar.php" class="block bg-gradient-to-r from-blue-700 to-blue-500 text-white font-bold py-2 px-4 rounded-full text-center hover:shadow-xl transition duration-300">Isi Sekarang</a>
			</div>
			<div id="pendaftaran-container" style="display: none;">
				<h2 class="text-3xl font-bold mb-4 text-center" style="color: #FF7F50; font-style: oblique; font-family: 'Potta One', cursive;">Pendaftaran</h2>
				<p class="text-xl mb-4 text-center">akses hanya dimiliki admin, untuk info lebih lanjut hubungi admin di halaman utama</p>
				<a href="login2.php" class="block bg-gradient-to-r from-blue-500 to-blue-700 text-white font-bold py-2 px-4 rounded-full text-center hover:shadow-xl transition duration-300">Lihat Pendaftar</a>
			</div>
		</div>
	</div>
	<?php if(isset($_GET['status']) && $_GET['status'] == 'sukses'): ?>
		<div class="bg-white border-t-4 border-blue-500 rounded-b text-blue-900 px-4 py-3 shadow-md absolute bottom-0 left-0 right-0 transform translate-x-1/2 -translate-y-1/2 animate__animated animate__fadeIn">
			<p class="flex items-center">
				<svg class="checkmark w-6 h-6 mr-2 animate__animated animate__checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
					<circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
					<path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
				</svg>
				Pengisian Formulir MOOD berhasil! Anda akan dialihkan ke halaman utama dalam <span id="countdown"> 10 </span> detik.
			</p>
		</div>
	<?php endif; ?>
</body>
</html>
