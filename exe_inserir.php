<?php  
	session_start();
	require 'conex.php';
	if (isset($_POST)) {
		foreach ($_POST as $k => $valor) {
			echo $k." => ".$valor."<br />";
		}
		//tabela cliente numero do cpf é essencial para cadastro
		if (isset($_POST['cpf']) && $_POST['cpf'] != "") {			
		}else{
			header('location:index.php?msg=campo obrigatorio CPF não pode ser vazio...');
		}
		//tabela modelo 
		if (isset($_POST['des']) && $_POST['des'] != "" && isset($_POST['cpf']) && $_POST['cpf'] != "" && isset($_POST['pl']) && $_POST['pl'] != "") {			
			//modelo
			mysqli_query($conex, "INSERT INTO modelo(descricao) VALUES('".$_POST['des']."')")or die(mysqli_error($conex));
			$id_mod = mysqli_query($conex, "SELECT idModelo FROM modelo ORDER BY idModelo DESC LIMIT 1")or die(mysqli_error($conex));
			$id_modelo = mysqli_fetch_array($id_mod);
			$id_modelo['idModelo'];
		}else{
			$id_modelo['idModelo']="";
		}
		//tabela veiculo placa é essencial para cadastro        SOMENTE PLACA E CPF ESSENCIAL...
		// EXECUTA TUDO SQL...
		if (isset($_POST['pl']) && $_POST['pl'] != "" && isset($_POST['cpf']) && $_POST['cpf'] != "") {
			
			//cliente
			mysqli_query($conex, "INSERT INTO cliente(cpf,nome,dataNascimento) VALUES('".$_POST['cpf']."', '".$_POST['nome']."', '".$_POST['data']."');")or die(mysqli_error($conex));
			$id_cli = mysqli_query($conex, "SELECT idCliente FROM cliente ORDER BY idCliente DESC LIMIT 1;")or die(mysqli_error($conex));
			$id_cliente = mysqli_fetch_array($id_cli);
			echo "<h1>===".$id_cliente['idCliente']."</h1>";
			var_dump($id_cliente);
			echo "<h2>= ".$id_modelo['idModelo']."</h2>";
			var_dump($id_modelo);
			
			//veiculo
			mysqli_query($conex, "INSERT INTO veiculo(idCliente, idModelo, placa, cor,ano) VALUES('".$id_cliente['idCliente']."', '".$id_modelo['idModelo']."', '".$_POST['pl']."', '".$_POST['cor']."', '".$_POST['ano']."');")or die(mysqli_error($conex));
		}else{
			header('location:index.php?msg=campo obrigatorio PLACA não pode ser vazio...');
		}	
	}else{
		header('location:index.php');
	}

?>