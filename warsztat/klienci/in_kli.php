<?php 
    ini_set('display_errors', '0');
    require('../conn.php');
    
    $baza = false;
    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
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
        $e= "Błąd " . mysqli_connect_error();
        break;
}
} else {
    $baza = true;      
    $sql = "SELECT * FROM klienci";
    $result = $conn->query($sql);
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj Klienta</title>
    <!-- <title>Warsztat ZSI</title> -->
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <?php require('../components/nav.html'); ?>
    <header>
        <div>
            <h2 id="nazwa">Klienci <p>//dodaj klienta</p></h2>

        </div>
        
    </header>
    <div id="under_nav">
        <a href="tabela_kli.php">Tabela</a> 
        <a href="in_kli.php">Dodaj</a> 
        <a href="klienci_update.php">Aktualizuj</a>  

    </div>
    <main>
        <?php if(!$baza): ?>
            <h2><?php echo $e; ?></h2>
        <?php else: ?>
        <div id="formularz">
            <form action="dodaj_kli.php" method="post">
                <h2>Formularz Klienci</h2>
                <div>

                    <label for="nazwisko">
                        <p>Naziwsko:</p>
                        <input type="text" id="nazwisko" name="nazwisko" required>
                    </label>
                    <label for="imie">
                        <p>Imię:</p>
                        <input type="text" id="imie" name="imie" required>
                    </label>

                    <label for="imie2">
                        <p>Drugie imię:</p>
                        <input type="text" id="imie2" name="imie2">
                    </label>

                    <label for="data_ur">
                        <p>Data urodzenia:</p>
                        <input type="date" id="data_ur" name="data_ur">
                    </label>

                    <label for="pesel">
                        <p>PESEL:</p>
                        <input type="text" id="pesel" name="pesel">
                    </label>

                    <label for="ulica">
                        <p>Ulica:</p>
                        <input type="text" id="ulica" name="ulica">
                    </label>

                    <label for="nr_d">
                        <p>Numer domu:</p>
                        <input type="text" id="nr_d" name="nr_d">
                    </label>
            
                    <label for="kod_pocz">
                        <p>Kod Pocztowy:</p>
                        <input type="text" id="kod_pocz" name="kod_pocz">
                    </label>
            
                    <label for="miasto">
                        <p>Miasto:</p>
                        <input type="text" id="miasto" name="miasto" required>
                    </label>
            
                    <label for="kraj">
                        <p>Kraj:</p>
                        <input type="text" id="kraj" name="kraj">
                    </label>
            
                    <label for="narodowosc">
                        <p>Narodowość:</p>
                        <input type="text" id="narodowosc" name="narodowosc">
                    </label>
            
                    <label for="plec">
                        <p>plec:</p>
                        <select id="plec" name="plec">
                            <option value="M">Mężczyzna</option>
                            <option value="K">Kobieta</option>
                        </select>
                    </label>
            
                    <label for="nr_tel">
                        <p>Numer telefonu:</p>
                        <input type="text" id="nr_tel" name="nr_tel">
                    </label>
            
                    <label for="email">
                        <p>Email:</p>
                        <input type="email" id="email" name="email">
                    </label>
            
                    <label for="nr_dow">
                        <p>NR DOW:</p>
                        <input type="text" id="nr_dow" name="nr_dow">
                    </label>
            
                    <label for="wydany">
                        <p>Wydany:</p>
                        <input type="text" id="wydany" name="wydany">
                    </label>
                </div>
                <button type="submit">Dodaj</button>
                
            </form>
        </div>
        <?php endif; ?>
    </main>
    <footer>
        <p>&copy Klasa 3R 2024</p>
    </footer>
</body>
</html>