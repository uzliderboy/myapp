<?php
$server = 'https://'.$_SERVER["HTTP_HOST"];
session_start();
 // MySQL serveriga ulanish parametrlari
  $servername = 'localhost';
  $username = 'x_u_10391_ttj';
  $password = 'ttj23';
  $database = 'x_u_10391_ttj';

$n = '<!DOCTYPE html>
<html lang="uz">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bosh menyu</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>';
$n .= '<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="'.$server.'">
        <img src="../img/img.png" alt="logo" width="20%" height="auto">
        QARSHI DAVLAT UNIVERSITETI
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="../me">
              <i class="fas fa-user"></i> Shaxsiy ma\'lumotlar
            </a>
           </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <i class="fas fa-user-plus"></i> Komendat qo\'shish
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">
              <i class="fas fa-chart-line"></i> Sayt statistikasi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../exit.php">
              <i class="fas fa-sign-out-alt"></i> chiqish
            </a> 
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container mb-4">
      <div class="col-md-12">
     <div class="row mb-5 mt-5">
      <div class="col-md-6">
           <h3>Komendat ma\'lumotlarini kiriting</h3>
       </div> 
       <div class="col-md-6">';
       // MySQL serverga ulanishni boshqarish uchun obyektni yaratamiz
$mysqli = new mysqli($host, $username, $password, $database);

// Ulanishni tekshirish
if ($mysqli->connect_errno) {
    die("Ulanishda xatolik yuz berdi: " . $mysqli->connect_error);
}

// Ma'lumotlarni olish va saqlash
if (isset($_POST['create'])) {
    $fio = $_POST['fio'];
    $birthDate = $_POST['date'];
    $passportSeries = $_POST['pasport'];
    $passportNumber = $_POST['pasportp'];
    $photo = $_FILES["photo"]["name"];
    $gender = $_POST['jinsi'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $citizenship = $_POST['fuqoro'];
    $region = $_POST['viloyat'];
    $city = $_POST['tuman'];
    $address = $_POST['loc'];
    $login = $_POST['login'];
    $password = $_POST['parol'];
$targetDir = "uploads/"; // Fayllarni saqlash uchun direktoriya
$targetFile = $targetDir . basename($photo); // Faylning to'liq manzili
// Faylni serverga ko'chirish
move_uploaded_file($_FILES["photo"]["tmp_name"],$targetFile);
    // Ma'lumotlarni SQL injeksiondan himoya qilish
    $fio = $mysqli->real_escape_string($fio);
    $passportSeries = $mysqli->real_escape_string($passportSeries);
    $passportNumber = $mysqli->real_escape_string($passportNumber);
    $gender = $mysqli->real_escape_string($gender);
    $phone = $mysqli->real_escape_string($phone);
    $email = $mysqli->real_escape_string($email);
    $citizenship = $mysqli->real_escape_string($citizenship);
    $region = $mysqli->real_escape_string($region);
    $city = $mysqli->real_escape_string($city);
    $address = $mysqli->real_escape_string($address);
    $login = $mysqli->real_escape_string($login);
    $password = $mysqli->real_escape_string($password);

    // SQL INSERT so'rovini yaratish
    $query = "INSERT INTO admins (fio, birth_date, passport_series, passport_number, photo, gender, phone, email, citizenship, region, city, address, login, password)
              VALUES ('$fio', '$birthDate', '$passportSeries', '$passportNumber', '$photo', '$gender', '$phone', '$email', '$citizenship', '$region', '$city', '$address', '$login', '$password')";

    // So'rovni bajarish
    if ($mysqli->query($query)) {
        // Ma'lumotlar bazasiga saqlandi
        $n .= '<div class="alert alert-success">Ma\'lumotlar bazasiga muvaffaqiyatli saqlandi.</div>';
    } else {
        // Xatolik yuz berdi
        $n .= '<div class="alert alert-danger">Xatolik: ' . $mysqli->error.'</div>';
    }

    // MySQL ulanishini yopish
    $mysqli->close();
}
       
         $n .= '
         </div>
         </div>
     </div>
         <form method="POST" enctype="multipart/form-data">
         <div class="row">
      <div class="col-md-6">
        <labe for="fio" class="form-label">F.I.O</label>
        <input type="text" class="form-control mb-4" id="fio" name="fio" required>
      </div>
      <div class="col-md-6">
        <labe for="date" class="form-label">Tug\'ilgan sana</label>
        <input type="date" class="form-control mb-4" id="date" name="date" value="2010-01-01" min="1950-01-01" max="2020-01-01" required>
      </div>
     </div>
     <div class="row">
     <div class="col-md-4">
        <labe for="pasport" class="form-label">Pasport seriyasi</label>
        <input type="text" class="form-control mb-4" id="pasport" name="pasport" onkeyup="makeUppercase()" required>
      </div>
      <div class="col-md-4">
        <labe for="pasportp" class="form-label">Pasport penfili</label>
        <input type="number" class="form-control mb-4" id="pasportp" name="pasportp" min="11111111111111" required>
      </div>
      <div class="col-md-4">
        <labe for="photo" class="form-label">Rasmi (3x3)da</label>
        <input type="file" class="form-control mb-4" id="photo" name="photo" accept="image/jpeg" required>
      </div>
     </div>
     <div class="row">
     <div class="col-md-2">
    <label for="sel1">Jinsi</label>
    <select class="form-control mb-4" id="sel1" name="jinsi">
      <option>Erkak</option>
      <option>Ayol</option>
    </select>
      </div>
      <div class="col-md-5">
      <label for="phone">Telefon raqam</label>
      <input type="phone" class="form-control mb-4" id="phone" name="phone" required>
         </div>
        <div class="col-md-5">
      <label for="email">Elektron pochta</label>
      <input type="email" class="form-control mb-4" id="email" name="email" required>
         </div>
     </div>
     <div class="row">
     <div class="col-md-3">
        <labe for="fuqoro">Fuqoroligi</label>
        <select class="form-control mb-4" id="fuqoro" name="fuqoro">
      <option>O\'zbekiston</option>
    </select>
      </div>
      <div class="col-md-3">
       <labe for="viloyat">Viloyati</label>
        <select class="form-control mb-4" id="viloyat" name="viloyat">
      <option>Qashqadaryo viloyati</option>
    </select>
      </div>
      <div class="col-md-3">
       <labe for="tuman">Tuman(shahar)i</label>
        <select class="form-control mb-4" id="tuman" name="tuman">
      <option>Qarshi shahar</option>
    </select>
      </div>
      <div class="col-md-3">
      <label for="loc">Manzili</label>
      <input type="text" class="form-control mb-4" id="loc" name="loc" required>
         </div>
     </div>
     <div class="row">
     <div class="col-md-5">
        <labe for="login" class="form-label">Login</label>
        <input type="text" class="form-control mb-4" id="login" name="login" required>
      </div>
      <div class="col-md-5">
        <labe for="parol" class="form-label">Parol</label>
        <input type="text" class="form-control mb-4" id="parol" name="parol" required>
      </div>
      <div class="col-md-2">
        <input type="submit" class="btn btn-primary form-control mt-4" name="create" value="Yaratish">
      </div>
     </div>
  </form>
      </div>
  </div>
  <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-secondary" style="width:100%;">
      <!-- Copyright -->
      <div class="text-white mb-3 mb-md-0">
        Mualliflik huquqi © 2023. Barcha huquqlar himoyalangan.
      </div>
      <div>
        <a href="https://www.facebook.com/code.uz.10?mibextid=ZbWKwL" class="text-white me-4">
          <i class="fab fa-facebook" style="font-size:25px;color:blue"></i>
        </a>
        <a href="https://t.me/uzliderboy" class="text-white me-4">
          <i class="fab fa-telegram" style="font-size:25px;color:blue"></i>
        </a>
        <a href="https://youtube.com/@uzliderboy73" class="text-white me-4">
          <i class="fab fa-youtube" style="font-size:25px;color:red"></i>
        </a>
        <a href="https://instagram.com/uzliderboy.03?igshid=ZGUzMzM3NWJiOQ==" class="text-white">
          <i class="fab fa-instagram" style="font-size:25px;color:red"></i>
        </a>
        </div>
      </div>
      <script>
        function makeUppercase() {
            var input = document.getElementById("pasport");
            input.value = input.value.toUpperCase();
        }
    </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>';
if($_SESSION['login']=='kattaadmin'){
    echo $n;
}else{
    header ('Location: '.$server);
}