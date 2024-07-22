<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap-color.min.css" >

  <!-- Additional CSS -->
  <link rel="stylesheet" href="css/main.css" >

  <title>Dettaglio ordine</title>
</head>
<body>
<?php
require_once('config.php');
//session_start();


$borrowid = $_GET['numord'];

$select_borrow_data = "SELECT * FROM ordini WHERE numord = '$borrowid'";
$select_borrow_data_result = mysqli_query($db, $select_borrow_data);
$row_borrow_data = mysqli_fetch_assoc($select_borrow_data_result);

//$equipmentid = $row_borrow_data['equipmentid'];
$userid = $row_borrow_data['idcliente'];
$returndate = $row_borrow_data['returndate'];


//$select_all_equipment = "SELECT * FROM `equipment` WHERE id = '$equipmentid' ORDER BY id DESC LIMIT 1";
//$select_all_equipment_result = mysqli_query($con, $select_all_equipment);
//$row_equipments = mysqli_fetch_assoc($select_all_equipment_result);

//$equipment_title = $row_equipments['equipment'];
//$equipment_price = $row_equipments['price'];
//$equipment_category = $row_equipments['category'];


$select_all_users = "SELECT * FROM users WHERE id = '$userid' ORDER BY id DESC LIMIT 1";
$select_all_user_result = mysqli_query($db, $select_all_users);
$row_users = mysqli_fetch_assoc($select_all_user_result);

$user_name = $row_users['username'];
//$user_mobile = $row_users['mobile'];
//$user_nic = $row_users['nic'];

$today = date('Y-m-d');

$datetime1 = strtotime($today);
$datetime2 = strtotime($returndate);

$calculate_seconds = $datetime2 - $datetime1;// == <seconds between the two times>
$days = floor($calculate_seconds / (24 * 60 * 60 ));
    
    include('header.php')
?>
<div class="container">
<a class="btn btn-success btn-sm" href="storico_ordini.php" role="button" style="float: right;"> Indietro</a>
</br>
</br>

                      <div class="row">
                       
                        <div class="col-12">
                        
                                                       
                                <div class="row  mt-3">                                    
                                  
                                    <div class="col">
                                    <h2> Numero ordine: <span class="badge badge-secondary"> <?php echo $row_borrow_data['numord']; ?> </span> </h2>
<h3> Cliente: <?php echo $user_name; ?> </h3>
</br>
                                    <h5 class="text-dark"> Data di inizio: <?php echo $row_borrow_data['datains']; ?> </h5>
                                    <h5 <?php if($days < 0){ echo 'class="text-danger"'; }else{ echo 'class="text-success"'; } ?> > Data di fine: <?php echo $row_borrow_data['returndate']; ?> </h5>
<?php
    if($row_borrow_data['status'] != 'finish'){
if($days < 0){
  ?>
 <h1 class="text-danger"> <?php $withouddash =  substr($days, 1); echo $withouddash; ?> Giorni in ritardo </h1>
  <?php
} ?> </div>


<div class="col">
<table class="table">
<thead>
<tr>
<th>Articolo</th>
<th>Qta</th>
</tr>
</thead>
<tbody>
<?php
$result    =    $db->query("SELECT * FROM ordini WHERE numord = '$borrowid'");
while($val  =   $result->fetch_assoc()){
?>
<tr>
<td><?php echo $val['desart']; ?></td>
<td><?php echo $val['qta']; ?></td>
</tr>
<?php
}?>

</tbody>
</table>
<?php
} else {
    ?>
    <h5 class="text-danger"> Data di restituzione: <?php echo $row_borrow_data['finishdate']; ?> </h5>
</div>


<div class="col">
<table class="table">
<thead>
<tr>
<th>Articolo</th>
<th>Qta</th>
<th>Qta restituita</th>
</tr>
</thead>
<tbody>
<?php
$result    =    $db->query("SELECT * FROM ordini WHERE numord = '$borrowid'");
while($val  =   $result->fetch_assoc()){
?>
<tr>
<td><?php echo $val['desart']; ?></td>
<td><?php echo $val['qta']; ?></td>
<td><?php echo $val['returnqta']; ?></td>
</tr>
<?php
}?>

</tbody>
</table>
<?php
}
?>


<?php
 if($row_borrow_data['status'] != 'finish'){
     ?>
 <a class="btn btn-primary " href="fine-noleggio-status1-query.php?numord=<?php echo $borrowid; ?>" role="button">FINE NOLEGGIO</a>
<a class="btn btn-primary " href="ritiro_parziale.php?numord=<?php echo $borrowid; ?>" role="button">RITIRO PARZIALE</a>
                                   
<?php
}
?>
                                    </div>
                                  
                                </div>
                          
                        </div>
                      
                      </div>

                    
                    </div>
                </div>

            </div>
        </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
