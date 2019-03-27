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
              <li class="nav-item"><a class="nav-link" href="menu.html">Menu</a>
							</li>
              <li class="nav-item active"><a class="nav-link" href="orderstatus.html">Order</a></li>
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
    <div class="hero-left">
      <h1 class="hero-title">Track Your Order</h1>
      <ul class="hero-info d-none d-md-block">
        <li>
          <img src="img/banner/fas-service-icon.png" alt="">
          <h4>Fast Service</h4>
        </li>
        <li>
          <img src="img/banner/fresh-cake-icon.png" alt="">
          <h4>Fresh Cake</h4>
        </li>
      </ul>
    </div>
    <div class="hero-right">

      <div class="jslogin">
        <h3>Login</h3>
        <form action="orderstatus.php" id="form_id" method="post" name="myform">
          <label>User Name :</label>
          <input type="text" name="username" id="username"/>
          <label>Password :</label>
          <input type="password" name="password" id="password"/>
          <button class="button button-block" name="login" />Log In</button>
          <!--<input type="button" name="login" value="Login" id="submit"/>-->
        </form>
      </div>
    </div>
  </div>
</section>
<!--================Hero Banner Section end =================-->

<!-- ================ contact section start ================= -->
  <section class="section-margin">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Your Order Information</h2>
        </div>
        <div class="col-lg-8">
          <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                    <input class="form-control" name="confirm#" id="confirm#" type="text" placeholder="Enter Confirmation #">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="name" id="name" type="text" placeholder="Enter your name">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="phone#" id="phone#" type="number" placeholder="Enter phone#">
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <button type="submit" class="button button-contactForm">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ contact section end ================= -->

  <!-- ================ contact section start ================= -->
  <section class="section-margin">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Need to cancel your order?</h2>
        </div>
        <div class="col-lg-8">
          <form action="orderstatus.php" id="form_id" method="post" name="myform">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                    <input class="form-control" name="confirm#" id="confirm#" type="text" placeholder="Enter Confirmation #">
                </div>
              </div>
            <div class="form-group mt-3">
              <button class="button button-block" name='cancel' />Cancel</button>
            </div>
          </form>


        </div>
      </div>
    </div>
  </section>
  <!-- ================ contact section end ================= -->


</body>

</html>
