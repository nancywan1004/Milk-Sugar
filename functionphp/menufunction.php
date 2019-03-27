<?php

     function flavouroption() {
       echo ' <form class="form-inline menu_filter" method="POST" action="menu.php">
           <div class="row">
               <div class="form-group input-flavour">
                   <div class="col-12">
                     <h5>Choose your flavour: </h5>
                     <select name="cakeflavour" >
                     <option selected hidden value="none">Flavours</option>
                     <option value="chocolate">Chocolate</option>
                     <option value="matcha">Matcha</option>
                     <option value="strawberry">Strawberry</option>
                     <option value="coffee">Coffee</option>
                     </select>
                     <input type="submit" class="button button-contactForm" >
                   </div>
           </div>
           </div>
       </form>';
     }

    // return result from flavour
     function flavourresult($flavour, $conn) {
       // choose flavour sql
       $sql =  flavoursql($flavour);
       $allCake = $conn->query($sql);

       // show result
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
      }else {
        echo 'Sorry, all cakes are sold out.';
      }
     }


     // choose sql from flavouroption
     function flavoursql($flavour) {
       if (empty($flavour) or $flavour == "none") {
         $sql = "SELECT c.cakeID cakeID,c.cname cname, c.size size, c.price price, ct.ingredients ingredients
                 FROM Cake c, CakeType ct
                 WHERE c.cname = ct.cname
                 ORDER by c.cname, c.price";
       } else {
         $sql = "SELECT c.cakeID cakeID,c.cname cname, c.size size, c.price price, ct.ingredients ingredients
                 FROM Cake c, CakeType ct
                 WHERE c.cname = ct.cname AND ct.flavour = '$flavour'
                 ORDER by c.cname, c.price";
       }
       return $sql;
     }

 ?>
