<?php
$db = mysqli_connect('127.0.0.1','root','Nick19891207','MilkSugar')
or die('Error connecting to MySQL server.');
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Milk & Sugar - Home</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png">

  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="vendors/Magnific-Popup/magnific-popup.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

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
              <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="menu.html">Menu</a>
              <li class="nav-item"><a class="nav-link" href="orderstatus.html">Order</a></li>
            </ul>
              <form method="POST" action="index.php">
           <input type="text" name="cflavour" placeholder="flavour.."/><br />
              </form>
              <div class="search-container">
                  <form method="POST" action="index.php">
                      <button><input type="submit" value="Search" name="SearchFlavour"></button>
                  </form>
              </div>

          </div> 
        </div>
      </nav>
    </div>
  </header>
  <!--================Header Menu Area =================-->

  <!--================Hero Banner Section start =================-->
  <section class="hero-banner">
    <div class="hero-wrapper">
      <div class="hero-left">
        <h1 class="hero-title">Cake the most important thing</h1>
        <div class="d-sm-flex flex-wrap">
          <a class="button button-hero button-shadow" href="#reserve-section">Order Now</a>
        </div>
        <ul class="hero-info d-none d-lg-block">
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
        <div class="owl-carousel owl-theme hero-carousel">
          <div class="hero-carousel-item">
            <img class="img-fluid" src="img/banner/red-velvet-banner.jpg" alt="">
          </div>
          <div class="hero-carousel-item">
            <img class="img-fluid" src="img/banner/matcha-banner.jpg" alt="">
          </div>
          <div class="hero-carousel-item">
            <img class="img-fluid" src="img/banner/strawberry-banner.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================Hero Banner Section end =================-->


  <!--================Food menu section start =================-->  
  <section class="section-margin">
    <div class="container">
      <div class="section-intro mb-75px">
        <h4 class="intro-title">Cake Menu</h4>
        <h2>Delicious cake</h2>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="media align-items-center food-card">
            <img class="mr-3 mr-sm-4" src="img/home/red-velvet.jpg" alt="">
            <div class="media-body">
              <div class="d-flex justify-content-between food-card-title">
                <h4>Red Velvet</h4>
                <h3 class="price-tag">6' $35</h3>
                <h3 class="price-tag">8' $55</h3>
              </div>
                <form>
                    <p>Whales and darkness moving form cattle</p>
                </form>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="media align-items-center food-card">
            <img class="mr-3 mr-sm-4" src="img/home/food1.png" alt="">
            <div class="media-body">
              <div class="d-flex justify-content-between food-card-title">
                <h4>Roasted Marrow</h4>
                <h3 class="price-tag">$32</h3>
              </div>
              <p>Whales and darkness moving form cattle</p>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="media align-items-center food-card">
            <img class="mr-3 mr-sm-4" src="img/home/food1.png" alt="">
            <div class="media-body">
              <div class="d-flex justify-content-between food-card-title">
                <h4>Roasted Marrow</h4>
                <h3 class="price-tag">$32</h3>
              </div>
              <p>Whales and darkness moving form cattle</p>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="media align-items-center food-card">
            <img class="mr-3 mr-sm-4" src="img/home/food1.png" alt="">
            <div class="media-body">
              <div class="d-flex justify-content-between food-card-title">
                <h4>Roasted Marrow</h4>
                <h3 class="price-tag">$32</h3>
              </div>
              <p>Whales and darkness moving form cattle</p>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="media align-items-center food-card">
            <img class="mr-3 mr-sm-4" src="img/home/food1.png" alt="">
            <div class="media-body">
              <div class="d-flex justify-content-between food-card-title">
                <h4>Roasted Marrow</h4>
                <h3 class="price-tag">$32</h3>
              </div>
              <p>Whales and darkness moving form cattle</p>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="media align-items-center food-card">
            <img class="mr-3 mr-sm-4" src="img/home/food1.png" alt="">
            <div class="media-body">
              <div class="d-flex justify-content-between food-card-title">
                <h4>Roasted Marrow</h4>
                <h3 class="price-tag">$32</h3>
              </div>
              <p>Whales and darkness moving form cattle</p>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="media align-items-center food-card">
            <img class="mr-3 mr-sm-4" src="img/home/food1.png" alt="">
            <div class="media-body">
              <div class="d-flex justify-content-between food-card-title">
                <h4>Roasted Marrow</h4>
                <h3 class="price-tag">$32</h3>
              </div>
              <p>Whales and darkness moving form cattle</p>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="media align-items-center food-card">
            <img class="mr-3 mr-sm-4" src="img/home/food1.png" alt="">
            <div class="media-body">
              <div class="d-flex justify-content-between food-card-title">
                <h4>Roasted Marrow</h4>
                <h3 class="price-tag">$32</h3>
              </div>
              <p>Whales and darkness moving form cattle</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================Food menu section end =================-->



  <!--================Reservation section start =================-->
  <a name="reserve-section"></a>
  <section class="bg-lightGray section-padding">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 col-xl-5 mb-4 mb-md-0">
          <div class="section-intro">
            <h4 class="intro-title">Reservation</h4>
            <h2 class="mb-3">Get experience from sneaky</h2>
          </div>
          <p>Him given and midst tree form seas she'd saw give evening one every make hath moveth you're appear female heaven had signs own days saw they're have let midst given him given and midst tree. Form seas she'd saw give evening</p>
        </div>
        <div class="col-md-6 offset-xl-2 col-xl-5">
          <div class="search-wrapper">
            <h3>Order a cake</h3>

            <form class="search-form" action="#">
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Your Name">
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="ti-user"></i></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Email Address">
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="ti-email"></i></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Phone Number">
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="ti-headphone-alt"></i></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Select Date">
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="ti-notepad"></i></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Select People">
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="ti-layout-column3"></i></span>
                  </div>
                </div>
              </div>
              <div class="form-group form-group-position">
                <button class="button border-0" type="submit">Make Reservation</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================Reservation section end =================-->



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
				<div class="col-xl-2 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
					<h4>Quick Links</h4>
					<ul>
						<li><a href="#">Jobs</a></li>
						<li><a href="#">Brand Assets</a></li>
						<li><a href="#">Investor Relations</a></li>
						<li><a href="#">Terms of Service</a></li>
					</ul>
				</div>
				<div class="col-xl-4 col-md-8 mb-4 mb-xl-0 single-footer-widget">
					<h4>Newsletter</h4>
          <p>You can trust us. we only send promo offers,</p>
          
          <div class="form-wrap" id="mc_embed_signup">
            <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
            method="get">
              <div class="input-group">
                <input type="email" class="form-control" name="EMAIL" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '">
                <div class="input-group-append">
                  <button class="btn click-btn" type="submit">
                    <i class="ti-arrow-right"></i>
                  </button>
                </div>
              </div>
              <div style="position: absolute; left: -5000px;">
								<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
							</div>

							<div class="info"></div>
            </form>
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
            window.location = "orderstatus.html"; // Redirecting to other page.
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
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/mail-script.js"></script>
  <script src="js/main.js"></script>
</body>
</html>

<?php
//if (array_key_exists('SearchFlavour', $_POST)) {
//// Get values from the user and insert data into
//// the table.
//    $tuple = array(
//        ":bind1" => $_POST['flavour'],
//    );
//    $alltuples = array(
//        $tuple
//    );
//    mysqli_query($query, $alltuples);
//}
if (isset($_POST['cflavour'])){
    $flavour = mysqli_real_escape_string($db, $_POST['cflavour']);
    $query = "SELECT * FROM CakeType WHERE flavour = '{$flavour}' ";
    mysqli_query($db, $query) or die('Error querying database.');

    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result);

    while ($row = mysqli_fetch_array($result)) {
        echo $row['flavour'] . ' ' . $row['cname'] . ': ' . $row['ingredients'] . ' ' . $row['topping'] .'<br />';
    }
}else{
    echo 'wrong';
}


?>