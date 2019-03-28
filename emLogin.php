<!DOCTYPE html>

<?php
/* Main page with two forms */
require 'db.php';
session_start();
?>

<!-- HTML Code -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Milk & Sugar - Track your order</title>
  <link rel="icon" href="img/Fevicon.png" type="image/png">

  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="vendors/Magnific-Popup/magnific-popup.css">

  <link rel="stylesheet" href="css/style.css">
  <link href = "css/bootstrap.min.css" rel = "stylesheet">
  <style>

    .hero-wrapper {
      text-align: center;
      color: black;

      /* The image used */
      background-image: url("img/pastryLogin.png");

      min-height: 380px;

      /* Center and scale the image nicely */
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      position: relative;
    }
    .top-left {
      position: absolute;
      font-size: 400%;
      font-family: "Monaco";

      top: 0%;
      left: 0%;
      transform: translate(-50%, -50%);
    }
    /*container for login form*/
    .center-login {
      position: absolute;
      right: 0;
      margin: 20px;
      max-width: 300px;
      padding: 16px;
      background-color: white;
      opacity: 0.8;

    }

    /* Full-width input fields */
    input[type=text], input[type=password] {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      border: none;
      background: #f1f1f1;
    }

    input[type=text]:focus, input[type=password]:focus {
      background-color: #ddd;
      outline: none;
    }


    /* Set a style for the submit button */
    .btn {
      background-color: #FF0000;
      color: white;
      padding: 16px 20px;
      border: none;
      cursor: pointer;
      width: 100%;
      opacity: 0.9;
}

    .btn {
      opacity: 1;
    }

  </style>
</head>

<?php
// this php code is executed when request method is post
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  // 'login' will refer to button name 'login'
  if (isset($_POST['login'])) {
    // if user clicks login, import login.php
    require 'login.php';

  }
  // if the "cancel' button is clicked, run this script
  if (isset($_POST['cancel'])) {
    require 'cancelOrder.php';

  }

  // add register page if needed
}
?>

<body>
  <!--================ Header Menu Area start =================-->
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container box_1620">
          <a class="navbar-brand logo_h" href="index.php">Milk & Sugar</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav justify-content-end">
              <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="menu.php">Our Menu</a></li>
              <li class="nav-item active"><a class="nav-link" href="orderstatus.php">Track Your Order</a></li>
              <li class="nav-item active"><a class="nav-link" href="emLogin.php">Employee Login</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <!--================Header Menu Area =================-->

  <!--================Hero Banner Section start =================-->
  <section class="hero-banner hero-banner-sm">
  <div class="hero-wrapper">
    <!--<img class="img-fluid" src="img/pastryLogin.png" alt="">-->
    <!--<div class="top-left">Employee Login</div>-->
        <form action="emLogin.php" id="form_id" method="post" name="myform" class="center-login">
          <!--<h1>Login</h1>-->
          <label for="username"><b>Username :</b></label>
          <input type="text" placeholder="Username" name="username" id="username" required/>

          <label for="password"><b>Password :</b></label>
          <input type="password" placeholder="Password" name="password" id="password" required/>

          <button class="btn" name="login" />Log In</button>
        </form>
  </div>
  </section>

  .
  <!--================Hero Banner Section end =================-->

  <!-- ================ start footer Area ================= -->
  <footer class="footer-area section-gap">
      <div class="container">
          <h3> Find us at ... </h3>
          <div class="row">
              <div class="media contact-info">
                  <span class="contact-info__icon"><i class="ti-home"></i></span>
                  <div class="media-body">
                      <h3>310 Cambie St</h3>
                      <p>Richmond, British Columbia</p>
                  </div>
              </div>
              <div class="media contact-info">
                  <span class="contact-info__icon"><i class="ti-home"></i></span>
                  <div class="media-body">
                      <h3>100 Denman St</h3>
                      <p>Vancouver, British Columbia</p>
                  </div>
              </div>
              <div class="media contact-info">
                  <span class="contact-info__icon"><i class="ti-home"></i></span>
                  <div class="media-body">
                      <h3>415 Kingsway St</h3>
                      <p>Burnaby, British Columbia</p>
                  </div>
              </div>
              <div class="media contact-info">
                  <span class="contact-info__icon"><i class="ti-home"></i></span>
                  <div class="media-body">
                      <h3>520 Fraser St</h3>
                      <p>Vancouver, British Columbia</p>
                  </div>
              </div>
          </div>
          <div class="footer-bottom row align-items-center text-center text-lg-left">
              <p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
      </div>
  </footer>
  <!-- ================ End footer Area ================= -->
</body>

</html>
