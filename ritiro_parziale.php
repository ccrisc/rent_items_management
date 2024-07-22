<?php
include_once("config.php");
    $borrowid = $_GET['numord'];
    
    $select_borrow_data = "SELECT * FROM ordini WHERE numord = '$borrowid'";
    $select_borrow_data_result = mysqli_query($db, $select_borrow_data);
    $row_borrow_data = mysqli_fetch_assoc($select_borrow_data_result);
     
?>
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

  <title>QBEB - Dettaglio ordine</title>
</head>
<body>
<script type="text/javascript" src="js/jquery.tabledit.js"></script>

<?php include_once('header.php'); ?>

<div class="container">
<a class="btn btn-success btn-sm" href="fine_noleggio.php?numord=<?php echo $borrowid; ?>" role="button" style="float: right;"> Indietro</a>
</br>
</br>
<h2> Numero ordine: <span class="badge badge-secondary"> <?php echo $row_borrow_data['numord']; ?> </span> </h2>
</br>

<div class="container home">
    <table id="data_table" class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Articolo</th>
                <th>Qta std</th>
<th>Ritiro</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql_query = "SELECT * FROM ordini WHERE numord = '$borrowid'";
            $resultset = mysqli_query($db, $sql_query) or die("database error:". mysqli_error($db));
            while( $developer = mysqli_fetch_assoc($resultset) ) {
            ?>
               <tr id="<?php echo $developer ['id']; ?>">
               <td><?php echo $developer ['id']; ?></td>
               <td><?php echo $developer ['desart']; ?></td>
               <td><?php echo $developer ['qta']; ?></td>
               <td><?php echo $developer ['returnqta']; ?></td>
               </tr>
            <?php } ?>
        </tbody>
    </table>
<a class="btn btn-primary " href="fine-noleggio-status2-query.php?numord=<?php echo $borrowid; ?>" role="button">FINE NOLEGGIO</a>
</div>
<script type="text/javascript" src="js/custom_table_edit.js"></script>
</body>
</html>
