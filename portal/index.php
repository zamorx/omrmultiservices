<?php
include("config.php");
include('class/userClass.php');
$userClass = new userClass();

$errorMsgLogin = '';
/* Login Form */
if (!empty($_POST['loginSubmit'])) {
  $usernameEmail = $_POST['usernameEmail'];
  $password = $_POST['password'];
  if (strlen(trim($usernameEmail)) > 1 && strlen(trim($password)) > 1) {
    $uid = $userClass->userLogin($usernameEmail, $password);
    if ($uid) {
      $url = BASE_URL . '../dashboard/';
      header("Location: $url"); // Page redirecting to home.php 
    } else {
      $errorMsgLogin = "Por favor, revise sus datos de registro.";
    }
  }
}
?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OMR Multiservices LLC - Customer Management CRM</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="../dashboard/assets/vendor/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome CSS-->
  <link rel="stylesheet" href="../dashboard/assets/vendor/font-awesome/css/font-awesome.min.css">
  <!-- Fontastic Custom icon font-->
  <link rel="stylesheet" href="../dashboard/assets/css/fontastic.css">
  <!-- Google fonts - Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
  <!-- jQuery Circle-->
  <link rel="stylesheet" href="../dashboard/assets/css/grasp_mobile_progress_circle-1.0.0.min.css">
  <!-- Custom Scrollbar-->
  <link rel="stylesheet" href="../dashboard/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="../dashboard/assets/css/style.default.css" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="../dashboard/assets/css/custom.css">
  <!-- Favicon-->
  <link rel="shortcut icon" href="../dashboard/assets/img/favicon.ico">
  <!-- Tweaks for older IEs-->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
  <div class="page login-page">
    <div class="container">
      <div class="form-outer text-center d-flex align-items-center">
        <div class="form-inner">
          <div class="logo text-uppercase"><strong class="text-primary">omr</strong><span>multiservices</span></div>
          <p></p>
          <form method="post" action="" name="login" class="text-left form-validate">
            <div class="form-group-material">
              <input id="login-username" type="text" name="usernameEmail" autocomplete="off" required data-msg="Escribe tu usuario" class="input-material">
              <label for="login-username" class="label-material">Username</label>
            </div>
            <div class="form-group-material">
              <input id="login-password" type="password" name="password" autocomplete="off" required data-msg="Escribe tu contraseña" class="input-material">
              <label for="login-password" class="label-material">Password</label>
            </div>
            <div class="errorMsg"><?php echo $errorMsgLogin; ?></div>
            <div class="form-group text-center"><input type="submit" name="loginSubmit" value="Login" class="btn btn-primary">
              <!-- This should be submit button but I replaced it with <a> for demo purposes-->
            </div>
          </form><!-- <a href="#" class="forgot-pass">Forgot Password?</a> <small>Aún no se ha registrado? </small><a href="register.php" class="signup">Hágalo aquí.</a>-->
        </div>
        <div class="copyrights text-center">
          <p>Developed by: <a href="https://www.iconplus.net" class="external">ICON PLUS LLC</a></p>
          <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
        </div>
      </div>
    </div>
  </div>
  <!-- JavaScript files-->
  <script src="../dashboard/assets/vendor/jquery/jquery.min.js"></script>
  <script src="../dashboard/assets/vendor/popper.js/umd/popper.min.js"> </script>
  <script src="../dashboard/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="../dashboard/assets/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
  <script src="../dashboard/assets/vendor/jquery.cookie/jquery.cookie.js"> </script>
  <script src="../dashboard/assets/vendor/chart.js/Chart.min.js"></script>
  <script src="../dashboard/assets/vendor/jquery-validation/jquery.validate.min.js"></script>
  <script src="../dashboard/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
  <!-- Main File-->
  <script src="../dashboard/assets/js/front.js"></script>
</body>