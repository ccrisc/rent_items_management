<?php
include_once("config.php");
$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {
    $update_field='';
    if(isset($input['gender'])) {
        $update_field.= "returnqta='".$input['gender']."'";
    }
    if($update_field && $input['id']) {
        $sql_query = "UPDATE ordini SET $update_field WHERE id='" . $input['id'] . "'";
        mysqli_query($db, $sql_query) or die("database error:". mysqli_error($db));
    }
}


?>
