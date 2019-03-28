<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Milk & Sugar - Payment</title>
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
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!------------------Header Menu Area End---------------------->

<!--================Hero Banner Section start =================-->
<section class="hero-banner hero-banner-sm">
    <div class="hero-wrapper">
        <div class="hero-left">
            <h1 class="hero-title">Pay your bill</h1>
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
    </div>
</section>
<!--================Hero Banner Section end =================-->

<!--=================Payment Section Start=====================-->
<section class="section-margin">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Payment Details</h2>
                <h4>
                    Total Price: $
                    <?php
                    include 'connect.php';
                    $conn = OpenCon();
                    $totalprice = (isset($_COOKIE['mycookie']) ? $_COOKIE['mycookie']: null);
//                    @$dmethod = $_POST['dmethod'];
//                    if ($dmethod == "Home Delivery") {
//                        $totalprice = $totalprice + 5;
//                    }
                    $_SESSION['price'] = $totalprice;
                    echo $totalprice;
//
                    ?>
                </h4>
            </div>
            <div class="col-lg-8">
                <form class="form-contact contact_form" method="post" action="payment.php">
                    <div class="row">
                        <div class="col-12">
                            <h4>Select Delivery Method: </h4>
                            <select name="dmethod" id="dmethod" onchange="ChangeSelect()">
                                <option selected hidden value="none">Method</option>
                                <option value="Home Delivery">Home Delivery + $5</option>
                                <option value="Pick Up Yourself">Pick Up Yourself</option>
                            </select>
                        </div>
                        <input class="form-control" type="text" id="deldate" name="deldate" placeholder="Delivery Date..">
                        <div class="col-12">
                        <select name="plocation" id="plocation">
                            <option selected hidden value="none">Location</option>
                            <option value="310 Cambie St Richmond">310 Cambie St, Richmond, British Columbia</option>
                            <option value="100 Denman St Vancouver">100 Denman St, Vancouver, British Columbia</option>
                            <option value="415 Kingsway St Burnaby">415 Kingsway St, Burnaby, British Columbia</option>
                            <option value="205 Fraser St Vancouver">205 Fraser St, Vancouver, British Columbia</option>
                        </select>
                    </div>
                        <input class="form-control" type="text" id="pdate" name="pdate" placeholder="Pickup date..">
                        <div class="col-12">
                            <h4>Select Payment Method: </h4>
                            <select name="method" >
                                <option selected hidden value="none">Method</option>
                                <option value="Master Card">Master Card</option>
                                <option value="Credit Card">Credit Card</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="button button-contactForm">Pay</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
<?php
@$method = $_POST['method'];
@$dmethod = $_POST['dmethod'];
@$ddate = $_POST['deldate'];
@$pdate = $_POST['pdate'];
@$plocation = $_POST['plocation'];
$temp_price = $_SESSION["price"];
$useraddress = (isset($_COOKIE['mycookie2']) ? $_COOKIE['mycookie2']: null);
$userphone = (isset($_COOKIE['mycookie3']) ? $_COOKIE['mycookie3']: null);

// echo ''.$temp_price.'';
if (empty($method) or $method == "none") {
    echo "Choose your payment method!";
}
else if (empty($dmethod) or $dmethod == "none"){
    echo "Choose your delivery method!";
}
else {
    $query1 = "SELECT confirmNum FROM CakeOrder where totalPrice = '{$temp_price}'";
    $confirmNum = $conn->query($query1);
    $pid = rand(1, 100);
    static $temp;
    static $temp2;
    if ($confirmNum->num_rows > 0) {
        while ($row = $confirmNum->fetch_assoc()) {
            $query2 = "INSERT INTO Payment_Paid2 VALUES('{$row['confirmNum']}', '{$pid}' , '{$method}')";
            $conn->query($query2);
            $temp = $row['confirmNum'];
        }
        if ($conn->affected_rows == 1) {
            echo 'Success! Your confirmation number is: <strong>#' . $temp . '</strong>';
        }
    }
    if ($dmethod == "Home Delivery") {
        // echo 'home delivery';
        if (!empty($ddate)) {
            // echo 'got it, '.$temp.'';
            $query4 = "UPDATE CakeOrder set totalPrice = '{$temp_price}' + 5 where confirmNum = '{$temp}' ";

            $query3 = "INSERT INTO Delivery_Fulfill VALUES ('{$temp}', '{$ddate}', '{$useraddress}')";
            $conn->query($query4);

            // echo ''.$conn->affected_rows.'';

            $conn->query($query3);
            $temp_price = $temp_price + 5;
            // echo ''.$conn->affected_rows.'';
             echo 'Final price comes to $ ' . $temp_price .' . ';
        }
        else echo "Enter your delivery date!";
    } else {
       // echo $plocation;
        $query6 = "SELECT lid FROM Location where address = '{$plocation}'";
        $lid = $conn->query($query6);
        if ($lid->num_rows > 0){
            while($row2 = $lid->fetch_assoc()) {
                $query5 = "INSERT INTO Pickup_PickedAt VALUES('{$temp}','{$row2['lid']}','{$pdate}')";
                $conn->query($query5);
                $temp2 = $row2['lid'];
            }
            if ($conn->affected_rows == 1) {
                echo 'Pick your cake on'.$pdate.' at '.$temp2.'!';
            }
        }

    }
}
CloseCon($conn);
?>
        </div>
    </div>
</section>
<?php
// remove all session variables
session_unset();
// destroy the session
session_destroy();
?>
<!--======Payment Section End=======-->
<!-- ================ start footer Area ================= -->
<a name="footer-section"></a>
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
                    <h3>205 Fraser St</h3>
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
    function ChangeSelect() {
            var dmethod = document.getElementById("dmethod").value;
           if (dmethod == "Pick Up Yourself") {
               location.href = "#footer-section";
               alert("Choose your location!");
        }else if(dmethod == "Home Delivery"){
               alert("+5$ applied to your order!")
           }
    }
</script>