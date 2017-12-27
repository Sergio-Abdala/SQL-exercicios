<?php  	
	require "conex.php";
	mysqli_query($conex, "CREATE TABLE IF NOT EXISTS Usuarios(
		cod_user int not null auto_increment primary key,
		nome_user varchar(45)
		);")or die("".mysqli_error($conex));

	mysqli_query($conex, "CREATE TABLE IF NOT EXISTS Tipos(
		cod_tipo int not null auto_increment primary key,
		nome_tipo varchar(45)
		);")or die("".mysqli_error($conex));

	mysqli_query($conex, "CREATE TABLE IF NOT EXISTS Produtos(
		cod_prod int not null auto_increment primary key,
		cod_tipo int,
		foreign key(cod_tipo) references Tipos(cod_tipo),
		preco_prod decimal(10,2),
		qtd_estoque int
		);")or die("tabela produtos...--> ".mysqli_error($conex));

	mysqli_query($conex, "CREATE TABLE IF NOT EXISTS Vendas(
		cod_venda int not null auto_increment primary key,
		cod_prod int,
		foreign key(cod_prod) references Produtos(cod_prod),		
		cod_user int,
		foreign key(cod_user) references Usuarios(cod_user),
		quantidade int
		);")or die("".mysqli_error($conex));
?>