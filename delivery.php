<?php include 'functionphp/deliveryfunction.php'; ?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Milk & Sugar</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png">

  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="vendors/Magnific-Popup/magnific-popup.css">

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/menu.css">
  <link rel="stylesheet" href="css/delivery.css">

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
              <li class="nav-item "><a class="nav-link" href="menu.php">Our Menu</a> -->
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

  <!--================Delivery Person work section start =================-->
  <section class="section-margin">
    <div class="container">
      <div class="section-intro mb-75px">
        <h4 class="intro-title">Welcome back, Transporter!</h4>
      </div>

   <!--     delivery person   working area  -->

       <form class="form-inline menu_filter" method="POST" action="delivery.php">

           <div class="row">
               <div class="form-group input-flavour">
                   <div class="col-12">
                     <h5>Time to work: </h5>
                     <select name="transporterwork" >
                     <option value="check">CheckDeliveryOrder</option>
                     <option value="updateorder">UpdateOrder</option>
                     <option value="updatephonenum">ChangePhoneNum</option>
                     <option value="allstore">AllStoreInfo</option>
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

               @$transporterwork = $_POST['transporterwork'];

            // 1. check cake delivery order =====================
               deliverywork($transporterwork, $conn);
            //   sql of update cakeorder status   ====================
                @$confirmNumber = $_POST['confirmNum'];
                updatecakestatus($confirmNumber, $conn);

          //     sql of update delivery phone number
                @$oldphonenum = $_POST['oldphonenum'];
                @$newphonenum = $_POST['newphonenum'];
                updatephone($oldphonenum,$newphonenum,$conn);

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
			<div class="row">
                <div class="col-lg-4">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>Buttonwood, California.</h3>
                            <p>Rosemead, CA 91770</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3><a href="tel:454545654">00 (440) 9865 562</a></h3>
                            <p>Mon to Fri 9am to 6pm</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3><a href="mailto:support@colorlib.com">support@colorlib.com</a></h3>
                            <p>Send us your query anytime!</p>
                        </div>
                    </div>
                </div>
				<!-- <div class="col-xl-2 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
					<h4>Quick Links</h4>
					<ul>
						<li><a href="#">Jobs</a></li>
						<li><a href="#">Brand Assets</a></li>
						<li><a href="#">Investor Relations</a></li>
						<li><a href="#">Terms of Service</a></li>
					</ul>
				</div> -->

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
