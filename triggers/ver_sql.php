<?php  
	require 'conex.php';

	if (isset($_POST['sql'])) {
		echo "<h1>".$_POST['sql']."</h1>";
		$sql = mysqli_query($conex, $_POST['sql'])or die(mysqli_error($conex));
		$negar = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50);
		while ($busca = mysqli_fetch_array($sql)) {
			$cont=0;
			foreach ($busca as $k => $valor) {
				if (!in_array($k, $negar)) {
					if ($cont) {
						echo "<br />".$k."=> ".$valor;						
					}
					$cont++;
				}
			}
			echo "<hr>";
		}
	}else{
		echo "deu algo errado sem consulta...";
	}
?>