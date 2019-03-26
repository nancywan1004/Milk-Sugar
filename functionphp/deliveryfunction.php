<?php

// 1.  delivery work option ===========================
      function deliverywork($transporterwork, $conn){
        if ( $transporterwork === 'check') {
          // return all order
          checkorder($conn);
      //  1.2. update cake delivery order status=================
       } else if ($transporterwork === "updateorder") {
         updatecakestatusoption();
      // 3. update delivery person info====================
    } else if ($transporterwork === "updatephonenum") {
         updatephoneoption();
       }
       // get all store address
       else if ($transporterwork === "allstore") {
         getallstore($conn);
       }
      }
      // 1. delivery work option end ============================

     // 1.1 check order ================
      function checkorder($conn){
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
    }
      // 1.1 check order end ===========

      // 1.2 update cake delivery order status==
      function updatecakestatusoption() {
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
      }

      // 1.3 update phone number option
      function updatephoneoption() {
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

      // 1.4 out put all the store address
      function getallstore($conn) {
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

      // update cake status function =============
      function updatecakestatus($confirmNumber, $conn) {
        if (isset($confirmNumber)) {
          // keep same page
          updatecakestatusoption();
          // sql
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
      }

      // update phone number ===========
      function updatephone($oldphonenum,$newphonenum, $conn) {
        if (isset($oldphonenum)) {
          // keep same page
          updatephoneoption();
          // sql
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
      }
 ?>
