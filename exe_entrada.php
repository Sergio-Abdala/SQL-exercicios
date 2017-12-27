<?php 
	require "conex.php";
	require "info_cpf_placa.php";
	require "funcoes.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>executa entrada veículo</title>
	<script src="js/jquery-3.1.1.min.js"></script>
	<style type="text/css">
		a{
			cursor: pointer;
		}
	</style>
</head>
<body>
	<br />
	
		Data Entrada<input type="date" name="data" id="data"><br />
		Hora Entrada<input type="time" name="hora_entrada" id="hora"><br />

		<button onclick="mostrar_tabela();">Selecionar <small> Patio/Estacionamento</small></button>
	
	<div id="tabela_end" style="display: none;">
		<h3>Selecione o patio para locação do veículo...</h3>tes
	
<?php  	
		# mostrar patios
		//
		$patio = mysqli_query($conex, "SELECT * FROM patio;")or die("erro = ".mysqli_error($conex));
		echo "<table><thead>
			<tr><td>Endereço</td><td>Vagas</td></tr>
		</thead><tbody>";

		while ($voltou = mysqli_fetch_array($patio)) {
			$voltou['idPatio'];
			$voltou['endereco'];
			$voltou['capacidade'];
			//função que recebe idPatio e retorna razão entre vagas e veiculos-estacionados
			echo "<tr><td><a onclick='patio(`".$voltou['idPatio']."`);'>".$voltou['endereco']."</a></td>";
			echo "<td style='text-align:right;'><button onclick='patio(`".$voltou['idPatio']."`);'>".capacidade($conex, $voltou['idPatio'])."</button></td><tr>";
		}
		echo "</tbody></table>";
		//
		if (isset($_GET['idPatio'])) {
			echo "<script>ajaks();</script>";
		}
?>

	</div>

</body>
</html>
<script type="text/javascript">
	function mostrar_tabela(){
		document.getElementById('tabela_end').style='';
	}
	function ajaks(){
		alert('inicio ajax, kkk');
	}
	function patio(idPatio){
		//alert('id patio: '+idPatio+' id veiculo <?= $idVeiculo; ?> data: '+document.getElementById('data').value+' hora: '+document.getElementById('hora').value);
		//realizar registro na tabela estacionamento
		if (document.getElementById('data').value != '' && document.getElementById('hora').value != '') {
			$.ajax({
				type:'POST',
				url:'sql_entrada_veiculo.php',
				data:{
					idPatio:idPatio,
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