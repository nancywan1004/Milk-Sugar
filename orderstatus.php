<?php
session_start();
?>
<!DOCTYPE html>
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
              <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="menu.php">Our Menu</a>
							</li>
              <li class="nav-item active"><a class="nav-link" href="orderstatus.php">Track Your Cake</a></li>
			  <li class="nav-item"><a class="nav-link" href="emLogin.php">Employee Login</a></li>
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
          <form class="form-contact contact_form" method="POST" action="orderstatus.php" id="form1">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                    <input class="form-control" name="confirm#" id="confirm#" type="text" placeholder="Enter Confirmation #">
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
                <button type="submit"  name="track" value="track" class="button button-contactForm" form="form1">Submit</button>
            </div>
          </form>

		  
			<?php
			include 'connect.php';
			$conn = OpenCon();
        //    echo isset($_POST['track']);
			$user_confirm = (isset($_POST['confirm#']) ? $_POST['confirm#'] : null);
            $_SESSION['confirmNum'] = $user_confirm;
           // echo $user_confirm;
            if (isset($_POST['track'])) {
//                echo 'success';
                $query = "SELECT confirmNum, orderDate, status FROM cakeorder WHERE confirmNum = '{$user_confirm}'";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="col-lg-6">
						  <div class="media align-items-center food-card">
							<div class="media-body">
							  <div class="d-flex justify-content-between food-card-title">
								<h4>Confirmation #: ' . $row["confirmNum"] . '</h4>
							  </div>
							  <h3 class="price-tag">Order Date: ' . $row['orderDate'] . '</h3>
							  <form>
								<p>STATUS: ' . $row['status'] . '</p>
							  </form>
							</div>
						  </div>
						</div>';
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
                }
                ?>
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
            <?php
//            @$cancel = $_POST['cancel'];
//            echo $conn->affected_rows;
            $user_confirm = $_SESSION['confirmNum'];
         //   echo !empty($_POST['cancel']);
         //   echo $user_confirm;
                 if (isset($_POST['cancel']))
                 {
                     require 'custcancelorder.php';
                }
                CloseCon($conn);
			?>

        </div>

      </div>
    </div>
  </section>
	<!-- ================ contact section end ================= -->


  
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



  <script>
    var attempt = 3; // Variable to count number of attempts.
    // Below function Executes on click of login button.
    function validate(){
      var username = document.getElementById("username").value;
      var password = document.getElementById("password").value;
      if ( username == "Formget" && password == "formget#123"){
        alert ("Login successfully");
        window.location = "orderstatus.php"; // Redirecting to other page.
        return false;
      }
      else{
        attempt --;// Decrementing by one.
        alert("You have left "+attempt+" attempt;");
// Disabling fields after 3 attempts.
        if( attempt == 0){
          document.getElementById("username").disabled = true;
          document.getElementById("password").disabled = true;
          document.getElementById("submit").disabled = true;
          return false;
        }
      }
    }</script>
  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="vendors/nice-select/jquery.nice-select.min.js"></script>
  <script src="vendors/Magnific-Popup/jquery.magnific-popup.min.js"></script>
  <script src="js/jquery.form.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/contact.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/mail-script.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
<?php
// remove all session variables
session_unset();
// destroy the session
session_destroy();
?>