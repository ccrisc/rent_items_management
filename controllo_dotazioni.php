<?php
include_once('config.php');
    
?>

<html>
   <head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap-color.min.css" >

<!-- Additional CSS -->
<link rel="stylesheet" href="css/main.css" >

<title>QBEB - Controllo dotazioni</title>
         <style>
            table {
            border-collapse: collapse;
            width: 50%;
            }
            th, td {
            input: "text";
            text-align: left;
            padding: 8px;
            }
            th {
            background-color: #E8E8E8;
            }
            
            tr:hover {background-color: AliceBlue;}
         </style>
   </head>

<body>


<?php include_once('header.php'); ?>

                <div class="row" style="text-align:center;display: block;">

                <form action="controllo_dotazioni.php" method="post">

                   <input name="family" style="  margin: 50px;width: 300px;padding: 5px 35px 5px 5px;font-size: 20px;border: 1px solid #CCC;height: 34px;" list="brow">
<datalist id="brow">

             <?php
                     $query = "SELECT * FROM users ORDER BY username ASC";
                     $result = mysqli_query($db, $query) or die(mysql_error($db)."[".$query."]");
                 while ($row = mysqli_fetch_assoc($result))
                 {
                     echo "<option value='".$row['username']."'>".$row['username']."</option>";
                 }
                 ?>
</datalist>
                   <input class="btn btn-primary" name="search" type="submit" value="Cerca"/>
                </form>
                </div>


<div class="container">
<div class="row">
 
  <div class="col-12">
  
          <div class="row  mt-3">
            
              <div class="col">
   <p>
   <?php
      $family = "";
      if(isset($_POST['family'])) {
         $family = $_POST['family'];
      }

      try {
         $con= new PDO('mysql:host=192.168.1.100:3306;dbname=qbeb', "root", "root");
         $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

         if(!empty($family)) {
             $queryusername = 'SELECT * FROM users WHERE username = "'.$family.'"';
             $resultusername = mysqli_query($db, $queryusername);
             $rowid = mysqli_fetch_assoc($resultusername);
             $idretrieved= $rowid['id'];
        $query = 'SELECT desart, sum(qta) - sum(CASE WHEN returncall=0 THEN 0 ELSE returnqta end) as "difference" FROM ordini WHERE idcliente = "'.$idretrieved.'" GROUP BY desart';

         }
         else {
        $query = "";
         }

         //first pass just gets the column names
         echo "<h2><span class='badge badge-secondary'>" .$family. "</span> </h2><hr/><h5 class='text-dark'> Biancheria in possesso del cliente:</h5> </br>";
         print "<table class='table'>";
         $result = $con->query($query);

         //return only the first row (we only need field names)
         $row = $result->fetch(PDO::FETCH_ASSOC);
         print " <tr>";
        
        print " <th>Articolo</th>";
          print " <th>Q.ta Cliente</th>";
         // end foreach
         print " </tr>";

         //second query gets the data
         $data = $con->query($query);
         $data->setFetchMode(PDO::FETCH_ASSOC);
         foreach($data as $row){
        print " <tr>";
        foreach ($row as $name=>$value){
           print " <td>$value</td>";
        } //end field loop
        print " </tr>";
         } //end record loop
         print "</table>";
      } catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
      } // end try
   ?>
   </p>


</div>
          
            <div class="col">
<?php
    $select_borrow_data = "SELECT COUNT(DISTINCT numord) AS totalorders FROM ordini WHERE idcliente = '$idretrieved'";
    $select_borrow_data_result = mysqli_query($db, $select_borrow_data);
    $row_borrow_data = mysqli_fetch_assoc($select_borrow_data_result);
    
    $select_borrow_data2 = "SELECT COUNT(DISTINCT numord) AS totalorders FROM ordini WHERE idcliente = '$idretrieved' AND status = 'active'";
    $select_borrow_data_result2 = mysqli_query($db, $select_borrow_data2);
    $row_borrow_data2 = mysqli_fetch_assoc($select_borrow_data_result2);

$select_borrow_data4 = "SELECT COUNT(DISTINCT numord) as expired FROM ordini WHERE idcliente = '$idretrieved' AND status = 'active' AND returndate < now()";
$select_borrow_data_result4 = mysqli_query($db, $select_borrow_data4);
$row_borrow_data4 = mysqli_fetch_assoc($select_borrow_data_result4);
?>
</br>
</br>
</br>
</br>
<h5 class="text-dark"  style="padding-left: 120px;"> Totale ordini: <?php echo $row_borrow_data['totalorders']; ?> </h5>
<h5 class="text-dark"  style="padding-left: 120px;"> Ordini attivi: <?php echo $row_borrow_data2['totalorders']; ?> </h5>
<h5 class="text-dark"  style="padding-left: 120px;"> Ordini scaduti: <?php echo $row_borrow_data4['expired']; ?> </h5>
 </div>
</div>
</div>
</div>
</div>
</br>
</br>

</body>

</html>
