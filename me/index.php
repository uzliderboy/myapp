<?php
session_start();
$server = 'https://'.$_SERVER["HTTP_HOST"];
$command = "curl -X 'GET' 'https://student.qarshidu.uz/rest/v1/account/me' -H 'accept: application/json' -H 'Authorization: Bearer '".$_SESSION['token'];
$output = exec($command);
$js = json_decode($output)->data;
//my information
$image = $js->image;
$fname = $js->full_name;
$date = date('d.m.Y', $js->birth_date);
$pasport = $js->passport_number;
$penfil = $js->passport_pin;
$gender = $js->gender->name;
$phone = $js->phone;
$email = $js->email;
$id = $js->student_id_number;
//my location
$country = $js->country->name;
$province = $js->province->name;
$district = $js->district->name;
$address = $js->address;
//my university
$university = $js->university;
$faculty = $js->faculty->name;
$specialty = $js->specialty->code.' - '.$js->specialty->name;
$studentStatus = $js->studentStatus->name;
$educationForm = $js->educationForm->name;
$educationType = $js->educationType->name;
$paymentForm = $js->paymentForm->name;
$group = $js->group->name;
$educationLang = $js->educationLang->name;
$level = $js->level->name;
$semester = $js->semester->name;
$education_year = $js->semester->education_year->name;


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
        <img src="../img/img.png" alt="logo" width="20%" height="auto">
        QARSHI DAVLAT UNIVERSITETI
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">
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
            <a class="nav-link" href="../exit.php">
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
  <a class="btn btn" href="#section1"><button type="button" class="btn btn-outline-secondary">#<i class="fas fa-user"></i></button></a>
  <a class="btn btn" href="#section2"><button type="button" class="btn btn-outline-secondary">#<i class="fas fa-home"></i></button></a>

<div id="section1" class="container-fluid bg-light mb-3 border border-dark" style="padding:10px 20px;">
  <h2 class="text-center bg-secondary text-white">Mening ma\'lumotlarim</h2>
  <div class="row">
  <div class="col-sm-4 mb-3">
  <img src="../createadmin/uploads/'.$_SESSION['photo'].'" class="mx-auto d-block img-thumbnail" alt="logo">
  </div>
  <div class="col-sm-8 mb-3">
  <table class="table table-striped">
    <tbody>
      <tr>
        <td>F.I.O: </td>
        <td>'.$_SESSION['fio'].'</td>
      </tr>
      <tr>
        <td>Tug\'ilgan sana: </td>
        <td>'.$_SESSION['birth_date'].'</td>
      </tr>
      <tr>
        <td>Pasport: </td>
        <td>'.$_SESSION['passport_series'].'</td>
      </tr>
       <tr>
        <td>Jshshir: </td>
        <td>'.$_SESSION['passport_number'].'</td>
      </tr>
      <tr>
        <td>Jinsi: </td>
        <td>'.$_SESSION['gender'].'</td>
      </tr>
      <tr>
        <td>Telefon: </td>
        <td>'.$_SESSION['phone'].'</td>
      </tr>
      <tr>
        <td>Email: </td>
        <td>'.$_SESSION['email'].'</td>
      </tr>
      <tr>
        <td>Rol: </td>
        <td>Komendat</td>
      </tr>
    </tbody>
  </table>
  </div>
</div>
</div>

<div id="section2" class="container-fluid bg-light mb-3 border border-dark" style="padding:10px 20px;">
  <h2 class="text-center bg-secondary text-white">Mening manzilim</h2>
  <div class="mb-3">
  <table class="table table-striped">
    <tbody>
      <tr>
        <td>Respublika: </td>
        <td>'.$_SESSION['citizenship'].'</td>
      </tr>
      <tr>
        <td>Viloyat: </td>
        <td>'.$_SESSION['region'].'</td>
      </tr>
      <tr>
        <td>Tuman: </td>
        <td>'.$_SESSION['city'].'</td>
      </tr>
       <tr>
        <td>Manzil: </td>
        <td>'.$_SESSION['address'].'</td>
      </tr>
    </tbody>
  </table>
</div>
</div>
      </div>
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
        <img src="../img/img.png" alt="logo" width="20%" height="auto">
        QARSHI DAVLAT UNIVERSITETI
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
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
            <a class="nav-link" href="../exit.php">
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
  <a class="btn btn" href="#section1"><button type="button" class="btn btn-outline-secondary">#<i class="fas fa-user"></i></button></a>
  <a class="btn btn" href="#section2"><button type="button" class="btn btn-outline-secondary">#<i class="fas fa-home"></i></button></a>
  <a class="btn btn" href="#section3"><button type="button" class="btn btn-outline-secondary">#<i class="fas fa-book"></i></button></a>
  <a class="btn btn" href="#section4"><button type="button" class="btn btn-outline-secondary">#<i class="fas fa-bed"></i></button></a>

<div id="section1" class="container-fluid bg-light mb-3 border border-dark" style="padding:10px 20px;">
  <h2 class="text-center bg-secondary text-white">Mening ma\'lumotlarim</h2>
  <div class="row">
  <div class="col-sm-4 mb-3">
  <img src="'.$image.'" class="mx-auto d-block img-thumbnail" alt="logo">
  </div>
  <div class="col-sm-8 mb-3">
  <table class="table table-striped">
    <tbody>
      <tr>
        <td>F.I.O: </td>
        <td>'.$fname.'</td>
      </tr>
      <tr>
        <td>Tug\'ilgan sana: </td>
        <td>'.$date.'</td>
      </tr>
      <tr>
        <td>Pasport: </td>
        <td>'.$pasport.'</td>
      </tr>
       <tr>
        <td>Jshshir: </td>
        <td>'.$penfil.'</td>
      </tr>
      <tr>
        <td>Jinsi: </td>
        <td>'.$gender.'</td>
      </tr>
      <tr>
        <td>Telefon: </td>
        <td>'.$phone.'</td>
      </tr>
      <tr>
        <td>Email: </td>
        <td>'.$email.'</td>
      </tr>
      <tr>
        <td>Talaba id: </td>
        <td>'.$id.'</td>
      </tr>
    </tbody>
  </table>
  </div>
</div>
</div>

<div id="section2" class="container-fluid bg-light mb-3 border border-dark" style="padding:10px 20px;">
  <h2 class="text-center bg-secondary text-white">Mening manzilim</h2>
  <div class="mb-3">
  <table class="table table-striped">
    <tbody>
      <tr>
        <td>Respublika: </td>
        <td>'.$country.'</td>
      </tr>
      <tr>
        <td>Viloyat: </td>
        <td>'.$province.'</td>
      </tr>
      <tr>
        <td>Tuman: </td>
        <td>'.$district.'</td>
      </tr>
       <tr>
        <td>Manzil: </td>
        <td>'.$address.'</td>
      </tr>
    </tbody>
  </table>
</div>
</div>

<div id="section3" class="container-fluid bg-light mb-3 border border-dark" style="padding:10px 20px;">
  <h2 class="text-center bg-secondary text-white">O\'qish joyi haqida</h2>
  <div class="mb-3">
  <table class="table table-striped">
    <tbody>
      <tr>
        <td>OTM: </td>
        <td>'.$university.'</td>
      </tr>
      <tr>
        <td>Fakultet: </td>
        <td>'.$faculty.'</td>
      </tr>
      <tr>
        <td>Yo\'nalish: </td>
        <td>'.$specialty.'</td>
      </tr>
       <tr>
        <td>O\'quv status: </td>
        <td>'.$studentStatus.'</td>
      </tr>
      <tr>
        <td>Ta\'lim shakli: </td>
        <td>'.$educationForm.'</td>
      </tr>
      <tr>
        <td>Ta\'lim turi: </td>
        <td>'.$educationType.'</td>
      </tr>
      <tr>
        <td>To\'lov turi: </td>
        <td>'.$paymentForm.'</td>
      </tr>
      <tr>
        <td>Guruh: </td>
        <td>'.$group.'</td>
      </tr>
      <tr>
        <td>Ta\'lim tili: </td>
        <td>'.$educationLang.'</td>
      </tr>
      <tr>
        <td>Talaba kurs: </td>
        <td>'.$level.'</td>
      </tr>
      <tr>
        <td>Semestr: </td>
        <td>'.$semester.'</td>
      </tr>
      <tr>
        <td>O\'quv yili: </td>
        <td>'.$education_year.'</td>
      </tr>
    </tbody>
  </table>
</div>
</div>
    
<div id="section4" class="container-fluid bg-light mb-3 border border-dark" style="padding:100px 20px;">
  <h1>Mening xonam</h1>
  <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
  <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
</div>

      </div>
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
        <img src="../img/img.png" alt="logo" width="20%" height="auto">
        QARSHI DAVLAT UNIVERSITETI
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <i class="fas fa-user"></i> Shaxsiy ma\'lumotlar
            </a>
           </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="../createadmin">
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
  <div class="container">
    <div class="row">
      <div class="col-md-12">
  <a class="btn btn" href="#section1"><button type="button" class="btn btn-outline-secondary">#<i class="fas fa-user"></i></button></a>
  <a class="btn btn" href="#section2"><button type="button" class="btn btn-outline-secondary">#<i class="fas fa-home"></i></button></a>
  <a class="btn btn" href="#section3"><button type="button" class="btn btn-outline-secondary">#<i class="fas fa-book"></i></button></a>

<div id="section1" class="container-fluid bg-light mb-3 border border-dark" style="padding:10px 20px;">
  <h2 class="text-center bg-secondary text-white">Mening ma\'lumotlarim</h2>
  <div class="row">
  <div class="col-sm-4 mb-3">
  <img src="image/imgadmin.jpg" class="mx-auto d-block img-thumbnail" alt="logo">
  </div>
  <div class="col-sm-8 mb-3">
  <table class="table table-striped">
    <tbody>
      <tr>
        <td>F.I.O: </td>
        <td>BAHODIRXONOV ULUG‘BEKJON RUSTAMJON O‘G‘LI</td>
      </tr>
      <tr>
        <td>Tug\'ilgan sana: </td>
        <td>01.02.2003</td>
      </tr>
      <tr>
        <td>Pasport: </td>
        <td>AC2413212</td>
      </tr>
       <tr>
        <td>Jshshir: </td>
        <td>50102035550022</td>
      </tr>
      <tr>
        <td>Jinsi: </td>
        <td>Erkak</td>
      </tr>
      <tr>
        <td>Telefon: </td>
        <td>+998930702019</td>
      </tr>
      <tr>
        <td>Email: </td>
        <td>uzliderboy@gmail.com</td>
      </tr>
      <tr>
        <td>Rol: </td>
        <td>Sayt katta admini</td>
      </tr>
    </tbody>
  </table>
  </div>
</div>
</div>

<div id="section2" class="container-fluid bg-light mb-3 border border-dark" style="padding:10px 20px;">
  <h2 class="text-center bg-secondary text-white">Mening manzilim</h2>
  <div class="mb-3">
  <table class="table table-striped">
    <tbody>
      <tr>
        <td>Respublika: </td>
        <td>O‘zbekiston</td>
      </tr>
      <tr>
        <td>Viloyat: </td>
        <td>Qashqadaryo viloyati</td>
      </tr>
      <tr>
        <td>Tuman: </td>
        <td>Ko\'kdala tunmani</td>
      </tr>
       <tr>
        <td>Manzil: </td>
        <td>Soybo\'yi MSG, ul.Navnixol, dom 17</td>
      </tr>
    </tbody>
  </table>
</div>
</div>

<div id="section3" class="container-fluid bg-light mb-3 border border-dark" style="padding:10px 20px;">
  <h2 class="text-center bg-secondary text-white">Ba\'zi ma\'lumotlar</h2>
  <div class="mb-3">
  <table class="table table-striped">
    <tbody>
      <tr>
        <td>Mutaxasisilik:</td>
        <td>Dasturchi</td>
      </tr>
      <tr>
        <td>Yo\'nalish: </td>
        <td>Full stack</td>
      </tr>
       <tr>
        <td>Daraja: </td>
        <td>Junior+</td>
      </tr>
      <tr>
        <td>Texnalogiya: </td>
        <td>HTML, CSS, PHP, PYTHON, C#; MySQL</td>
      </tr>
      <tr>
        <td>Malaka: </td>
        <td>5 yil</td>
      </tr>
    </tbody>
  </table>
</div>
</div>
      </div>
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
    header("Location: ".$server);
}