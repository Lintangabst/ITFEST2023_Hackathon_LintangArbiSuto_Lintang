<?php
session_start();
include_once("config.php");


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>MOOD! - Pembelajaran Online</title>
   <style>
   
      .icon {
           font-size: 24px;
           margin-bottom: 10px;
       }
   
       .bg-color {
           background-color: #C4DFDF;
       }

       .social-icons i {
           font-size: 24px;
           margin-right: 10px;
       }
       
       .hover-effect:hover {
           box-shadow: 0 0 50px rgba(252, 186, 211, 0.8);
       }
       
       .gradient-box {
           background: linear-gradient(to right, #FF7F50, #C4DFDF);
           padding: 20px;
           color: #fff;
           border-radius: 25px;
        }
        .custom-hr {
           border: none;
           height: 3px;
           margin: 20px 0;
        }
        
         .fitur {
    display: flex;
  }

  .box {
    flex: 1;
    padding: 20px;
    margin: 10px;
    border-radius: 5px;
    color: #fff;
    font-weight: bold;
    text-align: center;background-image: linear-gradient(45deg, #FF7F50, #AA96DA);
    cursor: pointer;
    transition: transform 0.3s ease-in-out;
  }

  .box:hover {
    transform: scale(1.1);
  }

  .box-1 {
    background-image: linear-gradient(45deg, #FF7F50, #AA96DA);
  }

  .box-2 {
    background-image: linear-gradient(45deg, #AA96DA, #C4DFDF);
  }

  .box-3 {
    background-image: linear-gradient(45deg, #C4DFDF, #FFC0CB);
  }

  .box-4 {
    background-image: linear-gradient(45deg, #FFC0CB, #AA96DA);
  }
        
.faq-container {
    max-width: 1480px;
    margin: 0 auto;
    padding: 50px 0;
    background-image: linear-gradient(135deg, #C4DFDF, #AA96DA);
    color: #fff;
  }

  .faq-item {
    margin-bottom: 20px;
    width: 80%;
    text-align: center;
    margin:0 auto;
  }

  .faq-question {
    cursor: pointer;
    font-weight: bold;
    margin-bottom: 20px;
    padding: 20px;
    border-radius: 25px;
    background-color: #fff;
    color: #000;
  }

  .faq-answer {
    display: none;
    margin-bottom: 20px;
    padding: 20px;
    border-radius: 5px;
    background-color: #fff;
    color: #000;
    border-radius: 25px;
  }

  .faq-answer.show {
    display: block;
  }

@media (max-width: 768px) {
  .fitur {
    flex-wrap: wrap;
  }

  .box {
    flex: 0 0 100%;
    margin: 10px 0;
  }
}
   </style>
   <link href="https://fonts.googleapis.com/css2?family=Potta+One&display=swap" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-color">
    <a class="navbar-brand" href="#" style="color: #FF7F50; font-style: oblique; font-family: 'Potta One', cursive;">MOOD</a>
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



            <?php if (isset($_SESSION['nama'])) { ?>
                <li class="nav-item">
                    <a class="nav-link mt-1" href="#" onclick="showPopup();"><span class="fas fa-question-circle"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="showLogoutConfirmation();">
                        <button class="btn btn-primary"><?php echo $_SESSION['nama']; ?></button>
                    </a>

                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="showPopup();"><span class="fas fa-question-circle"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">
                        <button class="btn btn-info">Login</button>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>



    
        <div class="background-video" style="margin-bottom: 50px">
          <video autoplay loop muted>
            <source src="img/video.mp4" type="video/mp4">
            Your browser does not support the video tag.
          </video>
          <div class="video-content" style="margin-top: 400px">
            <h1 style="color: #FF7F50; font-style: oblique; font-family: 'Potta One', cursive; color: #FF7F50; text-shadow: 2px 2px 4px rgba(255, 255, 255, 0.5);" class="text-center">MOOD! | Website Pembelajaran</h1>
            <button style="color: #ffffff;" class="btn btn-primary btn-lg btn-center hover-effect" id="dropdownButton">Mulai Pembelajaran</button>
            <div class="dropdown-content" id="dropdownContent">
              <a href="video.php">Video Pembelajaran</a>
              <a href="latihan.php">Latihan Soal</a>
              <a href="evaluasi.php">Mengerjakan Evaluasi</a>
            </div>
          </div>
        </div>

        
        
       
    <div class="container-fluid">
        <div class="container">
                    <h2 style="font-family: 'Potta One', cursive; color: #FF7F50; font-size: 1.5rem;">
                        Selamat datang <span style="color: #AA96DA;"><?php echo $_SESSION["nama"]; ?>!</span>
                    </h2>
                    
<?php
session_start();
include_once("config.php");

// Memeriksa status akun pengguna
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $username = $_SESSION['username'];

    // Melakukan query untuk memeriksa status akun
    $query = "SELECT status FROM calon_siswa WHERE user = '$username'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $status = $row['status'];

            // Menentukan warna teks berdasarkan nilai status
        $statusColor = ($status === 'premium') ? 'gold' : '#AA96DA';

        // Menampilkan status akun dengan warna yang sesuai
        echo '<p style="font-style: oblique; font-family: \'Potta One\', cursive; font-size: 1.5rem; color: #FF7F50;">Status Akun Kamu Di MOOD Adalah <span style="color:  ' . $statusColor . ';">' . $status . '</span></p>';
    } else {
            echo '<p style="font-style: oblique; font-family: \'Potta One\', cursive; color: #FF7F50; font-size: 2rem;">Status Akun Kamu Di MOOD Tidak Diketahui</p>';
    }
} else {
    // Pengguna belum masuk ke dalam akun, arahkan kembali ke halaman index.php
    echo "<script>window.location.href = 'login.php';</script>";
    exit();
}

mysqli_close($conn);
?>


                    <p id="appText" style="font-style: oblique; font-family: 'Potta One', cursive; color: #C4DFDF; font-size: 2rem;"></p>
        </div>
    </div>
    
    <div class="container" style="padding: 70px 0;">
        <div class="fitur">
          <div class="box box-1" onclick="window.location.href='video.php'">
            <i class="fas fa-video icon"></i>
            <h2 style="font-family: 'Potta One', cursive; font-size: 1.5rem;">Video</h2>
            <p style="font-size: 1rem;"><br><br>Video Pembelajaran Matematika yang berisikan Operasi Bilangan.</p>
          </div> 
          <div class="box box-2" onclick="window.location.href='materi.php'">
            <i class="fas fa-book icon"></i>
            <h2 style="font-family: 'Potta One', cursive; font-size: 1.5rem;">Materi</h2>
            <p style="font-size: 1rem;"><br><br>Kalian dapat memilih apa yang kalian ingin pelajari tentang operasi bilangan.</p>
          </div>
          <div class="box box-3" onclick="window.location.href='latihan.php'">
            <i class="fas fa-pencil-alt icon"></i>
            <h2 style="font-family: 'Potta One', cursive; font-size: 1.5rem;">Latihan</h2>
            <p style="font-size: 1rem;"><br><br>Terdapat sebuah latihan soal yang berisikan tentang operasi bilangan.</p>
                      </div>
            <div class="box box-4" onclick="<?php echo ($status == 'premium') ? "window.location.href='evaluasi.php'" : "window.location.href='eval.php'"; ?>">
                <i class="fas fa-tasks icon"></i>
                <h2 style="font-family: 'Potta One', cursive; font-size: 1.5rem;"><i class="fas fa-crown" style="color: gold;"></i> Evaluasi</h2>
                <p style="font-size: 1rem;"><br><br>Berisikan soal gabungan dari pembelajaran operasi bilangan.</p>
            </div>
        </div>
    </div>
    
<hr class="custom-hr">
<svg class="custom-hr" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1">
  <path stroke="#FF7F50" stroke-dasharray="10,10" d="M0,0 l1000,0"></path>
</svg>
<hr class="custom-hr">
    
<div style="padding: 70px 0;">
<section id="faq"  class="faq-container">
    <h2 style="font-family: 'Potta One', cursive; color: #FF7F50; font-size: 2rem; text-align: center;padding: 30px 0;">Ada apa saja di MOOD ?</h2>
  <div class="faq-item">
    <h3 style="font-size: 1.5rem;" class="faq-question" onclick="toggleFAQ('faq1')">Apa itu website pembelajaran operasi bilangan untuk sekolah dasar?          
          <div>
            <i class="fas fa-chevron-down dropdown-icon"></i>
          </div>
    </h3>
    <div class="faq-answer" id="faq1">
      <p style="font-size: 1rem;">Website pembelajaran operasi bilangan untuk sekolah dasar adalah platform online yang dirancang khusus untuk membantu siswa sekolah dasar memahami dan mempelajari operasi bilangan seperti penjumlahan, pengurangan, perkalian, dan pembagian. </p>
    </div>
  </div>
  <div class="faq-item">
    <h3 style="font-size: 1.5rem;" class="faq-question" onclick="toggleFAQ('faq2')">Bagaimana cara mengakses website ini?
          <div>
            <i class="fas fa-chevron-down dropdown-icon"></i>
          </div>
    </h3>
    <div class="faq-answer" id="faq2">
      <p style="font-size: 1rem;">Anda dapat mengakses website ini dengan menggunakan peramban web di perangkat apa pun, seperti komputer, tablet, atau smartphone. Cukup ketikkan URL website tersebut di bilah alamat peramban web Anda dan tekan Enter.</p>
    </div>
  </div>
  <div class="faq-item">
    <h3 style="font-size: 1.5rem;" class="faq-question" onclick="toggleFAQ('faq3')">Apakah semua konten di website ini gratis?
          <div>
            <i class="fas fa-chevron-down dropdown-icon"></i>
          </div>
</h3>
    <div class="faq-answer" id="faq3">
      <p style="font-size: 1rem;">Ya, sebagian besar konten di website ini dapat diakses secara gratis. Namun, ada juga konten premium yang disebut "Evaluasi" yang menawarkan materi tambahan dan latihan evaluasi berkualitas tinggi.</p>
    </div>
  </div>
    <div class="faq-item">
    <h3 style="font-size: 1.5rem;" class="faq-question" onclick="toggleFAQ('faq4')">Apa itu konten premium "Evaluasi"?
          <div>
            <i class="fas fa-chevron-down dropdown-icon"></i>
          </div>
    </h3>
    <div class="faq-answer" id="faq4">
      <p style="font-size: 1rem;">Konten premium "Evaluasi" adalah bagian dari website yang menyediakan latihan dan evaluasi yang lebih mendalam. Ini mencakup latihan soal yang dirancang untuk menguji pemahaman siswa tentang operasi bilangan.</p>
    </div>
  </div>
    <div class="faq-item">
    <h3 style="font-size: 1.5rem;" class="faq-question" onclick="toggleFAQ('faq5')">Bagaimana cara mendapatkan akses ke konten premium?
          <div>
            <i class="fas fa-chevron-down dropdown-icon"></i>
          </div>
    </h3>
    <div class="faq-answer" id="faq5">
      <p style="font-size: 1rem;">Untuk mendapatkan akses ke konten premium "Evaluasi", Anda perlu mendaftar sebagai anggota premium di website kami. Untuk berlangganan Premium kalian bisa klik box yang bertulisakn Premium</p>
    </div>
  </div>
    <div class="faq-item">
    <h3 style="font-size: 1.5rem;" class="faq-question" onclick="toggleFAQ('faq6')">Apakah konten premium memberikan manfaat tambahan dibandingkan  konten gratis?
          <div>
            <i class="fas fa-chevron-down dropdown-icon"></i>
          </div>
    </h3>
    <div class="faq-answer" id="faq6">
      <p style="font-size: 1rem;">Ya, konten premium "Evaluasi" memberikan manfaat tambahan dengan menyediakan latihan evaluasi yang lebih mendalam dan membantu siswa menguji pemahaman mereka secara lebih komprehensif. Ini dapat membantu siswa memperkuat keterampilan mereka dalam operasi bilangan.</p>
    </div>
  </div>
    <div class="faq-item">
    <h3 style="font-size: 1.5rem;" class="faq-question" onclick="toggleFAQ('faq7')">Apakah ada batasan usia atau tingkat kelas untuk menggunakan website ini?
          <div>
            <i class="fas fa-chevron-down dropdown-icon"></i>
          </div>
</h3>
    <div class="faq-answer" id="faq7">
      <p style="font-size: 1rem;">Website ini dirancang khusus untuk siswa sekolah dasar, jadi itu sesuai untuk siswa di kisaran usia 6-8 tahun atau untuk siswa kelas 1-3 sekolah dasar.</p>
    </div>
  </div>
</section>
</div>
<hr class="custom-hr">
<svg class="custom-hr" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1">
  <path stroke="#FF7F50" stroke-dasharray="10,10" d="M0,0 l1000,0"></path>
</svg>
<hr class="custom-hr">

<section id="chat" style="padding: 100px 0;">
  <div class="container">
    <div class="gradient-box row align-items-center">
      <div class="col-md-6">
        <div class="gradient-box">
          <p style="font-size: 1rem;">Ada Pertanyaan Seputar MOOD ?</p>
          <p style="font-family: 'Potta One', cursive; font-size: 1.5rem;">Tanyakan via Chat ke Konsultan MOOD sekarang juga!</p>
          <a href="https://api.whatsapp.com/send?phone=6281317157363" class="btn btn-primary hover-effect" style="background-color: #AA96DA; font-style: oblique; font-family: 'Potta One', cursive;">Chat Sekarang</a>
        </div>
      </div>
      <div class="col-md-6 text-right hide-mobile">
        <img src="img/pesan.png" alt="Chat Icon" width="300">
      </div>
    </div>
  </div>
</section>

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

    <section class="footer" style="padding: 20px 0;">
        <div class="social">
          <a href="https://instagram.com/sylviangelinaa?igshid=MzRlODBiNWFlZA==" target="_blank"><i class="fab fa-instagram"></i></a>
          <a href="https://www.tiktok.com/@sylviangelina?_t=8czXNqzDjfu&_r=1" target="_blank"><i class="fab fa-tiktok"></i></a>
          <a href="#"><i class="fas fa-envelope"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
        <ul class="list">
          <li>
            <a href="index.php">Beranda</a>
          </li>
          <li>
            <a href="materi.php">Materi</a>
          </li>
          <li>
            <a href="latihan.php">Latihan</a>
          </li>
          <li>
            <a href="evaluasi.php">Evaluasi</a>
          </li>
          <li>
            <a href="video.php">Video</a>
          </li>
        </ul>
        <p style="font-style: oblique; font-family: 'Potta One', cursive; color: #FF7F50;" class="copyright">MOOD @ 2023</p>
      </section>
      
      
     
    <script>
    var dropdownButton = document.getElementById("dropdownButton");
    var dropdownContent = document.getElementById("dropdownContent");

// Sembunyikan dropdown saat halaman dimuat
dropdownContent.style.display = "none";

dropdownButton.addEventListener("click", function() {
  if (dropdownContent.style.display === "none") {
    dropdownContent.style.display = "block";
  } else {
    dropdownContent.style.display = "none";
  }
});
</script>

    <script src="log.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="path/to/fontawesome/js/all.min.js"></script>
    <script src="typewriter.js"></script>
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
    <script>
  function toggleFAQ(id) {
    var answer = document.getElementById(id);
    answer.classList.toggle("show");
  }
</script>
</body>
</html>