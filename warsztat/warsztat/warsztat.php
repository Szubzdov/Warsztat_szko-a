<?php

require('../conn.php');

$db = new mysqli($servername,$username, $password, $dbname);


if ($db->connect_error) {
    die("Połączenie z bazą danych nie udało się: " . $db->connect_error);
}


if (isset($_POST['submit'])) {
    $adres = $_POST['adres'];
    $miasto = $_POST['miasto'];
    $wojewodztwo = $_POST['wojewodztwo'];
    $kraj = $_POST['kraj'];
    $kod_pocztowy = $_POST['kod_pocztowy'];
    $telefon = $_POST['telefon'];
    $manager_id = $_POST['manager_id'];
    $man_mag_id = $_POST['man_mag_id'];
    $regon = $_POST['regon'];
    $krs = $_POST['krs'];
    $symbol = $_POST['symbol'];

    $sql = "INSERT INTO warsztat (id, adres, miasto, wojewodztwo, kraj, kod_pocztowy, telefon, manager_id, man_mag_id, regon, krs, symbol) 
            VALUES (null, 
            '$adres', 
            '$miasto', 
            '$wojewodztwo', 
            '$kraj', 
            '$kod_pocztowy', 
            '$telefon', 
            '$manager_id', 
            '$man_mag_id',

            '$regon', 
            '$krs', 
            '$symbol')";
    mysqli_query($db, $sql);
}

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodawanie danych do warsztatu</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
<?php require('../components/nav.html'); ?>
    <header>
        <div>
            <h2 id="nazwa">Warsztat <p>//dodaj warsztat</p></h2>
            
        </div>
        
    </header>
    <div id="under_nav">
        <a href="tabela_war.php">Tabela</a> 
        <a href="warsztat.php">Dodaj</a> 
         

    </div>
    <main>

    <div id="formularz">
    <form method="post" action="warsztat.php">
    <div>
        <label for="adres">
            <p>Adres:</p>
            <input type="text" id="adres" name="adres" required><br><br>
        </label>

        <label for="miasto">
            <p>Miasto:</p>
            <input type="text" id="miasto" name="miasto" required><br><br>
        </label>

        <label for="wojewodztwo">
            <p>Województwo:</p>
            <input type="text" id="wojewodztwo" name="wojewodztwo" required><br><br>
        </label>

        <label for="kraj">
            <p>Kraj:</p>
            <input type="text" id="kraj" name="kraj" min="1" required><br><br>
        </label>

        <label for="kod_pocztowy">
            <p>Kod pocztowy:</p>
            <input type="text" id="kod_pocztowy" name="kod_pocztowy" required><br><br>
        </label>

        <label for="telefon">
            <p>Telefon:</p>
            <input type="text" id="telefon" name="telefon" required><br><br>
        </label>

        <label for="manager_id">
            <p>Id Managera:</p>
            <input type="number" id="manager_id" name="manager_id" required><br><br>
        </label>

        <label for="man_mag_id">
            <p>Id Kierownika Magazynu:</p>
            <input type="number" id="man_mag_id" name="man_mag_id" required><br><br>
        </label>

        <label for="krs">
            <p>krs:</p>
            <input type="text" id="krs" name="krs" required><br><br>
        </label>

        <label for="regon">
            <p>Regon:</p>
            <input type="text" id="regon" name="regon"><br><br>
        </label>

        <label for="symbol">
            <p>symbol:</p>
            <input type="text" id="symbol" name="symbol" required><br><br>
        </label>

    </div>
    <button type="submit" name="submit">Dodaj</button>

</form>
</div>
</main>



</body>
</html>
