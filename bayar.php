<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
  <title>Bayar Sekarang</title>
</head>

<body class="bg-gray-100">
  <div class="flex items-center justify-center h-screen">
    <div class="p-6 bg-white rounded-md shadow-2xl relative">
      <h1 class="text-2xl font-bold mb-6">Formulir Pembayaran</h1>

      <form action="proses.php" method="POST">
        <div class="mb-4">
          <label for="nama" class="block font-medium text-gray-700">Nama</label>
          <input type="text" id="nama" name="nama" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>

        <div class="mb-4">
          <label for="username" class="block font-medium text-gray-700">Username</label>
          <input type="text" id="username" name="username" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>

        <div class="mt-6">
          <button type="submit" class="py-2 px-4 bg-yellow-400 text-white rounded-md hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:ring-opacity-50">Bayar Sekarang</button>
        </div>
      </form>
    </div>

    <div class="absolute top-0 right-50 ml-8 mt-8">
      <img src="img/mood.png" alt="Gambar" class="w-124 h-auto">
    </div>
  </div>
</body>

</html>
