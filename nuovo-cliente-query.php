<?php

include('config.php');


$name = $_POST['username'];

$insert_user = "INSERT INTO users VALUES (NULL,'$name',NULL,NULL, NULL, now())";
if($db->query($insert_user) === true){
    //echo "New record created successfully";
    header('Location: index.php');
} else{
    echo "ERROR: Could not able to execute $insert_user. " . $data->con->error;
}

?>
