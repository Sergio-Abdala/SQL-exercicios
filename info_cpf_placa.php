<?php  	
	$idVeiculo="";
	// AQUI QUE TÁ O FURO DA BALA...!!!
	if ($_POST['cpf'] !="" || $_POST['pl'] != "") {
		// precisa do idVeiculo para selecionar o idPatio
		if ($_POST['cpf'] != "") {			
			//localizar idVeiculo atravez do cpf...			
			$query = mysqli_query($conex, "SELECT idVeiculo FROM veiculo INNER JOIN cliente ON(cliente.idCliente = veiculo.idCliente) WHERE cpf='".$_POST['cpf']."';")or die(mysqli_error($conex));
			if (mysqli_num_rows($query) == 0) {
				# ñ encontrou registro de cpf correspondente na tabela...
				header("location:index.php?msg=ñ encontrou registro de cpf correspondente na tabela...");
			}else{
				$vorta = mysqli_fetch_array($query);
				$idVeiculo = $vorta['idVeiculo'];
			}
		}
		if ($_POST['pl'] != "") {
			//localizar idVeiculo atravez da placa do veiculo...
			$query = mysqli_query($conex, "SELECT idVeiculo FROM veiculo WHERE placa='".$_POST['pl']."';");
			if (mysqli_num_rows($query) == 0) {
				header("location:index.pphp?msg=ñ encontrou registro de placa correspondente na base de dados...");
			}else{
				$vorta = mysqli_fetch_array($query);
				$idVeiculo = $vorta['idVeiculo'];
			}
		}
		if ($idVeiculo != "") {
			echo "localizado id veículo = ".$idVeiculo;
			// consulta informações sobre veiculo
			$cons = mysqli_query($conex,"SELECT cpf,nome,dataNascimento,placa,cor,ano,descricao FROM veiculo INNER JOIN cliente ON(cliente.idCliente = veiculo.idVeiculo) INNER JOIN modelo ON(veiculo.idModelo = modelo.idModelo) WHERE idVeiculo='".$idVeiculo."';")or die(mysqli_error($conex));
			$cons_veiculo = mysqli_fetch_array($cons);
			echo "<h3>Informações de Cadastro...</h3>";
			echo "<strong>Cliente: </strong>".$cons_veiculo['nome']."<br />";
			echo "<strong>Cpf: </strong>".$cons_veiculo['cpf']."<br />";
			echo "<strong>Data Nasc: </strong>".$cons_veiculo['dataNascimento']."<br />";
			echo "<strong>Placa: </strong>".$cons_veiculo['placa']."<br />";
			echo "<strong>cor: </strong>".$cons_veiculo['cor']."<br />";
			echo "<strong>ano: </strong>".$cons_veiculo['ano']."<br />";
			echo "<strong>descrição do veículo: </strong>".$cons_veiculo['descricao']."<br />";
			//*****************************
			$wisk = mysqli_query($conex, "SELECT idEstacionamento,dataEntrada,dataSaida,horaEntrada,horaSaida FROM estacionamento WHERE idVeiculo='".$idVeiculo."';")or die(mysqli_error($conex));
			//echo "total: ".mysqli_num_rows($wisk);
			while ($ver = mysqli_fetch_array($wisk)) {
				if ($ver['dataSaida'] == '') {
					echo "data Entrada: ".$ver['dataEntrada']."<br />";
					echo "hora Entrada: ".$ver['horaEntrada']."<br />";
				}
			}
			//formulario para input hora entrada veiculo			
		}
		
	}else{
		header("location:index.php?msg=ao menos um dos campos CPF ou PLACA do veículo devem estar preenchidos....");
	}
?>