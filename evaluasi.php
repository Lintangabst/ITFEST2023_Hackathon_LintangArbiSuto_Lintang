<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MOOD! - Pembelajaran Online</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
     <link rel="stylesheet" type="text/css" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Potta+One&display=swap" rel="stylesheet">
  <style>
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
       
    .answer-input {
      height: 30px;
      font-size: 1.2rem;
      width: 50px;
      text-align: center;
    }

    .correct-answer {
      background-color: lightgreen;
    }

    .wrong-answer {
      background-color: #ffcccb;
    }
    
.countdown {
  color: green; /* Warna awal */
}

.countdown.yellow {
  color: orange; /* Warna saat sisa waktu 30 - 10 detik */
}

.countdown.red {
  color: red; /* Warna saat waktu habis */
}

@keyframes scaleAnimation {
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.2) translate(-2px, -2px);
  }
  100% {
    transform: scale(1) translate(0);
  }
}

.animate-scale {
  animation: scaleAnimation 0.5s infinite;
}

.red {
  animation: none;
}

    .hover-effect:hover {
      transform: scale(1.05);
    }

    .social-icons {
      margin-top: 30px;
    }

    .social-icons a {
      color: #000;
      margin-right: 10px;
      font-size: 20px;
    }
  </style>
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
                <li class="nav-item">
                    <a class="nav-link mt-1" href="#" onclick="showPopup();"><span class="fas fa-question-circle"></span></a>
                </li>
        </ul>
            </div>
        </nav>

<div class="container mt-5">
  <h2 style="color: #FF7F50; font-style: oblique; font-family: 'Potta One', cursive; font-size: 2rem;">Evaluasi</h2>
  <hr>
  <div class="row">
    <div class="col-12 mb-3" id="questions"></div>
  </div>
  <div class="d-flex justify-content-center mt-3">
    <button class="btn btn-primary hover-effect" id="nextButton" style="display: block;" onclick="nextQuestion()">Selanjutnya</button>
    <button class="btn btn-primary hover-effect" id="finishButton" style="display: none;" onclick="finishQuestion()">Selesai</button>
  </div>
  <div class="card timer mt-3">
  <div class="card-body">
    <p class="card-text" style="color: #FF7F50; font-style: oblique; font-family: 'Potta One', cursive;">Waktu Tersisa: <span id="timer" class="countdown">60</span> Detik</p>
  </div>
</div>
</div>



<section class="footer fixed-bottom">
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
  <p style="font-style: oblique; font-family: 'Potta One', cursive; color: #FF7F50;" class="text-center mt-3">MOOD @ 2023</p>
</section>



  <!-- Modal and JavaScript code goes here -->

</body>
</html>


<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="infoModalLabel">Informasi</h5>
      </div>
      <div class="modal-body">
        <p style="font-size: 1rem;">Selamat datang di MOOD! - Pembelajaran Online. Pada evaluasi ini, Anda akan menjawab 10 soal matematika sederhana.</p>
        <p style="font-size: 1rem;">Jawablah setiap soal dengan mengisi kotak input dengan jawaban yang tepat. Setelah menyelesaikan 10 soal, klik tombol "Selesai" hasil evaluasi anda akan otomatis muncul</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Mengerti</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="resultModal" tabindex="-1" role="dialog" aria-labelledby="resultModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="resultModalLabel">Hasil Evaluasi</h5>
      </div>
      <div class="modal-body">
        <div id="score"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="restartEvaluation()">Ulangi Evaluasi</button>
      </div>
    </div>
  </div>
</div>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/mathjs/9.4.4/math.js"></script>

<script>
var currentQuestionIndex = 0;
var questionsContainer = document.getElementById('questions');
var randomQuestions = generateRandomQuestions();
var answers = [];
var timerElement = document.getElementById('timer');
var timeLeft = 60;
var isTimeUp = false; // Flag untuk memastikan konfirmasi hanya muncul sekali
var isEvaluationFinished = false; // Flag untuk menandai apakah evaluasi sudah selesai
var timer;

function showQuestion(index) {
  questionsContainer.innerHTML = '';

  var question = document.createElement('p');
  question.innerHTML = (index + 1) + '. ' + randomQuestions[index] + ' = ';
  var answerInput = document.createElement('input');
  answerInput.type = 'text';
  answerInput.id = 'answer' + index;
  answerInput.className = 'answer-input';
  answerInput.addEventListener('keypress', function(event) {
    if (event.keyCode === 13) { // 13 adalah kode tombol Enter
      nextQuestion();
    }
  });
  question.appendChild(answerInput);
  questionsContainer.appendChild(question);

  if (index === 9) {
    var nextButton = document.getElementById('nextButton');
    nextButton.style.display = 'none';
    var finishButton = document.getElementById('finishButton');
    finishButton.style.display = 'block';
  }
}

function nextQuestion() {
  var answerInput = document.getElementById('answer' + currentQuestionIndex);
  var userAnswer = answerInput.value;

  // Cek apakah kotak jawaban kosong
  if (userAnswer.trim() === '') {
    // Tampilkan pesan kesalahan atau lakukan tindakan lain
    alert('Harap isi kotak jawaban sebelum melanjutkan.');
    return;
  }

  answers.push(userAnswer);

  if (currentQuestionIndex < 9) {
    currentQuestionIndex++;
    showQuestion(currentQuestionIndex);
    answerInput.disabled = true;
  } else {
    answerInput.disabled = true; // Menonaktifkan kotak jawaban pada nomor 10
    finishQuestion();
  }
}

function finishQuestion() {
  var answerInput = document.getElementById('answer' + currentQuestionIndex);
  var userAnswer = answerInput.value;

  // Cek apakah kotak jawaban kosong
  if (userAnswer.trim() === '') {
    // Tampilkan pesan kesalahan atau lakukan tindakan lain
    alert('Harap isi kotak jawaban sebelum melanjutkan.');
    return;
  }

  answers.push(userAnswer);

  if (currentQuestionIndex < 9) {
    currentQuestionIndex++;
    showQuestion(currentQuestionIndex);
    answerInput.disabled = true;
  } else {
    var nextButton = document.getElementById('nextButton');
    nextButton.style.display = 'none';
    var finishButton = document.getElementById('finishButton');
    finishButton.style.display = 'block';
    finishButton.innerHTML = 'Selesai'; // Mengganti teks tombol
    answerInput.disabled = true; // Menonaktifkan kotak jawaban pada nomor 10
    calculateScore();
  }
}

function calculateScore() {
  var score = 0;
  var correctAnswers = [];

  for (var i = 0; i < 10; i++) {
    var userAnswer = answers[i];
    var correctAnswer = evaluateQuestion(randomQuestions[i]);

    correctAnswers.push(correctAnswer);

    if (parseFloat(userAnswer) === correctAnswer) {
      score++;
    }
  }

  var scoreText = document.getElementById('score');
  scoreText.innerHTML = '<p>Anda telah menyelesaikan evaluasi dengan skor ' + score + '/10</p>';
  scoreText.innerHTML += '<p>Jawaban yang benar:</p>';
  scoreText.innerHTML += '<ul>';
  for (var j = 0; j < correctAnswers.length; j++) {
    scoreText.innerHTML += '<li>' + randomQuestions[j] + ' = ' + correctAnswers[j] + '</li>';
  }
  scoreText.innerHTML += '</ul>';

  $('#resultModal').modal('show');

  isEvaluationFinished = true; // Set flag menjadi true

  stopTimer(); // Menghentikan penghitungan waktu saat evaluasi selesai
}

function evaluateQuestion(question) {
  return math.evaluate(question);
}

function generateRandomQuestions() {
  var questions = [];
  for (var i = 0; i < 10; i++) {
    var num1 = Math.floor(Math.random() * 10) + 1;
    var num2 = Math.floor(Math.random() * 10) + 1;
    var operatorIndex = Math.floor(Math.random() * 4);
    var operator;

    if (operatorIndex === 0) {
      operator = '+';
    } else if (operatorIndex === 1) {
      operator = '-';
    } else if (operatorIndex === 2) {
      operator = '*';
    } else {
      while (num1 % num2 !== 0) {
        num1 = Math.floor(Math.random() * 10) + 1;
        num2 = Math.floor(Math.random() * 10) + 1;
      }
      operator = '/';
    }

    var question = num1 + operator + num2;
    questions.push(question);
  }
  return questions;
}

function restartEvaluation() {
  location.reload();
}

</script>

<script>
var timerElement = document.getElementById('timer');
var timeLeft = 60;
var timer;

function startTimer() {
  if (isEvaluationFinished) {
    return;
  }
  
  timer = setInterval(function() {
    if (timeLeft <= 0) {
      clearInterval(timer);
      if (!isTimeUp) {
        isTimeUp = true;
        alert('Waktu Habis!, silahkan coba lagi dari awal');
        calculateScore();
        document.getElementById('timer').classList.add('red');
      }
    } else {
      timerElement.textContent = timeLeft;
      
      if (timeLeft <= 30 && timeLeft > 10) {
        document.getElementById('timer').classList.add('yellow');
      } else if (timeLeft <= 10) {
        document.getElementById('timer').classList.remove('yellow');
        document.getElementById('timer').classList.add('red');
        animateTimer(); // Memanggil fungsi untuk mengaktifkan animasi
      } else {
        document.getElementById('timer').classList.remove('yellow');
        document.getElementById('timer').classList.remove('red');
      }
      
      timeLeft--;
    }
  }, 1000);
}

function animateTimer() {
  var timerElement = document.getElementById('timer');
  timerElement.classList.add('animate-scale'); // Menambahkan kelas untuk memulai animasi

  var animationTimeout = setTimeout(function() {
    timerElement.classList.remove('animate-scale'); // Menghapus kelas untuk menghentikan animasi
  }, 500);

  // Menghapus timeout saat mencapai 1 detik
  if (timeLeft === 1) {
    clearTimeout(animationTimeout);
  }
}



function stopTimer() {
  clearInterval(timer);
}

$(document).ready(function() {
  $('#infoModal').modal('show');
  showQuestion(currentQuestionIndex);
  startTimer();
});
</script>

      <script>
        function showPopup() {
            $('#infoModal').modal('show');
        }
    </script>
</body>
</html>
