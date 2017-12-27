<?php  
	session_start();
	require "conex.php";
	require "funcoes.php";
	header ('Content-type: text/html; charset=UTF-8');

	if (isset($_GET['msg'])) {
		echo "<script>alert('".utf8_decode($_GET['msg'])."');</script>";
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>[BD2] - Lista 02</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<style type="text/css">
		a{
			cursor: pointer;
		}
		p{
			cursor: pointer;
		}

	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<?php include "modal.php"; ?>
			<div class="col-xs-12 col-md-6">	
				<a href="triggers/">triggers</a>&nbsp;&nbsp;&nbsp;<a href="lista03/">lista 3</a>			
				<h4>Considere o modelo ER abaixo e respondas as questões fazendo uso dos JOINS vistos em aula.</h4>	
				<button class="btn btn-primary" onclick="mostrar(`diagrama`);">modelo ER</button> 
				<button class="btn btn-info" onclick="mostrar(`tabelas`);">tabelas <small>Inseri Cliente</small></button> 
				<!-- botões ENTRADA E SAIDA de veiculos -->
				<button type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#saida">Saida Veículo</button> <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#entrada">Entrada Veículo</button>

				<!--button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button-->

				<img src="img/lista_2.jpg" id="diagrama">


				<div id="tabelas">
					<?php  
						$cliente = mysqli_query($conex, "SELECT * FROM cliente;")or die("erro = ".mysqli_error($conex));
						$veiculo = mysqli_query($conex, "SELECT veiculo.placa,veiculo.cor,veiculo.ano,modelo.descricao FROM veiculo INNER JOIN modelo ON(veiculo.idModelo = modelo.idModelo);")or die("erro = ".mysqli_error($conex));
						$estacionamento = mysqli_query($conex, "SELECT * FROM estacionamento INNER JOIN patio on(patio.idPatio = estacionamento.idPatio);")or die("erro = ".mysqli_error($conex));
						
					?>
					<!--//tabela clientes -->
					<h3>Clientes <a onclick="inserir_cliente();" ><small> Inserir Cliente...</small></a></h3>					
					<table class="table table-condensed">
						<thead>
							<tr>
								<th>nome</th><th>cpf</th><th>data nascimento</th>
							</tr>
						</thead>
						<tbody>
						<?php while ($retorno = mysqli_fetch_array($cliente)) { ?>
							<tr>
							<?php
							echo "<td>".$retorno['nome']."</td>";
							echo "<td>".$retorno['cpf']."</td>";
							echo "<td>".$retorno['dataNascimento']."</td>";
							echo "</tr>";
						}	?>	
						</tbody>
					</table>
					<!--//tabela veiculos -->
					<h3>veiculo</h3>
					<table class="table table-condensed">
							<thead>
								<tr>
									<th>Placa</th><th>Cor</th><th>Ano</th><th>Descrição</th>
								</tr>
							</thead>
							<tbody>
							<?php while($vorta = mysqli_fetch_array($veiculo)): ?>
								<tr>
									<td><?= $vorta['placa']; ?></td><td><?= $vorta['cor']; ?></td><td><?= $vorta['ano']; ?></td><td><?= $vorta['descricao']; ?></td>
								</tr>
							<?php endwhile; ?>
							</tbody>
					</table>
					<h3>condição estacionamento</h3>
					<table class="table table-condensed">
							<thead>
								<tr>
									<th>Data Entrada</th><th>Data Saída</th><th>Hora Entrada</th><th>Hora Saída<td>endereço</td><td>Capacidade</td><td>vagas</td></th>
								</tr>
							</thead>
							<tbody>
							<?php while($vorta = mysqli_fetch_array($estacionamento)): ?>
								<tr>
									<td><?= $vorta['dataEntrada']; ?></td><td><?= $vorta['dataSaida']; ?></td><td><?= $vorta['horaEntrada']; ?></td><td><?= $vorta['horaSaida']; ?></td><td><?= $vorta['endereco']; ?></td><td class="text-right"><?= $vorta['capacidade']; ?></td><td class="text-right"><?= capacidade($conex, $vorta['idPatio']); ?></td>
								</tr>
							<?php endwhile; ?>
							</tbody>
					</table>
				</div>				
			</div>

			<div class="col-xs-12 col-md-6">
				<div id="questao"></div>
				  <div class="form-group">
				    <label for="query">Query:</label>
				    <textarea class="form-control" id="query" rows="7" placeholder="INSIRA SUA CONSULTA SQL AQUI..."></textarea>
				  </div>
				  <button onclick="tezao();" class="btn btn-default">Executar...</button>
				
				<div id="imprimi_query"></div>

				<h3>lista 02 de exercicios...</h3>
				<a href="#questao"><p onclick="questao(1);" class="text-primary">1) Exiba a placa e o nome dos donos de todos os veículos.</p></a>
				<a href="#questao"><p onclick="questao(2);" class="text-primary">2) Exiba o nome de todos os clientes, que possuem ou não carros.</p></a>
				<a href="#questao"><p onclick="questao(3);" class="text-primary">3) Exiba o nome de todos os clientes que possuem um carro.</p></a>
				<a href="#questao"><p onclick="questao(4);" class="text-primary">4) Exiba o nome de todos os clientes que não possuem carro.</p></a>
				<a href="#questao"><p onclick="questao(5);" class="text-primary">5) Exiba o CPF e o nome do cliente que possui o veículo de placa “RMF-1304”.</p></a>
				<a href="#questao"><p onclick="questao(6);" class="text-primary">6) Exiba a Placa e a Cor do veículo que possui o código de estacionamento "4".</p></a>
				<a href="#questao"><p onclick="questao(7);" class="text-primary">7) Exiba a Placa, o ano e a Descrição de seu modelo, se ele possuir ano a partir de 2005.</p></a>
				<a href="#questao"><p onclick="questao(8);" class="text-primary">8) Exiba o endereço, a data de entrada e data de saída dos estacionamentos do veículo de placa “JAB-0006”.</p></a>
				<a href="#questao"><p onclick="questao(9);" class="text-primary">9) Exiba a quantidade de vezes que os veículos de cor “Laranja” estacionaram.</p></a>
				<a href="#questao"><p onclick="questao(10);" class="text-primary">10) Liste o nome de todos os clientes que possuem um veículo de modelo “3”.</p></a>
				<a href="#questao"><p onclick="questao(11);" class="text-primary">11) Liste as placas, os horários de entrada e saída dos veículos da cor “Vermelho”.</p></a>
				<a href="#questao"><p onclick="questao(12);" class="text-primary">12) Liste todos os estacionamentos do veículo de placa “AEB-3232”.</p></a>
				<a href="#questao"><p onclick="questao(13);" class="text-primary">13) Exiba o nome e a cor do veículo do cliente que possui o veículo cujo código de estacionamento seja “3”.</p></a>
				<a href="#questao"><p onclick="questao(14);" class="text-primary">14) Exiba o CPF dos clientes que possuam um veículo cuja descrição seja “Veículo leve - Carro esportivo importado - Marca BMW”.</p></a>

			</div>
		</div>
	</div>

</body>
</html>
<script type="text/javascript">
	function mostrar(id){
		// escondendo tudo
		$('#diagrama').hide();
		$('#tabelas').hide();
		//mostra...
		$('#'+id).show();
	}
	function inserir_cliente(){		
		// chama modal
		$('#in_cliente').modal('show');
		//$('#imprimi-query').html('inserir modal....');
	}
	function tezao(){
		var sql = ($('#query').val());
		if (sql != '') {
			$.ajax({
				type:'POST',
				url:'ver_sql.php',
				data:{sql:sql},
				beforeSend: function(){

				},
				success: function(retorno){
					$('#imprimi_query').html(retorno);
				}
			});
		}else{
			alert('consulta vazia...');
		}
	}
	function sql(sql){		
		if (sql != '') {
			$.ajax({
				type:'POST',
				url:'ver_sql.php',
				data:{sql:sql},
				beforeSend: function(){

				},
				success: function(retorno){
					$('#imprimi_query').html(retorno);
				}
			});
		}else{
			alert('consulta vazia...');
		}
	}
	function questao(num){
		switch(num){
			case 1:
				$('#questao').html('<p class="text-danger"><strong>1) Exiba a placa e o nome dos donos de todos os veículos.</strong></p><button class="pull-right btn btn-success" onclick="sql(`select placa,nome from cliente inner join veiculo on(cliente.idCliente=veiculo.idCliente)`)">RESPOSTA</button>');
			break;
			case 2:
				$('#questao').html('<p class="text-danger"><strong>2) Exiba o nome de todos os clientes, que possuem ou não carros.</strong></p><button class="pull-right btn btn-success" onclick="sql(`SELECT nome FROM cliente;`)">RESPOSTA</button>');
			break;
			case 3:
				$('#questao').html('<p class="text-danger"><strong>3) Exiba o nome de todos os clientes que possuem um carro.</strong></p><button class="pull-right btn btn-success" onclick="sql(`SELECT nome FROM cliente INNER JOIN veiculo ON veiculo.idCliente=cliente.idCliente`)">RESPOSTA</button>');
			break;
			case 4:
				$('#questao').html('<p class="text-danger"><strong>4) Exiba o nome de todos os clientes que não possuem carro.</strong></p><button class="pull-right btn btn-success" onclick="sql(`SELECT nome FROM cliente LEFT JOIN veiculo ON veiculo.idCliente=cliente.idCliente WHERE veiculo.idCliente is NULL;`)">RESPOSTA</button>');
			break;
			case 5:
				var placa = "'RMF-1304'";//remendo porco para colocar aspas simples na string placa...!!!
				$('#questao').html('<p class="text-danger"><strong>5) Exiba o CPF e o nome do cliente que possui o veículo de placa “RMF-1304”.</strong></p><button class="pull-right btn btn-success" onclick="sql(`SELECT cpf,nome FROM cliente INNER JOIN veiculo ON cliente.idCliente = veiculo.idCliente WHERE placa='+placa+';`)">RESPOSTA</button>');
			break;
			case 6:
				$('#questao').html('<p class="text-danger"><strong>6) Exiba a Placa e a Cor do veículo que possui o código de estacionamento "4".</strong></p><button class="pull-right btn btn-success" onclick="sql(`SELECT placa,cor FROM veiculo INNER JOIN estacionamento ON veiculo.idVeiculo = estacionamento.idVeiculo WHERE idEstacionamento=4;`)">RESPOSTA</button>');
			break;
			case 7:
				var anus = "'2005'";
				$('#questao').html('<p class="text-danger"><strong>7) Exiba a Placa, o ano e a Descrição de seu modelo, se ele possuir ano a partir de 2005.</strong></p><button class="pull-right btn btn-success" onclick="sql(`SELECT placa,ano,descricao FROM veiculo INNER JOIN modelo ON veiculo.idModelo = modelo.idModelo WHERE ano > '+anus+';`)">RESPOSTA</button>');
			break;
			case 8:
				$('#questao').html('<p class="text-danger"><strong>8) Exiba o endereço, a data de entrada e data de saída dos estacionamentos do veículo de placa “JAB-0006”.</strong></p><button class="pull-right btn btn-success" onclick="sql(``)">RESPOSTA</button>');
			break;
			case 9:
				$('#questao').html('<p class="text-danger"><strong>9) Exiba a quantidade de vezes que os veículos de cor “Laranja” estacionaram.</strong></p><button class="pull-right btn btn-success" onclick="sql(``)">RESPOSTA</button>');
			break;
			case 10:
				$('#questao').html('<p class="text-danger"><strong>10) Liste o nome de todos os clientes que possuem um veículo de modelo “3”.</strong></p><button class="pull-right btn btn-success" onclick="sql(``)">RESPOSTA</button>');
			break;
			case 11:
				$('#questao').html('<p class="text-danger"><strong>11) Liste as placas, os horários de entrada e saída dos veículos da cor “Vermelho”.</strong></p><button class="pull-right btn btn-success" onclick="sql(``)">RESPOSTA</button>');
			break;
			case 12:
				$('#questao').html('<p class="text-danger"><strong>12) Liste todos os estacionamentos do veículo de placa “AEB-3232”.</strong></p><button class="pull-right btn btn-success" onclick="sql(``)">RESPOSTA</button>');
			break;
			case 13:
				$('#questao').html('<p class="text-danger"><strong>13) Exiba o nome e a cor do veículo do cliente que possui o veículo cujo código de estacionamento seja “3”.</strong></p><button class="pull-right btn btn-success" onclick="sql(``)">RESPOSTA</button>');
			break;
			case 14:
				$('#questao').html('<p class="text-danger"><strong>14) Exiba o CPF dos clientes que possuam um veículo cuja descrição seja “Veículo leve - Carro esportivo importado - Marca BMW”.</strong></p><button class="pull-right btn btn-success" onclick="sql(``)">RESPOSTA</button>');
			break;

			default:
				return 0;
		}
	}
</script>
