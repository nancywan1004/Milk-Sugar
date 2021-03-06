
<?php include 'functionphp/managerfunction.php'; ?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Milk & Sugar </title>
	<link rel="icon" href="img/Fevicon.png" type="image/png">

  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="vendors/Magnific-Popup/magnific-popup.css">

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/menu.css">
  <link rel="stylesheet" href="css/manager.css">

</head>
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
              <!-- <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
              <li class="nav-item active"><a class="nav-link" href="menu.php">Our Menu</a> -->
              <!-- <li class="nav-item"><a class="nav-link" href="index.php">Log Out</a></li> -->

              <form action='baker.php' method='POST'>
               <input type="submit" name='logout' value='logout' />
               </form>
            </ul>

          </div>
        </div>
      </nav>
    </div>
  </header>
  <!--================Header Menu Area =================-->

  <!--================Manager work section start =================-->
  <section class="section-margin">
    <div class="container">
      <div class="section-intro mb-75px">
        <h4 class="intro-title">Welcome back!</h4>
      </div>



   <!--     manager   working area  -->

       <form class="form-inline menu_filter" method="POST" action="manager.php">

           <div class="row">
               <div class="form-group input-flavour">
                   <div class="col-12">
                     <h5>Time to work: </h5>
                     <select name="managerwork" >
                     <option value="check">CheckCompanyStatus</option>
                     <option value="hire">HireTransporter</option>
                     <option value="updatecake">UpdateCakeInfo</option>
                     <option value="dataanalysis">DataAnalysis</option>
                     </select>
                     <input type="submit" class="button button-contactForm" >
                   </div>
           </div>
           </div>
       </form>



         <!-- all menu from database -->
               <?php
            //   error_reporting(0);
            include 'connect.php';
            $conn = OpenCon();
            @$managerwork = $_POST['managerwork'];

                 managerwork($managerwork);
            //  1. sql of check all status   ====================
                @$checkwork = $_POST['checkwork'];
                  checkworkoption($checkwork, $conn);
                //  check company status end =====

                // delete review
                @$deletereview = $_POST['deletereview'];
                  deletereview($deletereview, $conn);

                // hire delivery person ===================
                @$phonenum = $_POST['phonenum'];
                @$deliveryname = $_POST['deliveryname'];
                hiredelivery($phonenum, $deliveryname, $conn);
                // hire delivery person end

                // add new cake type
                @$cakename = $_POST['cakename'];
                @$topping = $_POST['topping'];
                @$flavour = $_POST['flavour'];
                @$ingredients = $_POST['ingredients'];
                addnewcake($cakename, $ingredients, $flavour, $topping, $conn);

                // data analysis
                @$analysis = $_POST['analysis'];
                dataanalysis($analysis, $conn);

               // log out
               // logout
               @$logout = $_POST['logout'];
               if (isset($logout)) {
                 session_start();

                 // remove all session variables
                 session_unset();

                 // destroy session
                 session_destroy();

                 // redirect to new page
                 header("location: index.php");
               }


               CloseCon($conn);
               ?>

     </div>
     </section>


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




  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="vendors/nice-select/jquery.nice-select.min.js"></script>
  <script src="vendors/Magnific-Popup/jquery.magnific-popup.min.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/mail-script.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
