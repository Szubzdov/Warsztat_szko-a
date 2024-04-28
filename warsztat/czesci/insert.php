<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Części</title>
	<link rel="stylesheet" href="../styles/style.css">
</head>
<body>
	<?php require('../components/nav.html'); ?>
    <header>
        <div>
            <h2 id="nazwa">Części <p>//dodaj naprawę</p></h2>
            
        </div>
    </header>
    <div id="under_nav">
        <a href="tabela_cze.php">Tabela</a> 
        <a href="insert.php">Dodaj</a> 
        <?php
		ini_set('display_errors', '0');
		$baza = false;
		require('../conn.php');	 
		$polaczenie = mysqli_connect($servername, $username, $password, $dbname);
		
		if(!$polaczenie){
			$conn_err = mysqli_connect_errno();
			switch($conn_err) {
			case 1049:
				$e = "Nieprawidłowa nazwa bazy danych - $dbname";
				break;
			case 2002:
				$e = "Nieprawidłowa nazwa hosta - $servername";
				break;
			case 1045:
				$e = "Nieprawidłowe hasło";
				break;
			default:
				$e = "Błąd " . mysqli_connect_error();
			break;
		}
		} else {
			$baza = true;
		}
		?>
    </div>
	<main>
        <div id="formularz">
		<?php if(!$baza): ?>
                <h2><?php echo $e; ?></h2>
            <?php else: ?>
			<form action="formularz.php" method="post">
				<div>	
					<label>
    					<p>nazwa:</p>
    					<input type="text" name="nazwa"/><br/>
					</label>

					<label>
						<p>symbol:</p>
						<input type="text" name="symbol"/><br/>
					</label>

					<label>
						<p>producent:</p>
						<input type="text" name="producent"/><br/>
					</label>

					<label>
						<p>data produkcji:</p>
						<input type="date" name="data_prod"/><br/>
				</label>
				</div>	
				<button type="submit">Dodaj część</button>
			</form>
			<?php endif; ?>
		</div>
			</main>
		<footer>
		<p>&copy Klasa 3R 2024</p>
	</footer>
	</body>
</html>