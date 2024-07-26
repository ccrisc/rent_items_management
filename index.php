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

  <title>MY SHOP</title>

</head>
<body>

<?php
    include_once('config.php');
include('header.php');
?>

<div class="container">
                      <div class="row">
                        <div class="col-md-4 col-12">

                        <div class="card border-dark  mb-3" style="max-width: 18rem;">
                         
                            <div class="card-body text-dark ">

                            <div class="row">
                                <div class="col-4">
                                    <img src="img/equipment.png" alt="equipment" class="img-fluid">
                                </div>
                                <dic class="col-8">
                                    <h5 class="card-title"> <strong>ORDINI ATTIVI</strong> </h5>
                                    <h4 class="card-text"><?php
                                        $select_borrow_data2 = "SELECT COUNT(DISTINCT numord) AS totalorders FROM ordini WHERE status = 'active'";
                                        $select_borrow_data_result2 = mysqli_query($db, $select_borrow_data2);
                                        $row_borrow_data2 = mysqli_fetch_assoc($select_borrow_data_result2);
                                        echo $row_borrow_data2['totalorders']; ?></h4>
                                </dic>
                            </div>                                
                               
                            </div>
                        </div>

                        </div>

                        <div class="col-md-4 col-12">

                        <div class="card border-dark  mb-3" style="max-width: 18rem;">
                         
                            <div class="card-body text-dark ">

                            <div class="row">
                                <div class="col-4">
                                    <img src="img/user.png" alt="equipment" class="img-fluid">
                                </div>
                                <dic class="col-8">
                                    <h5 class="card-title"> <strong>ORDINI SCADUTI</strong> </h5>
<h4 class="card-text"><?php
    $querydate= "SELECT CAST(now() AS date) AS datetoday";
    $querydate2 =mysqli_query($db, $querydate);
    $midquery = mysqli_fetch_assoc($querydate2);
$todaydate= $midquery['datetoday'];
    $select_borrow_data3 = "SELECT COUNT(DISTINCT numord) as expiredorders FROM ordini WHERE status = 'active' and returndate < '$todaydate'";
                                       // $select_borrow_data3 = "SELECT COUNT(DISTINCT numord) as expiredorders FROM ordini WHERE status = 'active' and returndate < now()";
                                        $select_borrow_data_result3 = mysqli_query($db, $select_borrow_data3);
                                        $row_borrow_data3 = mysqli_fetch_assoc($select_borrow_data_result3);
                                        echo $row_borrow_data3['expiredorders']; ?></h4>
                                </dic>
                            </div>                                
                               
                            </div>
                        </div>

                        </div>

                        <div class="col-md-4 col-12">

                        <div class="card border-dark  mb-3" style="max-width: 18rem;">
                         
                            <div class="card-body text-dark ">

                            <div class="row">
                                <div class="col-4">
                                    <img src="img/money.png" alt="equipment" class="img-fluid">
                                </div>
                                <dic class="col-8">
                                    <h5 class="card-title"> <strong>IN SCADENZA OGGI </strong> </h5>
<h4 class="card-text"><?php
    $querydate= "SELECT CAST(now() AS date) AS datetoday";
    $querydate2 =mysqli_query($db, $querydate);
    $midquery = mysqli_fetch_assoc($querydate2);
$todaydate= $midquery['datetoday'];
$select_borrow_data4 = "SELECT COUNT(DISTINCT numord) as expiretoday FROM ordini WHERE status = 'active' and returndate = '$todaydate'";
$select_borrow_data_result4 = mysqli_query($db, $select_borrow_data4);
$row_borrow_data4 = mysqli_fetch_assoc($select_borrow_data_result4);
echo $row_borrow_data4['expiretoday']; ?></h4>
                                </dic>
                            </div>                                
                               
                            </div>
                        </div>

                        </div>

                      </div>

                      

                    </div>
                </div>

            </div>
        </div>
    </div>

</br>
<div class="col">
<button id="myBtn" class="btn btn-warning">aggiungi cliente</button>

<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p><div class="col-12">
<form method="POST" action="nuovo-cliente-query.php">
<span> <strong> Aggiungi nuovo cliente </strong> </span>

    <div class="row mt-3">
        
        <div class="col">
        <input type="text" class="form-control" name="username" placeholder="Nome e Cognome" required>
        </div>
        <div class="col">
        <button type="submit" class="btn btn-primary btn-block" name="adduser">Aggiungi</button>
        </div>
    </div>
</form>
</div></p>
  </div>

<!--
</div>
</div>
</div>
-->

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
