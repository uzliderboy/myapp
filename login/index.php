<!DOCTYPE html>
<html lang="uz">
<head>
	<title>Tizimga kirish</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body style="background-color: white;">
		<div class="limiter">
			<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST">
					<span class="login100-form-title p-b-43" style="font-size:15px">
<?php
$server = 'https://'.$_SERVER["HTTP_HOST"];
session_start();

$servername = 'localhost';
$username = 'x_u_10391_ttj';
$password = 'ttj23';
$database = 'x_u_10391_ttj';

// Ma'lumotlar bazasiga bog'lanishni hosil qilish
$conn = new mysqli($servername, $username, $password, $database);

// Bog'lanishni tekshirish
if ($conn->connect_error) {
    die("Bog'lanishda xatolik yuz berdi: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit"])) {
        $login = $_POST['login'];
        $pass = $_POST['password'];

        // Ma'lumotlar bazasidan foydalanuvchini izlash
        $sql = "SELECT * FROM admins WHERE login='$login'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $storedPassword = $row['password'];

        // Foydalanuvchi kiritgan parolni tekshirish
        if ($pass == $storedPassword) {
            $_SESSION['login'] = "admin";
             //Ma'lumotlarini olish
            $_SESSION['fio'] = $row['fio'];
            $_SESSION['birth_date'] = $row['birth_date'];
            $_SESSION['passport_series'] = $row['passport_series'];
            $_SESSION['passport_number'] = $row['passport_number'];
            $_SESSION['photo'] = $row['photo'];
            $_SESSION['gender'] = $row['gender'];
            $_SESSION['phone'] = $row['phone'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['citizenship'] = $row['citizenship'];
            $_SESSION['region'] = $row['region'];
            $_SESSION['city'] = $row['city'];
            $_SESSION['address'] = $row['address'];
            header('Location: ' . $server);
        } elseif ($login == "uzliderboy" && $pass == "111111") {
            $_SESSION['login'] = "kattaadmin";
            header('Location: ' . $server);
        } else {
            $ch = curl_init();
            $url = "https://student.qarshidu.uz/rest/v1/auth/login";
            curl_setopt($ch, CURLOPT_URL, $url);
            $config['useragent'] = 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0';
            curl_setopt($ch, CURLOPT_USERAGENT, $config['useragent']);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array('login' => $login, 'password' => $pass,)));
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'accept: application/json',
                'Content-Type: application/json',
            ));
            $response = curl_exec($ch);
            curl_close($ch);
            if (json_decode($response)->success == true) {
                $_SESSION['login'] = "user";
                $_SESSION['token'] = json_decode($response)->data->token;
                header('Location: ' . $server);
            } else {
                echo '<div class="alert alert-danger alert-dismissible" id="alert">
                    <strong>Xato!</strong> ' . json_decode($response)->error . '
                </div>';
            }
        }
    }
}

// Ma'lumotlar bazasiga bog'lanishni yopish
$conn->close();
?>
	
				    </span>
					<span class="login100-form-title p-b-43">
						"HEMIS STUDENT AXBOROT TIZIMI"dagi login va parolingiz
					</span>
					<div class="wrap-input100 validate-input" data-validate = "login yo'q?">
						<input class="input100" type="text" name="login">
						<span class="focus-input100"></span>
						<span class="label-input100">Talaba ID(login)i</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="parol yo'q?">
						<input class="input100" type="password" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Paroli</span>
					</div>
							<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember" required>
							<label class="label-checkbox100" for="ckb1">
							   Yotoqxona shartlariga rozimisiz?
							</label>
						</div>
						<div>
							<a href="#" class="txt1">
								Shartlar
							</a>
						</div>
					</div>
					<div class="container-login100-form-btn">
						<button name="submit" class="login100-form-btn">
							Kirish
						</button>
					</div>
				</form>
				<div class="login100-more" style="background-image: url('images/univer.jpg');">
				</div>
			</div>
		</div>
	</div>
	 <script>
  setTimeout(function(){
    document.getElementById("alert").remove();
  }, 5000); // 10 seconds
</script>
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>