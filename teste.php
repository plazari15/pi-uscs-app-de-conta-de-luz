<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>Testando form Vetorial</title>
</head>
<body>
	<?php
		$Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
		$arr = array();
		for ($i=0; $i < count($Post['consumo']); $i++) { 
			$arr[] = array(
				'consumo' => $Post['consumo'][$i],
				'bandeira' => $Post['bandeira'][$i],
				'nome' => $Post['nome'][$i]
				);
		}

		foreach ($arr as $key) {
				echo "O ".$key['nome']." é um cara que consumiu ".$key['consumo']."kWh, neste mes com a bandeira ". $key['bandeira']."<br><br>"; 
		}
		var_dump($arr);
	?>
	<form method="POST" action="">
		<!-- VAMOS INSERIR UM BLOCO DE FORM -->
			<p>Consumo
				<input type="text" name="consumo[]">
			</p>
			
			<p>Bandeira
				<input type="text" name="bandeira[]">
			</p>
			
			<p>Nome
				<input type="text" name="nome[]">
			</p>
		<!-- VAMOS INSERIR UM BLOCO DE FORM -->

		<!-- VAMOS INSERIR UM BLOCO DE FORM -->
			<p>Consumo
				<input type="text" name="consumo[]">
			</p>
			
			<p>Bandeira
				<input type="text" name="bandeira[]">
			</p>
			
			<p>Nome
				<input type="text" name="nome[]">
			</p>
		<!-- VAMOS INSERIR UM BLOCO DE FORM -->

		<!-- VAMOS INSERIR UM BLOCO DE FORM -->
			<p>Consumo
				<input type="text" name="consumo[]">
			</p>
			
			<p>Bandeira
				<input type="text" name="bandeira[]">
			</p>
			
			<p>Nome
				<input type="text" name="nome[]">
			</p>
		<!-- VAMOS INSERIR UM BLOCO DE FORM -->	
		<input type="submit" class="submit">	
	</form>
</body>
</html>