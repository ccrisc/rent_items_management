$(document).ready(function(){
	$('#data_table').Tabledit({
		deleteButton: false,
		editButton: false,   		
		columns: {
		  identifier: [0, 'id'],                    
		  editable: [[3, 'gender']]
		},
		hideIdentifier: true,
		url: 'ritiro-parziale-query.php'		
	});
});