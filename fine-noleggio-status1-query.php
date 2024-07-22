<?php

include('config.php');
$borrowid = $_GET['numord'];


$select_borrow_data = "SELECT * FROM ordini WHERE numord = '$borrowid'";
$select_borrow_data_result = mysqli_query($db, $select_borrow_data);
$row_borrow_data = mysqli_fetch_assoc($select_borrow_data_result);


$update_bequipment = "UPDATE ordini SET status = 'finish', finishdate = now(), returncall = '1' WHERE numord = '$borrowid'";
  

if($db->query($update_bequipment) === true){
            //echo "New record created successfully";
        header('Location: storico_ordini.php');
} else{
    echo "ERROR: Could not able to execute $update_bequipment. " . $data->db->error;
}

?>
