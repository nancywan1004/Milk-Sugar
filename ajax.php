<?php
	if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'submit':
            insert();
            break;
        case 'cancel':
            select();
            break;
    }
}

function select() {
    echo "The select function is called.";
    exit;
}

function insert() {
    echo "The insert function is called.";
    exit;
}
		
	/*	
	function select() {
		echo $user_confirm;
        $query2 = "UPDATE CakeOrder set status = 'cancelled', cancelDate = CURRENT_DATE where confirmNum = '{$user_confirm}' ";
        $conn->query($query2);
        date_default_timezone_set('America/Los_Angeles');
        $date = date("Y-m-d H:i:s");
        echo $user_confirm;
        if ($conn->affected_rows == 1) {
			echo "Cancelled successfully on $date.";
        }
                    
        CloseCon($conn);
	}
	*/
?>