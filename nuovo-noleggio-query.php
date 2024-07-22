<?php include_once('config.php');
if(isset($_REQUEST['action']) and $_REQUEST['action']=="addDataRow"){
	?>
	<tr>
		<td align="center" class="text-danger"><button type="button" data-toggle="tooltip" data-placement="right" title="Click To Remove" onclick="if(confirm('Sei sicuro di voler cancellare?')){$(this).closest('tr').remove();}" class="btn btn-danger"><i class="fa fa-fw fa-trash-alt"></i></button></td>
		<td align="center"><?php echo date('Y-m-d H:i:s');?></td>
		<td>
		<select name="usercountry[]" id="usercountry" class="form-control selectpicker" data-live-search="true" data-size="10" required="required">
			<option value="">Seleziona</option>
			<?php
				$result	=	$db->query("SELECT * FROM articoli WHERE 1 ORDER BY desart ASC ");
				while($val  =   $result->fetch_assoc()){
				?>
				<option value="<?php echo $val['desart']?>" data-subtext="(<?php echo $val['categoria']?>)"><?php echo mb_strtoupper($val['desart'],'UTF-8')?></option>
			<?php }?>
		</select>
		</td>
<td><input type="number" name="username[]" class="form-control" required="required"></td>
	</tr>
	<?php
	echo '|***|addmore';
}


if(isset($_REQUEST['action']) and $_REQUEST['action']=="saveAddMore"){
	extract($_REQUEST);
    $numord = $_POST['numord'];
    $returndate = $_POST['returndate'];
    $cliuser = $_POST['user'];
    $queryusername = 'SELECT * FROM users WHERE username = "'.$cliuser.'"';
    $resultusername = mysqli_query($db, $queryusername);
    $rowid = mysqli_fetch_assoc($resultusername);
    $idcli= $rowid['id'];
	foreach($username as $key=>$un){
		$db->query('INSERT INTO ordini VALUES (NULL, now(), "'.$usercountry[$key].'","'.$un.'", "'.$un.'", "'.$idcli.'", "'.$returndate.'", "'.$numord.'", "active", NULL, 0) ');
	}
	echo '<div class="alert alert-success"><i class="fa fa-fw fa-thumbs-up"></i> Record added successfully!</div>|***|add';
}
