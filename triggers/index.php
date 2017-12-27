<?php  
	session_start();
	require "conex.php";
	require "../funcoes.php";
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
	<script src="../js/jquery-3.1.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
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
			
			<div class="col-xs-12 col-md-6">				
				
				<img src="tabelas_triggers.png" class="img-responsive" id="diagrama">

				<div id="tabelas">
					<!-- tabela Usuarios -->
					<h3>Usuarios</h3>
					<table class="table table-condensed">
					<thead>
						<tr>
							<th>cod_user</th><th>nome_user</th>
						</tr>
					</thead>
					<tbody>
					<?php  
						$us = mysqli_query($conex, "SELECT * FROM Usuarios;");
						while ($usu = mysqli_fetch_array($us)) {							
					?>
							<tr>
								<td><?= $usu['cod_user']; ?></td><td><?= $usu['nome_user']; ?></td>
							</tr>

					<?php } ?>
					</tbody>
					</table>

					<!-- tabela Tipos -->
					<h3>Tipos</h3>
					<table class="table table-condensed">
					<thead>
						<tr>
							<th>cod_tipo</th><th>nome_tipo</th>
						</tr>
					</thead>
					<tbody>
					<?php  
						$tip = mysqli_query($conex, "SELECT * FROM Tipos;");
						while ($tipo = mysqli_fetch_array($tip)) {							
					?>
							<tr>
								<td><?= $tipo['cod_tipo']; ?></td><td><?= $tipo['nome_tipo']; ?></td>
							</tr>

					<?php } ?>
					</tbody>
					</table>

					<!-- tabela Produtos -->
					<h3>Produtos</h3>
					<table class="table table-condensed">
					<thead>
						<tr>
							<th>cod_prod</th><th>cod_tipo</th><th>preco_prod</th><th>qtd_estoque</th>
						</tr>
					</thead>
					<tbody>
					<?php  
						$pro = mysqli_query($conex, "SELECT * FROM Produtos;");
						while ($prod = mysqli_fetch_array($pro)) {							
					?>
							<tr>
								<td><?= $prod['cod_prod']; ?></td><td><?= $prod['cod_tipo']; ?></td><td><?= $prod['preco_prod']; ?></td><td><?= $prod['qtd_estoque']; ?></td>
							</tr>

					<?php } ?>
					</tbody>
					</table>

					<!-- tabela Vendas -->
					<h3>Vendas</h3>
					<table class="table table-condensed">
					<thead>
						<tr>
							<th>cod_venda</th><th>cod_prod</th><th>cod_user</th><th>quantidade</th>
						</tr>
					</thead>
					<tbody>
					<?php  
						$ven = mysqli_query($conex, "SELECT * FROM Vendas;");
						while ($venda = mysqli_fetch_array($ven)) {							
					?>
							<tr>
								<td><?= $venda['cod_venda']; ?></td><td><?= $venda['cod_prod']; ?></td><td><?= $venda['cod_user']; ?></td><td><?= $venda['quantidade']; ?></td>
							</tr>

					<?php } ?>
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
				<a href="#questao"><p onclick="questao(1);" class="text-primary">1) Crie uma function que receba o código de um produto e retorne a quantidade deste produto no estoque. </p></a>
				<a href="#questao"><p onclick="questao(2);" class="text-primary">2) Crie uma function que receba o código de um produto e retorne o nome do tipo deste produto.</p></a>
				<a href="#questao"><p onclick="questao(3);" class="text-primary">3) Crie uma function que receba o código de um produto e retorne o resultado da equação Preço x Estoque.</p></a>
				<a href="#questao"><p onclick="questao(4);" class="text-primary">4) Crie uma function que receba o código de uma venda e retorne a quantidade de produtos vendidos nesta venda.</p></a>
				<a href="#questao"><p onclick="questao(5);" class="text-primary">5) Crie uma function que receba o código de um usuário e retorne a quantidade de produtos que este usuário já comprou.</p></a>
				<a href="#questao"><p onclick="questao(6);" class="text-primary">6) Crie uma function que receba o código de um produto e retorne a média de quantidades vendidas para este produto.</p></a>
				<a href="#questao"><p onclick="questao(7);" class="text-primary">7) Crie uma function que receba o código de um usuário e verifique se ele já gastou mais de R$ 200,00 em compras. Em caso afirmativo, retorne 1, caso contrário retorne 0.</p></a>
				<a href="#questao"><p onclick="questao(8);" class="text-primary">8) Crie uma function que receba o código de um produto, a quantidade e o código de um usuário e faça o seguinte:<br />(a) Verifica se o produto existe em estoque, caso exista, insere os valores da tabela vendas, diminui o valor do estoque e retorna 1.<br />(b) Se ele não tiver em estoque, retorne 2.<br />(c) Se o código do produto não estiver cadastrado, retorne 3.<br />(d) Se o código do usuário não estiver cadastrado, retorne 4.</p></a>
				
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
				$('#questao').html('<p class="text-danger"><strong>1) Crie uma function que receba o código de um produto e retorne a quantidade deste produto no estoque. </strong></p><button class="pull-right btn btn-success" onclick="sql(``)">RESPOSTA</button>');
			break;
			case 2:
				$('#questao').html('<p class="text-danger"><strong>2) Crie uma function que receba o código de um produto e retorne o nome do tipo deste produto.</strong></p><button class="pull-right btn btn-success" onclick="sql(``)">RESPOSTA</button>');
			break;
			case 3:
				$('#questao').html('<p class="text-danger"><strong>3) Crie uma function que receba o código de um produto e retorne o resultado da equação Preço x Estoque.</strong></p><button class="pull-right btn btn-success" onclick="sql(``)">RESPOSTA</button>');
			break;
			case 4:
				$('#questao').html('<p class="text-danger"><strong>4) Crie uma function que receba o código de uma venda e retorne a quantidade de produtos vendidos nesta venda.</strong></p><button class="pull-right btn btn-success" onclick="sql(``)">RESPOSTA</button>');
			break;
			case 5:
				var placa = "'RMF-1304'";//remendo porco para colocar aspas simples na string placa...!!!
				$('#questao').html('<p class="text-danger"><strong>5) Crie uma function que receba o código de um usuário e retorne a quantidade de produtos que este usuário já comprou.</strong></p><button class="pull-right btn btn-success" onclick="sql(``)">RESPOSTA</button>');
			break;
			case 6:
				$('#questao').html('<p class="text-danger"><strong>6) Crie uma function que receba o código de um produto e retorne a média de quantidades vendidas para este produto.</strong></p><button class="pull-right btn btn-success" onclick="sql(``)">RESPOSTA</button>');
			break;
			case 7:
				var anus = "'2005'";
				$('#questao').html('<p class="text-danger"><strong>7) Crie uma function que receba o código de um usuário e verifique se ele já gastou mais de R$ 200,00 em compras. Em caso afirmativo, retorne 1, caso contrário retorne 0.</strong></p><button class="pull-right btn btn-success" onclick="sql(``)">RESPOSTA</button>');
			break;
			case 8:
				$('#questao').html('<p class="text-danger"><strong>8) Crie uma function que receba o código de um produto, a quantidade e o código de um usuário e faça o seguinte:<br />(a) Verifica se o produto existe em estoque, caso exista, insere os valores da tabela vendas, diminui o valor do estoque e retorna 1.<br />(b) Se ele não tiver em estoque, retorne 2.<br />(c) Se o código do produto não estiver cadastrado, retorne 3.<br />(d) Se o código do usuário não estiver cadastrado, retorne 4.</strong></p><button class="pull-right btn btn-success" onclick="sql(``)">RESPOSTA</button>');
			break;

			default:
				return 0;
		}
	}
</script>
