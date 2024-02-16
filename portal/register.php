<?php
include("config.php");
include('class/userClass.php');
$userClass = new userClass();

$errorMsgReg = '';
/* Signup Form */
if (!empty($_POST['signupSubmit'])) {
  $username = $_POST['usernameReg'];
  $email = $_POST['emailReg'];
  $password = $_POST['passwordReg'];
  $name = $_POST['nameReg'];
  /* Regular expression check */
  $username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
  $email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+.([a-zA-Z]{2,4})$~i', $email);
  $password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);

  if ($username_check && $email_check && $password_check && strlen(trim($name)) > 0) {
    $uid = $userClass->userRegistration($username, $password, $email, $name);
    if ($uid) {
      $url = BASE_URL . 'index.php';
      header("Location: $url"); // Page redirecting to home.php 
    } else {
      $errorMsgReg = "Username or Email already exists.";
    }
  }
}
?>

<head><meta charset="utf-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ICON S.A. - Support System</title>
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
          <div class="logo text-uppercase"><span>Registro</span><strong class="text-primary">Usuario</strong></div>
          <p></p>
          <form method="post" action="" name="signup" class="text-left form-validate">
            <div class="form-group-material">
              <input id="register-name" type="text" name="nameReg" autocomplete="off" required data-msg="Please enter your username" class="input-material">
              <label for="register-name" class="label-material">Nombre Completo</label>
            </div>
            <div class="form-group-material">
              <input id="register-username" type="text" name="usernameReg" autocomplete="off" required data-msg="Please enter your username" class="input-material">
              <label for="register-username" class="label-material">Usuario</label>
            </div>
            <div class="form-group-material">
              <input id="register-email" type="text" name="emailReg" autocomplete="off" required data-msg="Please enter a valid email address" class="input-material">
              <label for="register-email" class="label-material">Correo electrónico</label>
            </div>
            <div class="form-group-material">
              <input id="register-password" type="password" name="passwordReg" autocomplete="off" required data-msg="Please enter your password" class="input-material">
              <label for="register-password" class="label-material">Contraseña </label>
            </div>
            <div class="errorMsg"><?php echo $errorMsgReg; ?></div>
            <div class="form-group text-center">
              <input type="submit" class="btn btn-primary" name="signupSubmit" value="Signup">
            </div>
          </form><small>Ya tiene una cuenta? </small><a href="index.php" class="signup">Login</a>
        </div>
        <div class="copyrights text-center">
          <p>Desarrollado por <a href="https://www.iconplus..net" class="external">ICON S.A.</a></p>
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