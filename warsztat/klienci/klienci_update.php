<!doctype html>
<html>
	<head>
		<title>Strona do inserta i updata danych</title>
	</head>
	<link rel="stylesheet" href="../styles/style.css">



	<body>

	<?php require('../components/nav.html'); ?>
    <header>
        <div>
            <h2 id="nazwa">Klienci <p>//aktualizacja</p></h2>

        </div>
        
    </header>
    <div id="under_nav">
        <a href="tabela_kli.php">Tabela</a> 
        <a href="in_kli.php">Dodaj</a> 
        <a href="klienci_update.php">Aktualizuj</a> 

    </div>
		<?php
			$polaczenie = mysqli_connect('localhost', 'root', '', 'warsztat');
			
			if($polaczenie == FALSE){
				echo 'Nie udało się połaczyć z bazą danych! '. mysqli_connect_error();
			}
			
			
			
			if( isset($_POST['submit'])  ){
				
				
				if( isset($_POST['id']) ) {
					
					$id_klineta = $_POST['id'];
					
					if( isset($_POST['imie'])       ) $imie		    = $_POST['imie'];
					if( isset($_POST['imie2'])      ) $imie2		= $_POST['imie2'];
					if( isset($_POST['nazwisko'])   ) $nazwisko	    = $_POST['nazwisko'];
					if( isset($_POST['data_ur'])    ) $data_ur	    = $_POST['data_ur'];
					if( isset($_POST['pesel'])      ) $pesel    	= $_POST['pesel'];
					if( isset($_POST['ulica'])      ) $ulica		= $_POST['ulica'];
					if( isset($_POST['nr_d'])       ) $nr_d		    = $_POST['nr_d'];
					if( isset($_POST['miasto'])     ) $miasto		= $_POST['miasto'];
					if( isset($_POST['kraj'])       ) $kraj		    = $_POST['kraj'];
					if( isset($_POST['narodowosc']) ) $narodowosc	= $_POST['narodowosc'];
					if( isset($_POST['nr_tel'])     ) $nr_tel		= $_POST['nr_tel'];
					if( isset($_POST['email'])      ) $email		= $_POST['email'];
					if( isset($_POST['kod_pocz'])   ) $kod_pocz	    = $_POST['kod_pocz'];
					if( isset($_POST['plec'])       ) $plec		    = $_POST['plec'];
					if( isset($_POST['nr_dow'])     ) $nr_dow		= $_POST['nr_dow'];
					if( isset($_POST['wydany'])     ) $wydany    	= $_POST['wydany'];
					
					
					// sprawdzenie + aktualizacja
					
					$sql = "Update klienci 
							   set imie 	  = '$imie'		  ,
								   imie2 	  = '$imie2'	  ,
								   nazwisko   = '$nazwisko'	  ,
								   data_ur    = '$data_ur'    ,
								   pesel      = '$pesel'      ,
								   ulica      = '$ulica'      ,
								   nr_d       = '$nr_d'       ,
								   miasto     = '$miasto'     ,
								   kraj       = '$kraj'       ,
								   narodowosc = '$narodowosc' ,
								   nr_tel     = '$nr_tel'     ,
								   email 	  = '$email'	  ,
								   kod_pocz   = '$kod_pocz'		  ,
								   nr_dow     = '$nr_dow'     ,
								   wydany     = '$wydany'     ,
								   plec	      = '$plec'
							 where id 		  = '$id_klineta' ";
					

					$wynik = mysqli_query($polaczenie, $sql);
					
					
				}else{
					echo 'Należy usupełnić wszystkie dane!';
				}
				
				
			}

			
			$rozlaczenie = mysqli_close($polaczenie);
		?>
	
	
	<main>
	<div id="formularz">
		<form method="post" action="klienci_update.php">
		<div>
			<label>
				<p>Id:</p>
				<input type="number" name="id"/> <br/><br/>
			</label>
			<label>
				<p>Nazwisko:</p>
				<input type="text" name="nazwisko"/> <br/><br/>
			</label>
			<label>
				<p>Imię:</p>
				<input type="text" name="imie"/> <br/><br/>
			</label>
			<label>
				<p>Imię 2:</p>
				<input type="text" name="imie2"/> <br/><br/>
			</label>
			<label>
				<p>Data urodzenia:</p>
				<input type="date" name="data_ur"/> <br/><br/>
			</label>
			<label>
				<p>Pesel:</p>
				<input type="text" name="pesel"/> <br/><br/>
			</label>
			<label>
				<p>Ulica:</p>
				<input type="text" name="ulica"/> <br/><br/>
			</label>
			<label>
				<p>Numer domu:</p>
				<input type="text" name="nr_d"/> <br/><br/>
			</label>
			<label>
				<p>Kod pocztowy:</p>
				<input type="text" name="kod_pocz"/> <br/><br/>
			</label>
			<label>
				<p>Miasto:</p>
				<input type="text" name="miasto"/> <br/><br/>
			</label>
			<label>
				<p>Kraj:</p>
				<input type="text" name="kraj"/> <br/><br/>
			</label>
			<label>
				<p>Narodowość:</p>
				<input type="text" name="narodowosc"/> <br/><br/>
			</label>
			<label>
				<p>Płeć:</p>
				<select name="plec">
					<option value="k">Kobieta</option>
					<option value="m">Mężczyzna</option>
				</select><br/><br/>
			</label>
			<label>
				<p>Numer telefonu:</p>
				<input type="text" name="nr_tel"/> <br/><br/>
			</label>
			<label>
				<p>Email:</p>
				<input type="text" name="email"/> <br/><br/>
			</label>
			<label>
				<p>Numer dowodu:</p>
				<input type="text" name="nr_dow"/> <br/><br/>
			</label>
			<label>
				<p>Wydany:</p>
				<input type="text" name="wydany"/> <br/><br/>
			</label>
		</div>
		
		<button type="submit" name="submit">Zaktualizuj</button>
		</form>
		</div>
	
	</body>
<html>