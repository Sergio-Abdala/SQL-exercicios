<?php  
	require '../conex.php';
	mysqli_query($conex, "CREATE TABLE IF NOT EXISTS Clientes(
		id_cli int not null primary key auto_increment,
		nome_cli varchar(45),
		cpf_cli varchar(45),
		dt_nasc_cli date,
		cidade_cli varchar(45)
		);")or die(mysqli_error("ñ gerou tabela Clientes ".$conex));
	mysqli_query($conex, "CREATE TABLE IF NOT EXISTS Categorias(
		id_cat int not null primary key auto_increment,
		nome_cat varchar(45),
		desconto_cat varchar(45)
		);")or die("ñ gerou tabela Categorias ".mysqli_error($conex));
	mysqli_query($conex, "CREATE TABLE IF NOT EXISTS Produtos(
		id_prod int not null primary key auto_increment,
		desc_prod varchar(45),
		preco_prod DOUBLE,
		id_categoria int,
		foreign key (id_categoria) references Categorias(id_cat)
		);")or die(mysqli_error("ñ gerou tabela Produtos ".$conex));
	mysqli_query($conex, "CREATE TABLE IF NOT EXISTS Pedidos(
		id_ped int not null primary key auto_increment,
		id_produto int,
		foreign key (id_produto) references Produtos(id_prod),
		id_cliente int,
		foreign key (id_cliente) references Clientes(id_cli),
		data_ped date
		);")or die("ñ gerou tabela Pedidos ".mysqli_error($conex));
	echo "Sucesso ao gerar tabelas...";
?>