<?php
require 'db.php';
$success = session_start();

if($success){
  echo "works";
} else {
  echo "not working";
}


?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Milk & Sugar - Menu</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png">

  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="vendors/Magnific-Popup/magnific-popup.css">

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/menu.css">
  <link rel="stylesheet" href="css/baker.css">

</head>
<body>

  <?php
  // this php code is executed when request method is post
  if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    // 'login' will refer to button name 'login'
    if (isset($_POST['logout'])) {
      // if user clicks login, import login.php
      require 'logout.php';

    }

  }
  ?>


  <?php
    print_r($_SESSION);
  ?>
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
              <li class="nav-item active"><a class="nav-link" href="menu.php">Our Menu</a>
              <li class="nav-item"><a class="nav-link" href="orderstatus.php">Track Your Cake</a></li>
              <!--<li class="nav-item"><a class="nav-link" href="orderstatus.php">Logout</a></li>-->
              <!--<button class="button" name="logout" />Log Out</button>-->
            </ul>

          </div>
        </div>
      </nav>
    </div>
  </header>
  <!--================Header Menu Area =================-->

  <!--================Baker work section start =================-->
  <section class="section-margin">
    <div class="container">
      <div class="section-intro mb-75px">
        <h4 class="intro-title">Welcome back, Baker!</h4>
      </div>

   <!--     baker   working area  -->

       <form class="form-inline menu_filter" method="POST" action="baker.php">

           <div class="row">
               <div class="form-group input-flavour">
                   <div class="col-12">
                     <h5>Time to work: </h5>
                     <select name="bakerwork" >
                     <option value="check">CheckOrder</option>
                     <option value="updateorder">UpdateOrder</option>
                     <option value="updatecake">UpdateCake</option>
                     </select>
                     <input type="submit" class="button button-contactForm" >
                   </div>

           </div>
           </div>
       </form>
       <!-------------================Logout form================----------------->
       <form action="baker.php" method="POST" id="nameform">
         <h5>Finished? Logout here. </h5>
       </form>

      <button type="submit" form="nameform" name="logout">Logout</button>



         <!-- all menu from database -->
               <?php
            //   error_reporting(0);

               include 'connect.php';
               $conn = OpenCon();


               @$bakerwork = $_POST['bakerwork'];



            // 1. check cake order =====================
               if ( $bakerwork === 'check') {
                 $sql = "SELECT o.confirmNum confirmNum, c.cakeID cakeID, o.pquantity pquantity, o.orderDate orderDate
                         FROM CakeOrder o, Contains c
                         WHERE o.confirmNum = c.confirmNum AND o.status is null";
                $cakeorder = $conn->query($sql);
                if ($cakeorder->num_rows > 0) {
                  echo "<table class='ordertable table table-striped'>
                            <thead>
                              <tr>
                                <th scope='col'>confrimNum</th>
                                <th scope='col'>cakeID</th>
                                <th scope='col'>quantity</th>
                                <th scope='col'>orderDate</th>
                              </tr>
                            </thead>";

                  while ($row = $cakeorder->fetch_assoc()) {
                    echo   "<tbody>
                                <tr>
                                  <th scope='row'>".$row["confirmNum"]."</th>
                                  <td>".$row["cakeID"]."</td>
                                  <td>".$row["pquantity"]."</td>
                                  <td>".$row["orderDate"]."</td>
                                </tr>
                              </tbody>";
                  }
                  echo "</table>";

                } else {
                  echo "<h4>Bad business today...</h4>";
                }
             //  2. update cake order status=================
              } else if ($bakerwork === "updateorder") {
                echo "<h4>Please insert the confirm number to update cake status:</h4>

                <form action='baker.php' method='POST'>
                    <div class='updateorder form-row align-items-center'>
                      <div class='col-auto'>

                        <input type='Number' name='confirmNum' class='form-control mb-2' id='inlineFormInput' placeholder='Confirm Number'>
                      </div>

                      <div class='col-auto'>
                        <button type='submit' class='btn btn-primary mb-2 bakerupdateorder'>Update Cake Status</button>
                      </div>
                    </div>
                  </form>";
             // 3. update caketype info====================
              } else if ($bakerwork === "updatecake") {
                echo " <h4>Please insert the cake name, topping and ingredients to update cake information:</h4>
                <form action='baker.php' method='POST'>

                    <div class='updatecake form-row align-items-center'>
                      <div class='cakename col-auto'>

                        <input type='text' name='cakename' class=' form-control mb-2' id='inlineFormInput' placeholder='Cake Name'>
                      </div>
                      <div class='col-auto'>

                      <input type='text' name='topping' class=' form-control mb-2' id='inlineFormInput' placeholder='New Topping'>
                      </div>

                      <input type='text' name='ingredients' class=' form-control mb-2' id='inlineFormInput' placeholder='New Ingredients'>
                      </div>

                      <div class='updatecakesubmit col-auto'>
                        <button type='submit' class=' btn btn-primary mb-2 bakerupdateorder'>Update Cake Information</button>
                      </div>
                    </div>

                  </form>";
              }
            //   sql of update cakeorder status   ====================
                @$confirmNumber = $_POST['confirmNum'];
                if (isset($confirmNumber)) {
                  $checkConfirNumsql = "SELECT * FROM CakeOrder Where confirmNum = '$confirmNumber' and status is NULL";
                  $findOrder = $conn->query($checkConfirNumsql);
                  if ($findOrder->num_rows > 0) {
                    $updateorderstatusql = "UPDATE CakeOrder SET status = 'Cake is ready.' WHERE confirmNum = '$confirmNumber'";
                    $conn->query($updateorderstatusql);
                    echo "<h5>Update cake order status successfully.</h5>";
                  } else {
                    echo "<h5>Wrong confirm number, please try again. </h5>";
                  }
                }

          //     sql of update caketype
                @$cakename = $_POST['cakename'];
                @$topping = $_POST['topping'];
                @$ingredients = $_POST['ingredients'];
                if (isset($cakename)) {
                  $checkcaknamesql = "SELECT * FROM CakeType WHERE cname = '$cakename'";
                  $checkcakename = $conn->query($checkcaknamesql);
                  if ($checkcakename->num_rows > 0) {
                    if ($topping === "" && $ingredients === "") {
                      echo "<h5>Topping and Ingredients can not be empty.</h5>";
                    } else if ($topping !== "" && $ingredients === "") {
                      $toppingsql = "UPDATE CakeType SET topping = '$topping' WHERE cname = '$cakename'";
                      $conn->query($toppingsql);
                      echo "<h5>Update cake topping successfully.</h5>";
                    } else if ($topping === "" && $ingredients !== "") {
                      $ingredientsql = "UPDATE CakeType SET ingredients = '$ingredients' WHERE cname = '$cakename'";
                      $conn->query($ingredientsql);
                      echo "<h5>Update cake ingredients successfully.</h5>";
                    } else {
                      $bothsql = "UPDATE CakeType SET ingredients = '$ingredients' , topping = '$topping' WHERE cname = '$cakename'";
                      $conn->query($bothsql);
                      echo "<h5>Update cake topping and ingredients successfully.</h5>";
                    }
                  } else {
                    echo "<h5>Wrong cake name, please try again. </h5>";
                  }
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
