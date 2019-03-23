<?php
include 'connect.php';
$conn = OpenCon();

$user_confirm = (isset($_GET['confirm#']) ? $_GET['confirm#'] : null);

$query = "SELECT confirmNum, pquantity, orderDate FROM cakeorder WHERE confirmNum = '{$user_confirm}'";

$result = $conn->query($query);
if ($result->num_rows > 0) {
    echo "<table><tr><th class='border-class'>confirmNum</th><th class='border-class'>pquantity</th><th class='border-class'>orderDate</th></tr>";

    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td class='border-class'>".$row["confirmNum"]."</td><td class='border-class'>".$row["pquantity"]."</td><td class='border-class'>".$row["orderDate"]."</td></tr>";
    }
    echo "</table>";
}
else {
    echo "0 results";
}
CloseCon($conn);
?>