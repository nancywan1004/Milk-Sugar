<?php

        function managerwork($managerwork) {

       // 1. check company status =====================
          if ( $managerwork === 'check') {
           checkoption();
        //  2. update delivery team =================
      } else if ($managerwork === "hire") {
            hireoption();
        // 3. update caketype info====================
         } else if ($managerwork === "updatecake") {
           updatecakeoption();
         } else if ($managerwork === "dataanalysis") {
           dataanalysisoption();
         }
        }

      function checkoption() {
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
                      <option value="deletereviewoption">DeleteBadReview</option>

                      </select>
                      <button type="submit" class="managercheckbutton button btn-success button-contactForm" >Check</button>
                    </div>
            </div>
            </div>
        </form>';
      }

      function checkworkoption($checkwork, $conn){
        if (isset($checkwork)) {
          // keep the check option
          checkoption();
          // check delivery team ======
          if ($checkwork === 'deliveryteam') {
            checkdeliveryteam($conn);
          } else if ($checkwork === 'cakeorder') {
              // check cake all order
              checkcakeorder($conn);
          } else if ($checkwork === 'customerinfo') {
            // check all customers info
              checkcustomerinfo($conn);
          } else if ($checkwork === 'cakereview') {
            // check all cake review
              checkreview($conn);
          } else if ($checkwork === 'deletereviewoption') {
            //  show the form of delete review
              deletereviewoption();
          }
        }
      }

      function hireoption(){
        echo "
        <a name='hiredeliveryperson-section'></a>
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
                <button type='submit'  class='btn btn-primary mb-2 bakerupdateorder'>AddOne</button>
              </div>
            </div>
          </form>
          </div>";
      }

      function updatecakeoption() {
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

      function checkdeliveryteam($conn) {
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
      }

      function checkcakeorder($conn) {
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
      }

      function checkcustomerinfo($conn) {
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
      }

      function checkreview($conn) {
        $sql = "SELECT reviewID,score, custID, cname, comment
                from Review_Write  order by cname";
        $review = $conn->query($sql);
        if ($review->num_rows > 0) {
          echo "<table style='text-align:center' class='ordertable table table-striped'>
                    <thead>
                      <tr>
                      <th scope='col'>reviewID</th>
                        <th scope='col'>CakeName</th>

                        <th scope='col'>score</th>
                        <th scope='col'>comment</th>
                        <th scope='col'>customerID</th>
                      </tr>
                    </thead>";

          while ($row = $review->fetch_assoc()) {
            echo   "<tbody>
                        <tr>
                          <th scope='row'>".$row["reviewID"]."</th>
                          <td>".$row["cname"]."</td>
                          <td>".$row["score"]."</td>
                          <td>".$row["comment"]."</td>
                          <td>".$row["custID"]."</td>
                        </tr>
                      </tbody>";
          }
          echo "</table>";
        }

      }

      function hiredelivery($phonenum, $deliveryname, $conn){
        if (isset($phonenum) && isset($deliveryname) && strlen($phonenum) == 10) {
            //1001
            hireoption();
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
            hireoption();
          echo "<h5>Please insert the right form of phone.</h5>";
        }
      }

      function addnewcake($cakename, $ingredients, $flavour, $topping, $conn){
        if (isset($cakename)) {
          updatecakeoption();
          $checkcakenamesql = "SELECT * FROM CakeType WHERE cname = '$cakename'";
          $checkcakename = $conn->query($checkcakenamesql);
          if (strlen($cakename) == 0 || $checkcakename->num_rows > 0) {
            echo "<div class='container'><h5>Please insert a correct cake name.</h5></div>";
          } else {
            $addnewcakesql = "INSERT INTO CakeType VALUES ('$cakename','$ingredients','$flavour','$topping')";
            $conn->query($addnewcakesql);
            echo "<div class='container'><h5>Add a new cake type successfully.</h5></div>";

          }
        }
      }

      function dataanalysisoption() {
        echo '<form class=" form-inline menu_filter" method="POST" action="manager.php">

            <div class="row">
                <div class="form-group input-flavour">
                    <div class="constainerofcheckstatus col-12">
                      <h5>Which analysis do you want to check: </h5>
                      <select name="analysis" >
                      <option value="bestsell">BestSell</option>

                      <option value="bestreputation">BestReputation</option>
                      <option value="bestcustomer">BestCustomer</option>
                      </select>
                      <button type="submit" class="managercheckbutton button btn-success button-contactForm" >Check</button>
                    </div>
            </div>
            </div>
        </form>';
      }

      function dataanalysis($analysis, $conn){
        if (isset($analysis)) {
          dataanalysisoption();
        }
        if ($analysis === 'bestsell') {
          bestsell($conn);

        } else if ($analysis === 'bestreputation') {
          bestreputation($conn);
        } else if ($analysis === 'bestcustomer') {
          bestcustomer($conn);
        }
      }


      function bestsell($conn) {
        $sql = "SELECT c.cname cname, sum(o.pquantity) sum
                from Contains cc, Cake c, CakeOrder o
                where c.cakeID = cc.cakeID and cc.confirmNum = o.confirmNum and o.status <> 'pending'
                group by c.cname
                having sum(o.pquantity) >= all (select sum(o1.pquantity) FROM Contains cc1, Cake c1, CakeOrder o1
                where c1.cakeID = cc1.cakeID and cc1.confirmNum = o1.confirmNum and o1.status <> 'pending'
                group by c1.cname)";
        $review = $conn->query($sql);
        if ($review->num_rows > 0) {
          echo "<table style='text-align:center' class='ordertable table table-striped'>
                    <thead>
                      <tr>
                        <th scope='col'>Best Sell CakeName</th>

                        <th scope='col'>Total Sell</th>

                      </tr>
                    </thead>";

          while ($row = $review->fetch_assoc()) {
            echo   "<tbody>
                        <tr>
                          <th scope='row'>".$row["cname"]."</th>

                          <td>".$row["sum"]."</td>
                        </tr>
                      </tbody>";
          }
          echo "</table>";
        }
      }

      function bestreputation($conn) {
        $sql = "SELECT rw.cname cname, AVG(rw.score) avg
                from Review_Write rw
                group by rw.cname
                having avg(rw.score) >= all (select avg(rw1.score)
                                              from Review_Write rw1
                                              GROUP by rw1.cname)";
        $review = $conn->query($sql);
        if ($review->num_rows > 0) {
          echo "<table style='text-align:center' class='ordertable table table-striped'>
                    <thead>
                      <tr>
                        <th scope='col'>Best Reputation CakeName</th>

                        <th scope='col'>Average Score</th>

                      </tr>
                    </thead>";

          while ($row = $review->fetch_assoc()) {
            echo   "<tbody>
                        <tr>
                          <th scope='row'>".$row["cname"]."</th>

                          <td>".$row["avg"]."</td>
                        </tr>
                      </tbody>";
          }
          echo "</table>";
        }
      }

      function bestcustomer($conn) {
        $sql = "SELECT * from Customer2 c
        where not EXISTS (select * from Cake o
        where not EXISTS (select * from Contains cc
        where c.custID = cc.custID and o.cakeID = cc.cakeID))";
        $review = $conn->query($sql);
        if ($review->num_rows > 0) {
          echo "<h5>Customer who bought all kinds of cakes: </h5>
          <table style='text-align:center' class='ordertable table table-striped'>
                    <thead>
                      <tr>
                        <th scope='col'>Best Customer ID</th>
                        <th scope='col'>Name</th>
                        <th scope='col'>Phone Number</th>

                        <th scope='col'>Address</th>

                      </tr>
                    </thead>";

          while ($row = $review->fetch_assoc()) {
            echo   "<tbody>
                        <tr>
                          <th scope='row'>".$row["custID"]."</th>
                          <td>".$row["name"]."</td>
                          <td>".$row["phoneNum"]."</td>
                          <td>".$row["address"]."</td>

                        </tr>
                      </tbody>";
          }
          echo "</table>";
        }
      }

      function deletereviewoption() {
        echo "
        <div class='container '>
        <h4>Please insert the reviewID to delete a review information:</h4>
        <form action='manager.php' method='POST'>

            <div class='updatecake form-row align-items-center'>
              <div class='cakename col-auto'>

                <input type='text' name='deletereview' class=' form-control mb-4' id='inlineFormInput' placeholder='Review ID'>
              </div>
              <div class='col-auto'>

              <div class='updatecakesubmit col-auto'>
                <button type='submit' style='background:#52af52' class=' btn btn-primary mb-2 bakerupdateorder'>Delete</button>
              </div>
            </div>

          </form>
          </div>";
      }

     function deletereview ($review, $conn) {
       if (isset($review)) {
         // show checkoption table
         checkoption();
         // sql
         // check review id
         $checkreviewsql = "SELECT * FROM Review_Write WHERE reviewID = '$review'";
         $checkreview = $conn->query($checkreviewsql);
         if ( $checkreview->num_rows > 0) {
         // delete review id
         $deletereviewsql = "DELETE FROM Review_Write WHERE reviewID = '$review'";
         $conn->query($deletereviewsql);
         echo "<div class='container'><h5>Delete a review (ReviewID: ".$review.")  successfully.</h5></div>";
       } else {
         deletereviewoption();
         echo "<div class='container'><h5>Please insert the correct review ID.</h5></div>";
       }
     }
   }
 ?>
