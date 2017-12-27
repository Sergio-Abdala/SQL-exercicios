<?php  
	function capacidade($conex, $id_patio){
		//
		$cont = mysqli_query($conex, "SELECT idVeiculo FROM estacionamento WHERE idPatio='".$id_patio."';");
		$ocupado = mysqli_num_rows($cont);
		$saiu = mysqli_query($conex, "SELECT idVeiculo FROM estacionamento WHERE idPatio='".$id_patio."' && dataSaida!='';");
		$menos = mysqli_num_rows($saiu);
		$ocupado -= $menos;
		$acha = mysqli_query($conex, "SELECT capacidade FROM patio WHERE idPatio='".$id_patio."';");
		$achou = mysqli_fetch_array($acha);
		$razao = $achou['capacidade'] - $ocupado;
		return $razao;
	}
	function imprime_query($conex, $query){
		//$memo[];
		$busca = mysqli_query($conex, $query);
		while ($ver = mysqli_fetch_array($busca)) {
			$memo[] = $ver;
		}
		return $memo;
	}
?>