<?php include_once('config.php'); ?>

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

<title>QBEB - Nuovo Ordine</title>


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
</head>

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<?php include_once('header.php'); ?>

</br>
</br>


<div class="container">

		<?php
		$result	=	$db->query("SELECT * FROM users ORDER BY username ASC ");
		while($val  =   $result->fetch_assoc()){
			$counrtyName[$val['id']]	=	$val['username'];
		}
		?>
		<script>
		$(document).ready(function(e) {
			$('.selectpicker').selectpicker();
			
			$('body').on('mousemove',function(){
				$('[data-toggle="tooltip"]').tooltip();
			});
			
			$("#addmore").on("click",function(){
				$.ajax({
					type:'POST',
					url:'nuovo-noleggio-query.php',
					data:{'action':'addDataRow'},
					success: function(data){
						$('#tb').append(data);
						$('.selectpicker').selectpicker('refresh');
						$('#save').removeAttr('hidden',true);
					}
				});
			});
			
			$("#form").on("submit",function(){
				$.ajax({
					type:'POST',
					url:'nuovo-noleggio-query.php',
					data:$(this).serialize(),
					success: function(data){
						var a	=	data.split('|***|');
						if(a[1]=="add"){
							$('#mag').html(a[0]);
							setTimeout(function(){location.reload();},1500);
						}
					}
				});
			});
			
		});

		</script>
		<form id="form" method="post" onSubmit="return false;">
			<input type="hidden" name="action" value="saveAddMore">
			<table class="table table-bordered table-striped" id="sortable">
				<thead>
					<tr>
						<th>Azione</th>
						<th class="text-center">Data</th>
						<th>Articolo</th>
						<th>Qta</th>

					</tr>
				</thead>
				<tbody id="tb">
					<?php 
					$result	=	$db->query("SELECT * FROM ordini WHERE id = 0 ORDER BY id ASC ");
					if($result->num_rows>0){
						$s	=	'';
						while($val  =   $result->fetch_assoc()){
							$s++;  ?>
						<tr>
							<td align="center"><?php echo $s;?></td>
							<td align="center"><?php echo date($val['datains']); ?></td>
<td><?php echo mb_strtoupper($val['desart'],'UTF-8'); ?></td>
<td><?php echo mb_strtoupper($val['qta'],'UTF-8'); ?></td>
						</tr>
						<?php
						}
					}else{ ?>
					<tr>
						<strong></strong>
					</tr>
					<?php } ?>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="6">
							<a href="javascript:;" class="btn btn-danger" id="addmore"><i class="fa fa-fw fa-plus-circle"></i> Inserisci</a>
							</td>
					</tr>
				</tfoot>
			</table>



<div class="row mt-3">
<div class="col">

<input name="user" id="user" class="form-control" required list="brow">
<datalist id="brow">
    <option value="">Seleziona cliente</option>
   
    <?php
        $select_all_users = "SELECT * FROM users ORDER BY username ASC";
        $select_all_user_result = mysqli_query($db, $select_all_users);
    while($row_users = mysqli_fetch_assoc($select_all_user_result)){
        ?>
             <option value="<?php echo $row_users['username']; ?>"> <?php echo $row_users['username']; ?> </option>
        <?php
    }
    ?>
</datalist>
<small>Cliente</small>
</div>
<div class="col">
    <input type="date" class="form-control" name="returndate" id="returndate" required>
    <small>Data di restituzione</small>
</div>
<div class="col">
    <input type="number" class="form-control" name="numord" id="numord" required>
    <small>Numero ordine</small>
</div>
</div>


<button type="submit" name="save" id="save" value="save" class="btn btn-primary" hidden><i class="fa fa-fw fa-save"></i> Salva</button>




		</form>
		
    </div> <!--/.container-->


</br>

	
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    
</body>
</html>
