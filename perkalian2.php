<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>MOOD! - Latihan</title>
   <style>
    .bg-color {
      background-color: #C4DFDF;
    }

    .social-icons i {
      font-size: 24px;
      margin-right: 10px;
    }

    .list-group-item {
      display: flex;
      align-items: center;
    }

     .gambar-icon {
      width: 150px;
      height: 150px;
      display: block;
      margin-right: auto;
      margin-bottom: 10px;
    }

    .list-group-item img {
      margin-right: 10px;
    }
    
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
     <script>
       $(function () {
         $('[data-toggle="popover"]').popover();
       });
     </script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   <link href="https://fonts.googleapis.com/css2?family=Potta+One&display=swap" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

        <nav class="navbar navbar-expand-lg navbar-light bg-color">
            <a class="navbar-brand" href="#" style= "color: #FF7F50; font-style: oblique; font-family: 'Potta One', cursive;">MOOD</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link mt-1" href="index.php">Beranda</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mt-1" href="#" id="videoDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Video
                </a>
                <div class="dropdown-menu" aria-labelledby="videoDropdown">
                    <a class="dropdown-item" href="video.php">Penjumlahan dan Pengurangan</a>
                    <a class="dropdown-item" href="video2.php">Perkalian dan Pembagian</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link mt-1" href="materi.php">Materi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mt-1" href="latihan.php">Latihan</a>
            </li>
            <li class="nav-item">
                <?php
                // Check the user's premium status based on the username
                $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
            
                // Perform a query to check the user's status
                $query = "SELECT status FROM calon_siswa WHERE user = '$username'";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
            
                if ($row && $row['status'] === 'premium') {
                    // The user has premium status, display the active navigation item
                    echo '<a class="nav-link mt-1" href="evaluasi.php"><i class="fas fa-crown" style="color: gold;"></i> Evaluasi</a>';
                } else {
                    // The user does not have premium status, display the disabled navigation item
                    echo '<a class="nav-link mt-1 disabled" href="#"><i class="fas fa-crown" style="color: gold;"></i> Evaluasi</a>';
                }
                ?>
            </li>
                <li class="nav-item">
                    <a class="nav-link mt-1" href="#" onclick="showPopup();"><span class="fas fa-question-circle"></span></a>
                </li>
        </ul>
            </div>
        </nav>
    </header>         
       
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <!-- Sidebar -->
      <div class="list-group">
        <a href="pertambahan.php" class="list-group-item list-group-item-action text-center">
          <div class="d-flex flex-column align-items-center">
            <img src="img/pertambahan1.jpg" alt="Gambar Pertambahan" class="gambar-icon">
            <span class="mt-2">Penjumlahan</span>
          </div>
        </a>
        <a href="pengurangan.php" class="list-group-item list-group-item-action text-center">
          <div class="d-flex flex-column align-items-center">
            <img src="img/pengurangan1.jpg" alt="Gambar Pengurangan" class="gambar-icon">
            <span class="mt-2">Pengurangan</span>
          </div>
        </a>
        <a href="perkalian.php" class="list-group-item list-group-item-action text-center">
          <div class="d-flex flex-column align-items-center">
            <img src="img/perkalian1.jpg" alt="Gambar Perkalian" class="gambar-icon">
            <span class="mt-2">Perkalian</span>
          </div>
        </a>
        <a href="pembagian.php" class="list-group-item list-group-item-action text-center">
          <div class="d-flex flex-column align-items-center">
            <img src="img/pembagian1.jpg" alt="Gambar Pembagian" class="gambar-icon">
            <span class="mt-2">Pembagian</span>
          </div>
        </a>
      </div>
    </div>
  
        <div class="col-md-9 my-5">
          <!-- Content -->
          <h2 style="color: #FF7F50; font-style: oblique; font-family: 'Potta One', cursive;">Latihan Perkalian</h2>
          <p>Soal: 9 x 3 = .... <span class="question-mark-icon" data-bs-toggle="popover" data-bs-content="Dalam operasi perkalian hasilnya adalah 27."><i class="fas fa-question-circle"></i></span></p>
          
          <!-- Tambahkan textbox dan tombol submit -->
          <div class="mt-4">
            <label for="answer">Jawaban:</label>
            <input type="text" id="answer" name="answer" class="form-control">
            <button class="btn btn-primary mt-2" style=" font-style: oblique; font-family: 'Potta One', cursive;" onclick="checkAnswer()">Submit</button>
          </div>
        </div>
      </div>
    </div>
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.4.0/js/bootstrap.min.js"></script>
      <script>
        $(function () {
          $('[data-bs-toggle="popover"]').popover();
        });
      
        function showPopup(event) {
          event.preventDefault();
          $('.question-mark-icon').popover('show');
        }
      </script>
      
      <!-- Popper.js -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
      
      <!-- Bootstrap JavaScript -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>
      
      <!-- Font Awesome JavaScript -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
      
      <!-- Popover initialization -->
      <script>
        $(function () {
          $('[data-bs-toggle="popover"]').popover();
        });
      </script>
      
      <!--Script Submit-->

      <script>
        function checkAnswer() {
          var answer = document.getElementById('answer').value;
          if (answer == 27) {
            alert("Kamu Benar!!, Silahkan Lanjut ke soal berikutnya");
            window.location.href = "perkalian3.php"; // Pengalihan halaman jika jawaban benar
          } else {
            alert("Kurang Tepat, Silahkan coba lagi");
          }
        }
      </script>

      <!-- Modal -->
      <div id="infoModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Informasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 id="popupHeading">Hallo!!</h5>
                    <p id="popupText">Ini adalah popup informasi.</p>
                </div>
                <div class="modal-footer">
                    <button id="prevBtn" type="button" class="btn btn-secondary" disabled>Prev</button>
                    <button id="nextBtn" type="button" class="btn btn-primary">Next</button>
                    <button id="doneBtn" type="button" class="btn btn-primary" style="display: none;">Done</button>
                </div>
            </div>
        </div>
    </div>


    <section class="footer">
        <div class="social">
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fas fa-envelope"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-tiktok"></i></a>
        </div>
        <ul class="list">
          <li>
            <a href="#">Beranda</a>
          </li>
          <li>
            <a href="#">Materi</a>
          </li>
          <li>
            <a href="#">Latihan</a>
          </li>
          <li>
            <a href="#">Evaluasi</a>
          </li>
          <li>
            <a href="#">Video</a>
          </li>
        </ul>
        <p style="font-style: oblique; font-family: 'Potta One', cursive; color: #FF7F50;" class="copyright">MOOD @ 2023</p>
      </section>
      
      
     

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="path/to/fontawesome/js/all.min.js"></script>
    <script>
        function showPopup() {
            $('#infoModal').modal('show');
        }
    
        var popupIndex = 1;
        var totalPopups = 6;
    
        $('#nextBtn').click(function() {
            popupIndex++;
            updatePopupContent();
        });
    
        $('#prevBtn').click(function() {
            popupIndex--;
            updatePopupContent();
        });
    
        function updatePopupContent() {
        var popupText = '';
        var headingText = '';

        switch (popupIndex) {
            case 1:
                headingText = 'Hallo!!';
                popupText = 'Ini adalah popup informasi.';
                break;
            case 2:
                headingText = 'Tujuan Pembelajaran';
                popupText = '1. Siswa dapat mengingat perkalian sampai 100<br><br>' +
                    '2. Siswa dapat mengalikan bilangan satu angka dengan bilangan dua angka<br><br>' +
                    '3. Siswa dapat mengalikan dua bilangan dengan dua angka<br><br>' +
                    '4. Siswa dapat menyelesaikan soal cerita<br><br>' +
                    '5. Siswa dapat membagi bilangan tiga angka dengan bilangan satu angka<br><br>' +
                    '6. Siswa dapat membagi bilangan tiga angka dengan bilangan dua angka<br><br>' +
                    '7. Siswa dapat mengerti tentang hubungan antara perkalian dan pembagian';
                break;
                case 3:
                    headingText = 'Kompetisi Dasar';
                    popupText = 'K.D 1.1 menentukan letak bilangan pada garis bilangan<br><br>' +
                    'K.D 1.2 melakukan penjumlahan dan pengurangan bilangan tiga angka<br><br>' +
                    'K.D 1.3 melakukan perkalian yang hasilnya bilangan tiga angka dan pembagian bilangan tiga angka<br><br>' +
                    'K.D1.4 melakukan pengerjaan hitung campuran<br><br>' +
                    'K.D 1.5 memecahkan masalah perhitungan termasuk yang berkaitan dengan uang' ;
                    break;
                case 4:
                    headingText = 'Kompetisi Inti';
                    popupText = '1. Melakukan penjumlahan dan pengurangan bilangan tiga angka<br><br>' +
                    '2. Melakukan perkalian yang hasilnya bilangan tiga angka dan pembagian bilangan tiga angka<br><br>' +
                    '3. Melakukan pengerjaan hitung campuran<br><br>' +
                    '4. Memecahkan masalah perhitungan termasuk yang berkaitan dengan uang';
                    break;
                case 5:
                    headingText = 'Peta Konsep';
                   popupText = '<img src="img/image3.png" alt="Peta Konsep" style="max-width: 100%;">';
                break;

                    break;
                    case 6:
                    headingText = 'Profil';
                    popupText = 'Nama: Lintang Arbi Suto<br>' +
                        'Alamat: Ciledug, Tangerang Kota<br>' +
                        'Prodi: Teknik Informatika<br>' +
                        'Asal Kampus: Universitas Paramadina<br>' +
                        'Email: lintangas21@gmail.com<br><br>';
                    popupText += '<img src="img/owner.JPG" alt="Foto Profil" style="max-width: 220px; float: center; margin-left: 130px;">';
                    break;

                default:
                    break;
            }
    
            $('#popupHeading').text(headingText);
            $('#popupText').html(popupText.replace(/\n/g, '<br>'));
    
            if (popupIndex === 1) {
                $('#prevBtn').attr('disabled', true);
            } else {
                $('#prevBtn').attr('disabled', false);
            }
    
            if (popupIndex === totalPopups) {
                $('#nextBtn').hide();
                $('#doneBtn').show();
            } else {
                $('#nextBtn').show();
                $('#doneBtn').hide();
            }
        }
    
        $('#doneBtn').click(function() {
            $('#infoModal').modal('hide');
        });
    </script>
</body>
</html>
