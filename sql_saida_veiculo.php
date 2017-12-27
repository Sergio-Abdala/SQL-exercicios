<?php  
	require 'conex.php';
	/*
	echo "<br />".$_POST['idVeiculo'];
	echo "<br />".$_POST['data'];
	echo "<br/>".$_POST['hora'];
	*/	
	mysqli_query($conex, "UPDATE estacionamento SET dataSaida='".$_POST['data']."', horaSaida='".$_POST['hora']."' WHERE idVeiculo='".$_POST['idVeiculo']."';")or die(mysqli_error($conex));
	echo "saida registrada com sucesso, VOLTE SEMPRE....";
	
	
?>
