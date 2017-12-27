<?php 
	require "conex.php";	
	require "funcoes.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registra Saída Veículo</title>
	<script src="js/jquery-3.1.1.min.js"></script>
</head>
<body>
	<?php require "info_cpf_placa.php"; ?>
	Data Saida<input type="date" name="data" id="data"><br />
	Hora Saida<input type="time" name="hora_saida" id="hora"><br />
	<button onclick="sai('<?= $idVeiculo; ?>');">Registrar Saída</button>

</body>
</html>
	
<script type="text/javascript">
	function sai(idVeiculo){
		if (document.getElementById('data').value != '' && document.getElementById('hora').value != '') {
			$.ajax({
				type:'POST',
				url:'sql_saida_veiculo.php',
				data:{
					idVeiculo:<?= $idVeiculo; ?>,
					data:document.getElementById('data').value,
					hora:document.getElementById('hora').value
				},
				beforeSend: function(){

				},
				success: function(veio){
					alert(veio);
					location.href='index.php';
				}
			});
		}else{
			alert('campos DATA ENTRADA e HORA ENTRADA são de preenchimento obrigatorio...');			
		}
			
	}
</script>
	