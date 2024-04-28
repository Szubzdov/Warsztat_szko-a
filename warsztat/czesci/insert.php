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
        

    </div>
	<main>
        <div id="formularz">
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
		</div>
</body>
</html>