<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>MOOD! - Materi</title>
   <style>
       .bg-color {
           background-color: #C4DFDF;

    
       }

       .social-icons i {
           font-size: 24px;
           margin-right: 10px;
       }
   </style>
   <link href="https://fonts.googleapis.com/css2?family=Potta+One&display=swap" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

        <nav class="navbar navbar-expand-lg navbar-light bg-color">
            <a class="navbar-brand" href="#" style= "color: #FF7F50; font-style: oblique; font-family: 'Potta One', cursive;">MOOD!</a>
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

    <h2 style="text-align: center; color: #FF7F50; font-style: oblique; font-family: 'Potta One', cursive; font-size: 2rem;"><center>Materi</center></h2>

    <div class="content">
        
            <h3 style="text-align:center; color: #FF7F50; font-style: oblique; font-family: 'Potta One', cursive;">Pembagian</h3>
 
    <div class="box-area">
        <h5 style="color: #FF7F50; font-style: oblique; font-family: 'Potta One', cursive;">A. Pembagian sebagai pengurangan berulang</h5>
        </div>
         <div class="box-area2">
        <p style="font-size: 1rem;">Pembagian dapat dilakukan dengan cara pengurangan berulang, sampai sisanya 0. <br>
        Misalnya: <br>
1. 102 : 17, pengulangn berulangnya 120 – 17 – 17 – 17 – 17 – 17 –17 = 0 <br>
Ada 6 kali pengurangan berulang dengan 17. Jadi, 102 : 17 = 6 <br>
2. 105 : 21, pengulangan berulangnya 105 – 21 – 21 – 21 – 21 – 21 = 0 <br>
Ada 5 kali pengurangan berulang dengan 21. Jadi, 100 : 21= 5
        </p>
        
    </div>

    <div class="box-area3">
        <h5 style="color: #FF7F50; font-style: oblique; font-family: 'Potta One', cursive;">B. Hubungan Perkalian dan Pembagian</h5>
        </div>
        
     <div class="box-area4">
         
        <p style="font-size: 1rem;"> <br>
 5 x 3 = 15 <br>
     15 : 5 = 3 <br>
       15 : 3 = 5 <br> </p>
       
       </div>
       
        <div class="box-area5">
            <p style="font-size: 1rem;">
            54 x 7 = 378 <br>
       378 : 7 = 54 <br>
      378 : 54 = 7 <br>
            </p>
       </div>
        <div class="box-area6">
            <h3 style="color: #FF7F50; font-style: oblique; font-family: 'Potta One', cursive;">Menyelesaikan pembagian</h3>  
            </div>
             <div class="box-area7"> 
1. Menyelesaikan pembagian dengan susun panjang <br>
<img src="img/bagi11.png" alt="Pembagian"> <br>
Langkah-langkah <br>
  •100 : 5 = 20 <br>
 •20 x 5 = 100<br>
 •125 – 100 = 25; 25 : 5 = 5 <br>
 •5 x 5 = 25 <br>
 •25 – 25 = 0<br>
 2. Menyelesaikan pembagian dengan susun pendek <br>
<img src="img/bagi22.png" alt="Pembagian"> <br>
Langkah-langkah :<br>
 • Ratusannya 4, (4 : 4) = 1, tulis di atas <br>
 • 1 x 4 = 4, tulis di bawah angka 4 (ratusan) dan kurangkan <br>
• Turunkan angka 8, (8 : 4) = 2 tulis di atas <br>
 • 2 x 4 = 8, tulis di bawah angka 8 (puluhan) dan kurangkan <br>
 • Turunkan angka 8, (8 : 4) = 2 tulis diatas <br>
 • 2 x 4 = 8, tulis di bawah angka 8 (satuan) dan kurangkan <br>
 • 8 – 8 = 0, pembagian selesai. <br>
• Jadi, 488 : 4 = 122 <br>
    </div>

    

    <div class="button-container">
        <a style="background-color:#FF7F50;font-style: oblique; font-family: 'Potta One', cursive;" class="button" href="materi.php">Kembali</a>
        </div>
       
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