<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Części</title>
</head>
<body>

	<?php
		require('../conn.php');

    	
		$polaczenie = mysqli_connect($servername, $username, $password, $dbname);
		
		if( isset($_POST['nazwa']) 	   && 
			isset($_POST['symbol'])    && 
			isset($_POST['producent']) && 
			isset($_POST['data_prod'])   
		) {
				
				
			$nazwa = $_POST['nazwa'];
			$symbol = $_POST['symbol'];
			$producent = $_POST['producent'];
			$data_prod = $_POST['data_prod'];
			
			$kw1 = "SELECT MAX(id) id
					FROM czesci";
			
			$wynik1 = mysqli_query($polaczenie, $kw1);
			$poprzednie_id =  mysqli_fetch_array($wynik1);
			$nowe_id = $poprzednie_id['id'] + 1;

			$kw2 = "INSERT INTO czesci VALUES ('$nowe_id', '$nazwa','$symbol','$producent','$data_prod')";
			$wynik2 = mysqli_query($polaczenie, $kw2);
		
			echo "Część $nazwa o symbolu $symbol zostało dodana do bazy danych";
		}
		mysqli_close($polaczenie);
	?>
</body>
</html>