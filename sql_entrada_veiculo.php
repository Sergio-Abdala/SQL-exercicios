<?php  
	require "conex.php";
	mysqli_query($conex, "INSERT INTO estacionamento(idVeiculo, idPatio, horaEntrada, dataEntrada) VALUES('".$_POST['idVeiculo']."', '".$_POST['idPatio']."', '".$_POST['hora']."', '".$_POST['data']."');")or die(mysqli_error($conex));
	echo "registro efetuado com sucesso...";
?>