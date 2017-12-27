<?php  
	session_start();
	require "../conex.php";
	require "../funcoes.php";
	header ('Content-type: text/html; charset=UTF-8');
	// gambiarra de mensagem da url GET pra alert javascript!!!!
	if (isset($_GET['msg'])) {
		echo "<script>alert('".utf8_decode($_GET['msg'])."');</script>";
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>[BD2] - Lista 03</title>
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
				<h4>Considere o modelo ER abaixo para responder as questões apresentadas na sequência.</h4>
				<img src="../img/lista_3.png" class="img-responsive">
				<div id="tabelas">
					<!-- mostrar as tabelas -->
					<?php  
						$cli = mysqli_query($conex, "SELECT * FROM Clientes;")or die(mysqli_error($conex));
						$pro = mysqli_query($conex, "SELECT * FROM Produtos;")or die(mysqli_error($conex));
						$ped = mysqli_query($conex, "SELECT * FROM Pedidos;")or die(mysqli_error($conex));
						$cat = mysqli_query($conex, "SELECT * FROM Categorias;")or die(mysqli_error($conex));
					?>
					<h4>Clientes</h4>
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>id_cli</th><th>nome_cli</th><th>cpf_cli</th><th>dt_nasc_cli</th><th>Cidade</th>
								</tr>
							</thead>
							<tbody>
								<?php while($cliente = mysqli_fetch_array($cli)): ?>
									<tr>
										<td><?= $cliente['id_cli']; ?></td>
										<td><?= $cliente['nome_cli']; ?></td>
										<td><?= $cliente['cpf_cli']; ?></td>
										<td><?= $cliente['dt_nasc_cli']; ?></td>
										<td><?= $cliente['cidade_cli']; ?></td>
									</tr>
								<?php endwhile; ?>
									
							</tbody>
						</table>
					</div>

					<h4>Produtos</h4>
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>id_prod</th><th>desc_prod</th><th>preco_prod</th><th>id_categoria</th>
								</tr>
							</thead>
							<tbody>
								<?php while($produtos = mysqli_fetch_array($pro)): ?>
									<tr>
										<td><?= $produtos['id_prod']; ?></td>
										<td><?= $produtos['desc_prod']; ?></td>
										<td><?= $produtos['preco_prod']; ?></td>
										<td><?= $produtos['id_categoria']; ?></td>
									</tr>
								<?php endwhile; ?>
									
							</tbody>
						</table>
					</div>

					<h4>Categorias</h4>
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>id_cat</th><th>nome_cat</th><th>desconto_cat</th>
								</tr>
							</thead>
							<tbody>
								<?php while($categoria = mysqli_fetch_array($cat)): ?>
									<tr>
										<td><?= $categoria['id_cat']; ?></td>
										<td><?= $categoria['nome_cat']; ?></td>
										<td><?= $categoria['desconto_cat']; ?></td>
									</tr>
								<?php endwhile; ?>
									
							</tbody>
						</table>
					</div>

					<h4>Pedidos</h4>
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>id_ped</th><th>id_produto</th><th>id_cliente</th><th>data_ped</th>
								</tr>
							</thead>
							<tbody>
								<?php while($Pedidos = mysqli_fetch_array($ped)): ?>
									<tr>
										<td><?= $Pedidos['id_ped']; ?></td>
										<td><?= $Pedidos['id_produto']; ?></td>
										<td><?= $Pedidos['id_cliente']; ?></td>
										<td><?= $Pedidos['data_ped']; ?></td>
									</tr>
								<?php endwhile; ?>
									
							</tbody>
						</table>
					</div>
					
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
				<p onclick="questao(1);">1) Crie um script para exibir a descrição e o preço dos produtos que nunca foram vendidos.</p>
				<p onclick="questao(2);">2) Crie um script para exibir o nome de todos os clientes que já compraram um produto da categoria Eletrônicos.</p>
				<p onclick="questao(3);">3) Crie um script para exibir o nome, o CPF e a cidade de todos os clientes que possuem mais de 60 anos e nunca realizaram uma compra.</p>
				<p onclick="questao(4);">4) Crie um script para exibir a descrição dos produtos comprados no mês de abril de 1988.</p>
				<p onclick="questao(5);">5) Crie um script para exibir o valor total gasto por cada um dos clientes que já realizaram uma compra.</p>
			</div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
	function tezao(){
		var sql = ($('#query').val());
		if (sql != '') {
			$.ajax({
				type:'POST',
				url:'../ver_sql.php',
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
				url:'../ver_sql.php',
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
				$('#questao').html('<p class="text-danger"><strong>1) Crie um script para exibir a descrição e o preço dos produtos que nunca foram vendidos.</strong></p><button class="pull-right btn btn-success" onclick="sql(`SELECT desc_prod, preco_prod FROM Produtos LEFT JOIN Pedidos ON Pedidos.id_produto=Produtos.id_prod WHERE Pedidos.id_produto is NULL`)">RESPOSTA</button>');
			break;
			case 2:
				var eletronicos = "'eletronicos'";
				$('#questao').html('<p class="text-danger"><strong>2) Crie um script para exibir o nome de todos os clientes que já compraram um produto da categoria Eletrônicos.</strong></p><button class="pull-right btn btn-success" onclick="sql(`SELECT DISTINCT nome_cli FROM Clientes INNER JOIN Pedidos ON Clientes.id_cli=Pedidos.id_cliente INNER JOIN Produtos ON Produtos.id_prod=Pedidos.id_produto INNER JOIN Categorias ON Categorias.id_cat=Produtos.id_categoria WHERE nome_cat='+eletronicos+'`)">RESPOSTA</button>');
			break;
			case 3:
				var dt_nasc = "'1957-03-30'";
				$('#questao').html('<p class="text-danger"><strong>3) Crie um script para exibir o nome, o CPF e a cidade de todos os clientes que possuem mais de 60 anos e nunca realizaram uma compra.</strong></p><button class="pull-right btn btn-success" onclick="sql(`SELECT nome_cli, cpf_cli, cidade_cli FROM Clientes LEFT JOIN Pedidos ON Clientes.id_cli=Pedidos.id_cliente WHERE Pedidos.id_cliente is NULL && dt_nasc_cli < '+dt_nasc+'`)">RESPOSTA</button>');
			break;
			case 4:
				var dtum = "'1988-04-30'";
				var dtdois = "'1988-04-01'";
				$('#questao').html('<p class="text-danger"><strong>4) Crie um script para exibir a descrição dos produtos comprados no mês de abril de 1988.</strong></p><button class="pull-right btn btn-success" onclick="sql(`SELECT desc_prod FROM Produtos INNER JOIN Pedidos ON Pedidos.id_produto=Produtos.id_prod WHERE Pedidos.data_ped > '+dtdois+' && Pedidos.data_ped < '+dtum+'`)">RESPOSTA</button>');
			break;
			case 5:
				var placa = "'RMF-1304'";//remendo porco para colocar aspas simples na string placa...!!!
				$('#questao').html('<p class="text-danger"><strong>5) Crie um script para exibir o valor total gasto por cada um dos clientes que já realizaram uma compra.</strong></p><button class="pull-right btn btn-success" onclick="sql(``)">RESPOSTA</button>');
			

			default:
				return 0;
		}
	}
</script>