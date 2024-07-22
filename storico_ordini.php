<?php

require_once('config.php');
session_start();

    $per_page_record = 10;  // Number of entries to show in a page.
    // Look for a GET variable page if not found default is 1.
    if (isset($_GET["page"])) {
        $page  = $_GET["page"];
    }
    else {
      $page=1;
    }

    $start_from = ($page-1) * $per_page_record;

$select_borrow_data = "SELECT max(idcliente) as idcliente, max(datains) as datains, max(returndate) as returndate, numord, max(status) as status FROM ordini GROUP BY numord ORDER BY numord DESC LIMIT $start_from, $per_page_record";
$select_borrow_data_result = mysqli_query($db, $select_borrow_data);



?>

<!doctype html>
<html>
  <head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap-color.min.css" >

    <!-- Additional CSS -->
    <link rel="stylesheet" href="css/main.css" >

    <title>Storico ordini</title>
  </head>
  <body>

<?php include('header.php'); ?>
</br>
<div class="container">
                      <div class="row">
                       
                      <div class="col-12">

                            <table class="table" >
                                <thead class="thead-dark">
                                    <tr>                               
                                        <th scope="col">Ordine</th>
                                        <th scope="col">Cliente</th>
                                        <th scope="col">Data inizio</th>
                                        <th scope="col">Data restituzione</th>
                                        <th scope="col">Stato</th>
                                        <th scope="col">Azioni</th>
                                    </tr>
                                </thead>
<tbody>
<?php
  while ($row = mysqli_fetch_array($select_borrow_data_result)) {
      $userid = $row['idcliente'];

       $select_all_users = "SELECT * FROM users WHERE id = '$userid' ORDER BY id DESC LIMIT 1";
       $select_all_user_result = mysqli_query($db, $select_all_users);
      $row_users = mysqli_fetch_assoc($select_all_user_result);

       $user_name = $row_users['username'];
      // $user_nic = $row_users['nic'];
        // Display each field of the records.
  ?>
<tr>
<td><?php echo $row['numord']; ?></td>
<td><?php echo $user_name; ?></td>
<td><?php echo $row['datains']; ?></td>
<td><?php echo $row['returndate'];

$today = date('Y-m-d');
$returnday = $row['returndate'];

$datetime1 = strtotime($today);
$datetime2 = strtotime($returnday);

$calculate_seconds = $datetime2 - $datetime1;// == <seconds between the two times>
$days = floor($calculate_seconds / (24 * 60 * 60 ));

if($days < 0){
?> <span class="badge badge-danger"> Scaduto  </span> <?php

}else{
?> <span class="badge badge-success"> In Corso  </span> <?php
}
?></td>
<td> <?php

if($row['status'] == 'finish'){
?> <span class="badge badge-success"> Finito  </span> <?php

}else{
?> <span class="badge badge-warning"> Attivo  </span> <?php
}

?> </td>

<?php
if($row_borrow_data['status'] != 'finish'){
?> <td align="center"> <a class="btn btn-dark btn-sm" href="fine_noleggio.php?numord=<?php echo $row['numord']; ?>" role="button">Dettaglio</a> </td> <?php

} else {
?> <td align="center"> <a class="btn btn-dark btn-sm" href="fine_noleggio.php?numord=<?php echo $row['numord']; ?>" role="button">Dettaglio</a> </td> <?php
  
  }
  ?>


</tr>
  <?php
      };
  ?>
</tbody>
                            </table>
                            </div>
</div>
</br>
<div class="pagination" style="display: flex;justify-content: center;align-items: center;">
 <?php
   $query = "SELECT COUNT(*) FROM ordini";
   $rs_result = mysqli_query($db, $query);
   $row = mysqli_fetch_row($rs_result);
   $total_records = $row[0];
     
echo "</br>";
   // Number of pages required.
   $total_pages = ceil($total_records / $per_page_record);
   $pagLink = "";
 
   if($page>=2){
       echo "<a href='storico_ordini.php?page=".($page-1)."'>  Precedente </a>";
   }
              
   for ($i=1; $i<=$total_pages; $i++) {
     if ($i == $page) {
         $pagLink .= "<a class = 'active' href='storico_ordini.php?page="
                                           .$i."'>".$i." </a>";
     }
     else  {
         $pagLink .= "<a href='storico_ordini.php?page=".$i."'>
                                           ".$i." </a>";
     }
   };
   echo $pagLink;

   if($page<$total_pages){
       echo "<a href='storico_ordini.php?page=".($page+1)."'>  Successivo </a>";
   }

 ?>
 </div>
</br>
</br>
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
