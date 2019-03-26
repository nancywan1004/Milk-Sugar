
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
              <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
              <li class="nav-item active"><a class="nav-link" href="menu.php">Our Menu</a>
              <li class="nav-item"><a class="nav-link" href="orderstatus.php">Track Your Cake</a></li>
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



            // 1. check company status =====================
               if ( $managerwork === 'check') {
                 echo '<form class=" form-inline menu_filter" method="POST" action="manager.php">

                     <div class="row">
                         <div class="form-group input-flavour">
                             <div class="constainerofcheckstatus col-12">
                               <h5>Which status do you want to check: </h5>
                               <select name="checkwork" >
                               <option value="deliveryteam">DeliveryTeam</option>
                               <option value="cakeorder">CakeOrder</option>
                               <option value="customerinfo">CustomerInfo</option>
                               <option value="cakereview">CakeReview</option>
                               </select>
                               <button type="submit" class="managercheckbutton button btn-success button-contactForm" >Check</button>
                             </div>
                     </div>
                     </div>
                 </form>';
             //  2. update delivery team =================
           } else if ($managerwork === "hire") {
                echo "
                   <div class='hirecontainer container'>
                <h4>Please insert new delivery person's phone number and name :</h4>

                <form action='manager.php' method='POST'>
                    <div class='updateorder form-row align-items-center'>
                      <div class='col-auto'>

                        <input type='Number' name='phonenum' class='form-control mb-2' id='inlineFormInput' placeholder='Phone Number'>
                      </div>
                      <div class='col-auto'>

                        <input type='text' name='deliveryname' class='form-control mb-2' id='inlineFormInput' placeholder='Name'>
                      </div>

                      <div class='col-auto'>
                        <button type='submit' class='btn btn-primary mb-2 bakerupdateorder'>AddOne</button>
                      </div>
                    </div>
                  </form>
                  </div>";
             // 3. update caketype info====================
              } else if ($managerwork === "updatecake") {
                echo "
                <div class='container updatecakecontainer'>
                <h4>Please insert the cake name, topping, flavour and ingredients to add a new cake information:</h4>
                <form action='manager.php' method='POST'>

                    <div class='updatecake form-row align-items-center'>
                      <div class='cakename col-auto'>

                        <input type='text' name='cakename' class=' form-control mb-4' id='inlineFormInput' placeholder='New Cake Name'>
                      </div>
                      <div class='col-auto'>

                      <input type='text' name='topping' class=' form-control mb-4' id='inlineFormInput' placeholder='New Topping'>
                      </div>

                     <div class='col-auto'>
                      <input type='text' name='flavour' class=' form-control mb-4' id='inlineFormInput' placeholder='New Flavour'>
                      </div>

                      <input type='text' name='ingredients' class='ingredientstext form-control mb-3' id='inlineFormInput' placeholder='New Ingredients'>
                      </div>

                      <div class='updatecakesubmit col-auto'>
                        <button type='submit' style='background:#52af52' class=' btn btn-primary mb-2 bakerupdateorder'>New Cake Information</button>
                      </div>
                    </div>

                  </form>
                  </div>";
              }
            //  1. sql of check all status   ====================
                @$checkwork = $_POST['checkwork'];
                if (isset($checkwork)) {
                  // keep the check option
                  echo '<form class=" form-inline menu_filter" method="POST" action="manager.php">
                      <div class="row">
                          <div class="form-group input-flavour">
                              <div class="constainerofcheckstatus col-12">
                                <h5>Which status do you want to check: </h5>
                                <select name="checkwork" >
                                <option value="deliveryteam">DeliveryTeam</option>
                                <option value="cakeorder">CakeOrder</option>
                                <option value="customerinfo">CustomerInfo</option>
                                <option value="cakereview">CakeReview</option>
                                </select>
                                <button type="submit" class="managercheckbutton button btn-success button-contactForm" >Check</button>
                              </div>
                      </div>
                      </div>
                  </form>';
                  // check delivery team ======
                  if ($checkwork === 'deliveryteam') {
                    $sql = "SELECT phoneNum, dname from Delivery_Person order by dname";
                    $deliveryteam = $conn->query($sql);
                    if ($deliveryteam->num_rows > 0) {
                      echo "<table style='text-align:center' class='ordertable table table-striped'>
                                <thead>
                                  <tr>
                                    <th scope='col'>Name</th>
                                    <th scope='col'>phoneNumber</th>
                                  </tr>
                                </thead>";

                      while ($row = $deliveryteam->fetch_assoc()) {
                        echo   "<tbody>
                                    <tr>
                                      <th scope='row'>".$row["dname"]."</th>
                                      <td>".$row["phoneNum"]."</td>
                                    </tr>
                                  </tbody>";
                      }
                      echo "</table>";
                    }
                  } else if ($checkwork === 'cakeorder') {
                      // check cake all order
                      $sql = "SELECT o.confirmNum confirmNum, cc.CustID custID, o.orderDate orderDate, cc.CakeID cakeID, o.pquantity pquantity, o.totalPrice totalPrice, o.cancelDate cancelDate, o.status statu
                              FROM CakeOrder o, Contains cc, Cake c
                              WHERE o.confirmNum = cc.confirmNum and  cc.cakeID = c.cakeID
                              order by orderDate
                              ";
                      $cakeorder = $conn->query($sql);
                      if ($cakeorder->num_rows > 0) {
                        echo "<table style='text-align:center' class='ordertable table table-striped'>
                                  <thead>
                                    <tr>
                                      <th scope='col'>confirmNum</th>
                                      <th scope='col'>customerID</th>
                                      <th scope='col'>orderDate</th>
                                      <th scope='col'>cakeID</th>
                                      <th scope='col'>pquantity</th>
                                      <th scope='col'>totalPrice</th>
                                      <th scope='col'>status</th>
                                      <th scope='col'>cancelDate</th>
                                    </tr>
                                  </thead>";

                        while ($row = $cakeorder->fetch_assoc()) {
                          echo   "<tbody>
                                      <tr>
                                        <th scope='row'>".$row["confirmNum"]."</th>
                                        <td>".$row["custID"]."</td>
                                          <td>".$row["orderDate"]."</td>
                                            <td>".$row["cakeID"]."</td>
                                              <td>".$row["pquantity"]."</td>
                                                <td>".$row["totalPrice"]."</td>
                                                  <td>".$row["statu"]."</td>
                                                    <td>".$row["cancelDate"]."</td>
                                      </tr>
                                    </tbody>";
                        }
                        echo "</table>";
                      }
                  } else if ($checkwork === 'customerinfo') {
                    // check all customers info
                    $sql = "SELECT * from Customer2 order by custID";
                    $customerinfo = $conn->query($sql);
                    if ($customerinfo->num_rows > 0) {
                      echo "<table style='text-align:center' class='ordertable table table-striped'>
                                <thead>
                                  <tr>
                                    <th scope='col'>customerID</th>
                                    <th scope='col'>phoneNumber</th>
                                    <th scope='col'>name</th>
                                    <th scope='col'>address</th>
                                  </tr>
                                </thead>";

                      while ($row = $customerinfo->fetch_assoc()) {
                        echo   "<tbody>
                                    <tr>
                                      <th scope='row'>".$row["custID"]."</th>
                                      <td>".$row["phoneNum"]."</td>
                                      <td>".$row["name"]."</td>
                                      <td>".$row["address"]."</td>
                                    </tr>
                                  </tbody>";
                      }
                      echo "</table>";
                    }
                  } else if ($checkwork === 'cakereview') {
                    // check all cake review
                    $sql = "SELECT score, custID, cname, comment
                            from Review_Write  order by cname";
                    $review = $conn->query($sql);
                    if ($review->num_rows > 0) {
                      echo "<table style='text-align:center' class='ordertable table table-striped'>
                                <thead>
                                  <tr>
                                    <th scope='col'>CakeName</th>

                                    <th scope='col'>score</th>
                                    <th scope='col'>comment</th>
                                    <th scope='col'>customerID</th>
                                  </tr>
                                </thead>";

                      while ($row = $review->fetch_assoc()) {
                        echo   "<tbody>
                                    <tr>
                                      <th scope='row'>".$row["cname"]."</th>

                                      <td>".$row["score"]."</td>
                                      <td>".$row["comment"]."</td>
                                      <td>".$row["custID"]."</td>
                                    </tr>
                                  </tbody>";
                      }
                      echo "</table>";
                    }
                  }


                }
                //  check company status end =====

                // hire delivery person ===================
                @$phonenum = $_POST['phonenum'];
                @$deliveryname = $_POST['deliveryname'];
                if (isset($phonenum) && isset($deliveryname) && strlen($phonenum) == 10) {
                  // both phone num and deliveryname must be not Empty
                  //1 check phone is not use
                  $checkphonesql = "SELECT * FROM Delivery_Person
                                    WHERE phoneNum = '$phonenum'";
                  $checkphone = $conn->query($checkphonesql);
                  if ($checkphone->num_rows > 0) {
                    echo "<h5>The phone number has already have, please insert a correct phone number.</h5>";
                  } else {
                    // 1.1 phone is not use
                    $newdeliverysql = "INSERT INTO Delivery_Person VALUES ('$phonenum', '$deliveryname')";
                    $conn->query($newdeliverysql);
                    echo "<h5>Welcome ".$deliveryname."!</h5>";
                  }
                } else if (isset($phonenum) && strlen($phonenum) !== 10) {
                  echo "<h5>Please insert the right form of phone.</h5>";
                }
                // hire delivery person end

                // add new cake type
                @$cakename = $_POST['cakename'];
                @$topping = $_POST['topping'];
                @$flavour = $_POST['flavour'];
                @$ingredients = $_POST['ingredients'];

                //3.1 check cake name
                if (isset($cakename)) {
                  $checkcakenamesql = "SELECT * FROM CakeType WHERE cname = '$cakename'";
                  $checkcakename = $conn->query($checkcakenamesql);
                  if ($checkcakename->num_rows > 0) {
                    echo "<h5>The cake name has already have, please insert a correct cake name.</h5>";
                  } else {
                    $addnewcakesql = "INSERT INTO CakeType VALUES ('$cakename','$ingredients','$flavour','$topping')";
                    $conn->query($addnewcakesql);
                    echo "<h5>Add a new cake type successfully.</h5>";
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
