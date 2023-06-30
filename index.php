<?php
session_start();
$server = 'https://'.$_SERVER["HTTP_HOST"];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://student.qarshidu.uz/rest/v1/public/stat-student");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
$response = curl_exec($ch);
curl_close($ch);
$data = json_decode($response)->data;
$c = $data->accommodation;
$uzuyida = $c->{'O‘z uyida'}->Bakalavr;
$uzuyidam = $c->{'O‘z uyida'}->Magistr;
$qarindosh = $c->{'Qarindoshining uyida'}->Bakalavr;
$qarindoshm = $c->{'Qarindoshining uyida'}->Magistr;
$tanishi = $c->{'Tanishining uyida'}->Bakalavr;
$tanishim = $c->{'Tanishining uyida'}->Magistr;
$ijarada = $c->{'Ijaradagi uyda'}->Bakalavr;
$ijaradam = $c->{'Ijaradagi uyda'}->Magistr;
$ttj = $c->{'Talabalar turar joyida'}->Bakalavr;
$ttjm = $c->{'Talabalar turar joyida'}->Magistr;
$a = '<!DOCTYPE html>
<html lang="uz">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bosh menyu</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>';
$a .= '<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="'.$server.'">
        <img src="img/img.png" alt="logo" width="20%" height="auto">
        QARSHI DAVLAT UNIVERSITETI
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="me">
              <i class="fas fa-user"></i> Shaxsiy ma\'lumotlar
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-users"></i> Talabalar
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-chart-line"></i> Yotoqxona statistikasi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-file-pdf"></i> Hisobotlar
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-plus"></i> Xona qo\'shish
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-user-plus"></i> Talaba qo\'shish
            </a>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">
              <i class="fas fa-user-minus"></i> Talaba chiqarish
            </a>
          </li>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="exit.php">
              <i class="fas fa-sign-out-alt"></i> chiqish
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
      <div id="demo" class="carousel slide" data-bs-ride="carousel">
       <!-- The slideshow/carousel -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/img1.jpg" class="d-block" style="width:100%;height:500px;filter:blur(4px);opacity:0.5">
      <div class="carousel-caption" style="color:black">
      <h2>Talabalar yashash joylari haqida ma\'lumot </h2>
       <table class="table">
    <thead class="table">
      <tr>
        <th colspan="2" style="font-size:25px">O\'z uyida</th>
      </tr>
    </thead>
    <tbody style="font-size:20px">
      <tr>
        <td>Bakalavrlar : </td>
        <td>'.$uzuyida.'</td>
      </tr>
      <tr>
        <td>Magistrlar : </td>
        <td>'.$uzuyidam.'</td>
      </tr>
      <tr>
 </tbody>
 </table>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/img2.jpg" class="d-block" style="width:100%;height:500px;filter:blur(4px);opacity:0.5">
      <div class="carousel-caption" style="color:black">
      <h2>Talabalar yashash joylari haqida ma\'lumot </h2>
       <table class="table">
    <thead class="table">
      <tr>
        <th colspan="2" style="font-size:25px">Qarindoshining uyida</th>
      </tr>
    </thead>
    <tbody style="font-size:20px">
      <tr>
        <td>Bakalavrlar : </td>
        <td>'.$qarindosh.'</td>
      </tr>
      <tr>
        <td>Magistrlar : </td>
        <td>'.$qarindoshm.'</td>
      </tr>
      <tr>
 </tbody>
 </table>
      </div> 
    </div>
    <div class="carousel-item">
      <img src="img/img3.jpg" class="d-block" style="width:100%;height:500px;filter:blur(5px);opacity:0.5">
      <div class="carousel-caption" style="color:black">
      <h2>Talabalar yashash joylari haqida ma\'lumot </h2>
       <table class="table">
    <thead class="table">
      <tr>
        <th colspan="2" style="font-size:25px">Tanishining uyida</th>
      </tr>
    </thead>
    <tbody style="font-size:20px">
      <tr>
        <td>Bakalavrlar : </td>
        <td>'.$tanishi.'</td>
      </tr>
      <tr>
        <td>Magistrlar : </td>
        <td>'.$tanishim.'</td>
      </tr>
      <tr>
 </tbody>
 </table>
      </div>  
    </div>
    <div class="carousel-item">
      <img src="img/img4.jpg" class="d-block" style="width:100%;height:500px;filter:blur(4px);opacity:0.5">
      <div class="carousel-caption" style="color:black">
      <h2>Talabalar yashash joylari haqida ma\'lumot </h2>
       <table class="table">
    <thead class="table">
      <tr>
        <th colspan="2" style="font-size:25px">Ijaradagi uyda</th>
      </tr>
    </thead>
    <tbody style="font-size:20px">
      <tr>
        <td>Bakalavrlar : </td>
        <td>'.$ijarada.'</td>
      </tr>
      <tr>
        <td>Magistrlar : </td>
        <td>'.$ijaradam.'</td>
      </tr>
      <tr>
 </tbody>
 </table>
      </div> 
    </div>
    <div class="carousel-item">
      <img src="img/img5.jpg" class="d-block" style="width:100%;height:500px;filter:blur(4px);opacity:0.5">
      <div class="carousel-caption" style="color:black">
      <h2>Talabalar yashash joylari haqida ma\'lumot </h2>
       <table class="table">
    <thead class="table">
      <tr>
        <th colspan="2" style="font-size:25px">Talabalar turar joyida</th>
      </tr>
    </thead>
    <tbody style="font-size:20px">
      <tr>
        <td>Bakalavrlar : </td>
        <td>'.$ttj.'</td>
      </tr>
      <tr>
        <td>Magistrlar : </td>
        <td>'.$ttjm.'</td>     
      </tr>
      <tr>
 </tbody>
 </table>
      </div> 
    </div>
  </div>
 </div>
</div>
         <h1>Yotoqxona boshqaruvchisi bo\'limiga <strong>Xush kelibsiz!</strong></h1>
      </div>
    </div>
  </div>
  <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-secondary" style="width:100%;position:absolute;bottom:0">
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>';
$b = '<!DOCTYPE html>
<html lang="uz">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bosh menyu</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>';
$b .= '<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="'.$server.'">
        <img src="img/img.png" alt="logo" width="20%" height="auto">
        QARSHI DAVLAT UNIVERSITETI
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="me">
              <i class="fas fa-user"></i> Shaxsiy ma\'lumotlar
            </a>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">
              <i class="fas fa-home"></i> Yotoqxonalarni ko\'rish
            </a>
          </li>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">
              <i class="fas fa-file-pdf"></i> Hisobotlarim
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="exit.php">
              <i class="fas fa-sign-out-alt"></i> chiqish
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
      <div id="demo" class="carousel slide" data-bs-ride="carousel">
       <!-- The slideshow/carousel -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/img1.jpg" class="d-block" style="width:100%;height:500px;filter:blur(4px);opacity:0.5">
      <div class="carousel-caption" style="color:black">
      <h2>Talabalar yashash joylari haqida ma\'lumot </h2>
       <table class="table">
    <thead class="table">
      <tr>
        <th colspan="2" style="font-size:25px">O\'z uyida</th>
      </tr>
    </thead>
    <tbody style="font-size:20px">
      <tr>
        <td>Bakalavrlar : </td>
        <td>'.$uzuyida.'</td>
      </tr>
      <tr>
        <td>Magistrlar : </td>
        <td>'.$uzuyidam.'</td>
      </tr>
      <tr>
 </tbody>
 </table>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/img2.jpg" class="d-block" style="width:100%;height:500px;filter:blur(4px);opacity:0.5">
      <div class="carousel-caption" style="color:black">
      <h2>Talabalar yashash joylari haqida ma\'lumot </h2>
       <table class="table">
    <thead class="table">
      <tr>
        <th colspan="2" style="font-size:25px">Qarindoshining uyida</th>
      </tr>
    </thead>
    <tbody style="font-size:20px">
      <tr>
        <td>Bakalavrlar : </td>
        <td>'.$qarindosh.'</td>
      </tr>
      <tr>
        <td>Magistrlar : </td>
        <td>'.$qarindoshm.'</td>
      </tr>
      <tr>
 </tbody>
 </table>
      </div> 
    </div>
    <div class="carousel-item">
      <img src="img/img3.jpg" class="d-block" style="width:100%;height:500px;filter:blur(5px);opacity:0.5">
      <div class="carousel-caption" style="color:black">
      <h2>Talabalar yashash joylari haqida ma\'lumot </h2>
       <table class="table">
    <thead class="table">
      <tr>
        <th colspan="2" style="font-size:25px">Tanishining uyida</th>
      </tr>
    </thead>
    <tbody style="font-size:20px">
      <tr>
        <td>Bakalavrlar : </td>
        <td>'.$tanishi.'</td>
      </tr>
      <tr>
        <td>Magistrlar : </td>
        <td>'.$tanishim.'</td>
      </tr>
      <tr>
 </tbody>
 </table>
      </div>  
    </div>
    <div class="carousel-item">
      <img src="img/img4.jpg" class="d-block" style="width:100%;height:500px;filter:blur(4px);opacity:0.5">
      <div class="carousel-caption" style="color:black">
      <h2>Talabalar yashash joylari haqida ma\'lumot </h2>
       <table class="table">
    <thead class="table">
      <tr>
        <th colspan="2" style="font-size:25px">Ijaradagi uyda</th>
      </tr>
    </thead>
    <tbody style="font-size:20px">
      <tr>
        <td>Bakalavrlar : </td>
        <td>'.$ijarada.'</td>
      </tr>
      <tr>
        <td>Magistrlar : </td>
        <td>'.$ijaradam.'</td>
      </tr>
      <tr>
 </tbody>
 </table>
      </div> 
    </div>
    <div class="carousel-item">
      <img src="img/img5.jpg" class="d-block" style="width:100%;height:500px;filter:blur(4px);opacity:0.5">
      <div class="carousel-caption" style="color:black">
      <h2>Talabalar yashash joylari haqida ma\'lumot </h2>
       <table class="table">
    <thead class="table">
      <tr>
        <th colspan="2" style="font-size:25px">Talabalar turar joyida</th>
      </tr>
    </thead>
    <tbody style="font-size:20px">
      <tr>
        <td>Bakalavrlar : </td>
        <td>'.$ttj.'</td>
      </tr>
      <tr>
        <td>Magistrlar : </td>
        <td>'.$ttjm.'</td>
      </tr>
      <tr>
 </tbody>
 </table>
      </div> 
    </div>
  </div>
 </div>
</div>
         <h1>Talaba bo\'limiga <strong>Xush kelibsiz!</strong></h1>
      </div>
    </div>
  </div>
  <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-secondary" style="width:100%;position:absolute;bottom:0">
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>';

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
        <img src="img/img.png" alt="logo" width="20%" height="auto">
        QARSHI DAVLAT UNIVERSITETI
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="me">
              <i class="fas fa-user"></i> Shaxsiy ma\'lumotlar
            </a>
           </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="createadmin">
              <i class="fas fa-user-plus"></i> Komendat qo\'shish
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">
              <i class="fas fa-chart-line"></i> Sayt statistikasi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="exit.php">
              <i class="fas fa-sign-out-alt"></i> chiqish
            </a> 
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
         <h1>Adminstator bo\'limiga <strong>Xush kelibsiz!</strong></h1>
      </div>
    </div>
  </div>
  <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-secondary" style="width:100%;position:absolute;bottom:0">
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>';

if($_SESSION['login'] == "admin"){
    echo $a;
}elseif($_SESSION['login'] == "kattaadmin"){
    echo $n;
}elseif($_SESSION ['login'] == "user"){
    echo $b;
}else{
    header("Location: login");
}
