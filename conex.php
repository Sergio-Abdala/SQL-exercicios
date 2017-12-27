<?php  
	$conex = mysqli_connect("localhost","root","r2d2c3po");
	mysqli_select_db($conex,"estacionamento");
	// Checkar conexão
	if (mysqli_connect_errno())
	  {
	  echo "falha ao conectar-se com MySQL: " . mysqli_connect_error();
	  }

	// Setar utf8
	mysqli_set_charset($conex,"utf8");
?>