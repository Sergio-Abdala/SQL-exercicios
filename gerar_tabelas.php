<?php  
	require 'conex.php';
	echo "<h4>tabelas geradas</h4>";
	mysqli_query($conex, "CREATE TABLE if not exists cliente(
		idCliente int not null auto_increment primary key,
		cpf varchar(16),
		nome varchar(60),
		dataNascimento date
		);")or die(mysqli_error($conex));
	echo "cliente<br />";
	mysqli_query($conex, "CREATE TABLE if not exists modelo(
		idModelo int not null primary key auto_increment,
		descricao varchar(45)
		);")or die(mysqli_error($conex));
	echo "modelo<br />";
	mysqli_query($conex, "CREATE TABLE if not exists patio(
		idPatio int not null auto_increment primary key,
		endereco varchar(45),
		capacidade int
		);")or die(mysqli_error($conex));
	echo "patio<br />";
	mysqli_query($conex, "CREATE TABLE if not exists veiculo(
		idVeiculo int not null auto_increment primary key,
		idCliente int,
		foreign key (idCliente) references cliente(idCliente),
		idModelo int,
		foreign key (idModelo) references modelo(idModelo),
		placa varchar(9),
		cor varchar(30),
		ano date
		);")or die(mysqli_error($conex));
	echo "veiculo<br />";
	mysqli_query($conex, "CREATE TABLE if not exists estacionamento(
		idEstacionamento int not null auto_increment primary key,
		idVeiculo int,
		foreign key(idVeiculo) references veiculo(idVeiculo),
		idPatio int,
		foreign key(idPatio) references patio(idPatio),
		dataEntrada date,
		dataSaida date,
		horaEntrada time,
		horaSaida time
		);")or die(mysqli_error($conex));
	echo "estacionamento<br />";
	echo "<script>alert('tudo ok');</script>";

?>
<img src="img/lista_2.jpg">
<a href="index.php">inicio</a>