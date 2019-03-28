<?php

// 1. first option: check cake order =====================
   function bakerwork($bakerwork, $conn){
   if ( $bakerwork === 'check') {
      // 1.1check order
      checkorder($conn);
 //  2. update cake order status=================
  } else if ($bakerwork === "updateorder") {
    // 1.2 show update order option
      updateorderoption();
 // 3. update caketype info====================
  } else if ($bakerwork === "updatecake") {
   // 1.3 update cake option
     updatecakeoption();
  }
}
// 1. first option: check cake order  end=====================

      // 1.1 checkorder============================
        function checkorder($conn) {
          $sql = "SELECT o.confirmNum confirmNum, c.cakeID cakeID, o.pquantity pquantity, o.orderDate orderDate
                  FROM CakeOrder o, Contains c
                  WHERE o.confirmNum = c.confirmNum AND o.status = 'pending'";
         $cakeorder = $conn->query($sql);
         if ($cakeorder->num_rows > 0) {
           echo "<table class='ordertable table table-striped'>
                     <thead>
                       <tr>
                         <th scope='col'>confirmNum</th>
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
        }
        // 1.1 checkorder end============================

        //1.2 show updateorder============
        function updateorderoption() {
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
        }
        //1.2 show updateorder end============

        // 1.3 show update cake option========
        function updatecakeoption() {
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
       // 1.3 show update cake option end==========



       // 2 update cake order
       function updateorderstatus($confirmNumber, $conn) {
         // update sql
         if (isset($confirmNumber)) {
           // keep the option in page
           updateorderoption();
           // sql
           $checkConfirNumsql = "SELECT * FROM CakeOrder Where confirmNum = '$confirmNumber' and status = 'pending'";
           $findOrder = $conn->query($checkConfirNumsql);
           if ($findOrder->num_rows > 0) {
             $updateorderstatusql = "UPDATE CakeOrder SET status = 'Cake is ready.' WHERE confirmNum = '$confirmNumber'";
             $conn->query($updateorderstatusql);
             echo "<h5>Update cake order status successfully.</h5>";
           } else {
             echo "<h5>Wrong confirm number, please try again. </h5>";
           }
         }
       }
       // 2 update cake order

       // 3 update cake info_ topping ingredients
       function updatecakeinfo($cakename, $topping, $ingredients, $conn) {

         if (isset($cakename)) {
           // keep the option in page
           updatecakeoption();
           // sql
           $checkcaknamesql = "SELECT * FROM CakeType WHERE cname = '$cakename'";
           $checkcakename = $conn->query($checkcaknamesql);
           if ($checkcakename->num_rows > 0) {
             if ($topping === "" && $ingredients === "") {
               echo "<div class='container'><h5>Topping and Ingredients can not be empty.</h5> </div>";
             } else if ($topping !== "" && $ingredients === "") {
               $toppingsql = "UPDATE CakeType SET topping = '$topping' WHERE cname = '$cakename'";
               $conn->query($toppingsql);
               echo "<div class='container'><h5>Update cake topping successfully.</h5></div>";
             } else if ($topping === "" && $ingredients !== "") {
               $ingredientsql = "UPDATE CakeType SET ingredients = '$ingredients' WHERE cname = '$cakename'";
               $conn->query($ingredientsql);
               echo "<div class='container'><h5>Update cake ingredients successfully.</h5></div>";
             } else {
               $bothsql = "UPDATE CakeType SET ingredients = '$ingredients' , topping = '$topping' WHERE cname = '$cakename'";
               $conn->query($bothsql);
               echo "<div class='container'><h5>Update cake topping and ingredients successfully.</h5></div>";
             }
           } else {
             echo "<div class='container'><h5>Wrong cake name, please try again. </h5></div>";
           }
         }
       }
 ?>
