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
              <h1 class="hero-title">Cake Menu</h1>
              <p>Explore our variety!</p>
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
              <div class="owl-carousel owl-theme w-100 hero-carousel">
                  <div class="hero-carousel-item">
                      <img class="img-fluid" src="img/banner/red-velvet-menu.jpg" alt="">
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
      </div>
   <!--     selection of flavour                      -->
      <form class="form-inline menu_filter" method="POST" action="menu.php">

          <div class="row">
              <div class="form-group input-flavour">
                  <div class="col-12">
                    <h5>Choose a flavour. </h5>
                    <select name="cakeflavour" >
                    <option selected hidden value="none">Flavours</option>
                    <option value="chocolate">Chocolate</option>
                    <option value="matcha">Matcha</option>
                    <option value="strawberry">Strawberry</option>
                    <option value="coffee">Coffee</option>
                    </select>
                  </div>

			</div>
		  <div class="form-group input-flavour">
                  <div class="col-12">
				  <h5>Choose a size. </h5>
                    <select name="cakesize" >
                    <option selected hidden value="none">Size</option>
                    <option value="6">6'</option>
                    <option value="8">8'</option>
                    <option value="10">10'</option>
                    </select>

                  </div>
          </div>
		  <input type='submit' class="button button-contactForm" >
          </div>
      </form>


      <div class="row">
  <!-- all menu from database -->
        <?php
        include 'connect.php';
        $conn = OpenCon();
        @$flavour = $_POST['cakeflavour'];
		@$size = $_POST['cakesize'];
		if (empty($size) or $size == "none") {
			if ((empty($flavour) or $flavour == "none")
				and (empty($size) or $size == "none")) {
			  $sql = "SELECT c.cakeID cakeID,c.cname cname, c.size size, c.price price, ct.ingredients ingredients
					  FROM Cake c, CakeType ct
					  WHERE c.cname = ct.cname
					  ORDER by c.cname";
			} else {
			  $sql = "SELECT c.cakeID cakeID,c.cname cname, c.size size, c.price price, ct.ingredients ingredients
					  FROM Cake c, CakeType ct
					  WHERE c.cname = ct.cname AND ct.flavour = '$flavour'
					  ORDER by c.cname";
			}
		} else if ((empty($flavour) or $flavour == "none")
			and !(empty($size) or $size == "none")) {
          $sql = "SELECT c.cakeID cakeID,c.cname cname, c.size size, c.price price, ct.ingredients ingredients
                  FROM Cake c, CakeType ct
                  WHERE c.cname = ct.cname AND c.size = '$size'
                  ORDER by c.cname";
        } else {
			$sql = "SELECT c.cakeID cakeID,c.cname cname, c.size size, c.price price, ct.ingredients ingredients
                  FROM Cake c, CakeType ct
                  WHERE c.cname = ct.cname AND c.size = '$size' AND ct.flavour = '$flavour'
                  ORDER by c.cname";
		}
        $allCake = $conn->query($sql);
        if ($allCake->num_rows > 0) {
        // output data of each row
        while($row = $allCake->fetch_assoc()) {
          echo '<div class="col-lg-6">
              <div class="media align-items-center food-card">
                <img class="mr-3 mr-sm-4 cakeimg" src="img/home/cakeimg/'.$row['cakeID'].'.png" alt="">
                <div class="media-body">
                  <div class="d-flex justify-content-between food-card-title">
                    <h4>'.$row["cname"].'</h4>
                    <h3 class="price-tag">'.$row['size'].'\' &nbsp  $'.$row['price'].'</h3>
                  </div>
                  <form>
                    <p>'.$row['ingredients'].'</p>
                  </form>
                </div>
              </div>
            </div>';
         }
        }
        CloseCon($conn);
        ?>

      </div>
    </div>
  </section>
  <!--================Food menu section end =================-->



  <!--================CTA section start =================-->
  <section class="cta-area text-center">
    <div class="container">
      <p>We offer a variety of authentic and trendy cakes</p>
      <h2>You gotta try yourself!</h2>
      <a class="button" href="index.php#reserve-section">Order Now</a>
    </div>
  </section>
  <!--================CTA section end =================-->


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
