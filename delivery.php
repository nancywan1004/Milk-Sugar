
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
               if ( $transporterwork === 'check') {
                 $sql = "SELECT o.confirmNum confirmNum, c.phoneNum customerPhoneNum, d.del_date deliveryDate, d.del_location deliveryLocation
from CakeOrder o, Contains cc, Customer2 c, Delivery_Fulfill d
where o.confirmNum = cc.confirmNum and o.confirmNum = d.confirmNum and o.status = 'Cake is ready.' and c.custID = cc.custID
order by deliveryDate";
                $cakeorder = $conn->query($sql);
                if ($cakeorder->num_rows > 0) {
                  echo "<table style='text-align:center' class='ordertable table table-striped'>
                            <thead>
                              <tr>
                                <th scope='col'>confrimNum</th>
                                <th scope='col'>customerPhoneNum</th>
                                <th scope='col'>deliveryDate</th>
                                <th scope='col'>deliveryLocation</th>
                              </tr>
                            </thead>";

                  while ($row = $cakeorder->fetch_assoc()) {
                    echo   "<tbody>
                                <tr>
                                  <th scope='row'>".$row["confirmNum"]."</th>
                                  <td>".$row["customerPhoneNum"]."</td>
                                  <td>".$row["deliveryDate"]."</td>
                                  <td>".$row["deliveryLocation"]."</td>
                                </tr>
                              </tbody>";
                  }
                  echo "</table>";

                } else {
                  echo "<h4>Bad business today...</h4>";
                }
             //  2. update cake delivery order status=================
              } else if ($transporterwork === "updateorder") {
                echo "<h4>Please insert the confirm number to update cake status:</h4>

                <form action='delivery.php' method='POST'>
                    <div class='updateorder form-row align-items-center'>
                      <div class='col-auto'>

                        <input type='Number' name='confirmNum' class='form-control mb-2' id='inlineFormInput' placeholder='Confirm Number'>
                      </div>

                      <div class='col-auto'>
                        <button type='submit' class='btn btn-primary mb-2 bakerupdateorder'>Update Cake Status</button>
                      </div>
                    </div>
                  </form>";
             // 3. update delivery person info====================
           } else if ($transporterwork === "updatephonenum") {
                echo " <h4>Please insert your old phone number and new phone number to update your information:</h4>
                <form action='delivery.php' method='POST'>

                    <div class='oldphone form-row align-items-center'>
                      <div class='cakename col-auto'>

                        <input type='number' name='oldphonenum' class=' form-control mb-2' id='inlineFormInput' placeholder='Old Phone Number'>
                      </div>
                      <div class='col-auto'>

                      <input type='number' name='newphonenum' class=' form-control mb-2' id='inlineFormInput' placeholder='New Phone Number'>
                      </div>

                      <div class='updatephonesubmit col-auto'>
                        <button type='submit' class=' btn btn-primary mb-2 bakerupdateorder'>Update Information</button>
                      </div>
                    </div>

                  </form>";
              }
              // get all store address
              else if ($transporterwork === "allstore") {
                $sql = "SELECT address from Location";
               $address = $conn->query($sql);
               if ($address->num_rows > 0) {
                 echo "<table style='text-align:center' class='storeaddress ordertable table table-striped'>
                           <thead>
                             <tr>
                               <th scope='col'>Store Address</th>
                             </tr>
                           </thead>";

                 while ($row = $address->fetch_assoc()) {
                   echo   "<tbody>
                               <tr>
                                 <th scope='row'>".$row["address"]."</th>
                               </tr>
                             </tbody>";
                 }
                 echo "</table>";

               } else {
                 echo "<h4>Can not connect to the server.</h4>";
               }
              }
            //   sql of update cakeorder status   ====================
                @$confirmNumber = $_POST['confirmNum'];
                if (isset($confirmNumber)) {
                  $checkConfirNumsql = "SELECT * FROM CakeOrder Where confirmNum = '$confirmNumber' and status = 'Cake is ready.'";
                  $findOrder = $conn->query($checkConfirNumsql);
                  if ($findOrder->num_rows > 0) {
                    $updateorderstatusql = "UPDATE CakeOrder SET status = 'finished' WHERE confirmNum = '$confirmNumber'";
                    $conn->query($updateorderstatusql);
                    echo "<h5>Update cake order status successfully.</h5>";
                  } else {
                    echo "<h5>Wrong confirm number, please try again. </h5>";
                  }
                }

          //     sql of update delivery phone number
                @$oldphonenum = $_POST['oldphonenum'];
                @$newphonenum = $_POST['newphonenum'];
                if (isset($oldphonenum)) {
                  $checkphonenumsql = "SELECT * FROM Delivery_Person WHERE phoneNum = '$oldphonenum'";
                  $checkphonenum = $conn->query($checkphonenumsql);
                  if ($checkphonenum->num_rows > 0) {
                    if ($newphonenum === "" || strlen($newphonenum) !== 10  ) {
                      echo "<h5>Please insert the correct new phone number.</h5>";
                    } else {
                      $updatesql = "UPDATE Delivery_Person SET phoneNum = '$newphonenum' WHERE phoneNum = '$oldphonenum'";
                      $conn->query($updatesql);
                      echo "<h5>Update information successfully.</h5>";
                    }
                  } else {
                    echo "<h5>Wrong old phone number, please try again. </h5>";
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
