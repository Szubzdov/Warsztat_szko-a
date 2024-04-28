<?php
ini_set('display_errors', '0');
$baza = false;
require('../conn.php');
$db = new mysqli($servername,$username, $password, $dbname);

if ($db->connect_error) {
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

if (isset($_POST['dodaj'])) {
    $vin = $_POST['vin'];
    $marka = $_POST['marka'];
    $model = $_POST['model'];
    $typ_nadwozia = $_POST['typ_nadwozia'];
    $typ_silnika = $_POST['typ_silnika'];
    $silnik = $_POST['silnik'];
    $kolor = $_POST['kolor'];
    $dop_mas_calk = $_POST['dop_mas_calk'];
    $mas_wlasna = $_POST['mas_wlasna'];
    $przebieg = $_POST['przebieg'];
    $dt_przebiegu = $_POST['dt_przebiegu'];
    $paliwo = $_POST['paliwo'];
    $nr_rej = $_POST['nr_rej'];
    $pojemnosc = $_POST['pojemnosc'];
    $kraj_prod = $_POST['kraj_prod'];
    $rok_prod = $_POST['rok_prod'];
    $skrzynia = $_POST['skrzynia'];
    $ogumienie = $_POST['ogumienie'];
    $dt_przegl = $_POST['dt_przegl'];
    $moc = $_POST['moc'];
    $olej = $_POST['olej'];
    $naped = $_POST['naped'];

    $sql = "INSERT INTO pojazdy (vin, marka, model, typ_nadwozia, typ_silnika, silnik, kolor, dop_mas_calk, mas_wlasna, przebieg, dt_przebiegu, paliwo, nr_rej, pojemnosc, kraj_prod, rok_prod, skrzynia, ogumienie, dt_przegl, moc, olej, naped) VALUES ('$vin', '$marka', '$model', '$typ_nadwozia', '$typ_silnika', '$silnik', '$kolor', '$dop_mas_calk', '$mas_wlasna', '$przebieg', '$dt_przebiegu', '$paliwo', '$nr_rej', '$pojemnosc', '$kraj_prod', '$rok_prod', '$skrzynia', '$ogumienie', '$dt_przegl', '$moc', '$olej', '$naped')";

    if ($db->query($sql) === TRUE) {
        echo "Pomyślnie dodano pojazd do bazy.";
    } else {
        echo "Wystąpił błąd podczas dodawania pojazdu: " . $db->error;
    }
}
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dodawanie pojazdu</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
<?php require('../components/nav.html'); ?>
    <header>
        <div>
            <h2 id="nazwa">Pojazdy <p>//dodaj pojazd</p></h2>

        </div>
        
    </header>
    <div id="under_nav">
        <a href="tabela_poj.php">Tabela</a> 
        <a href="pojazdy.php">Dodaj</a> 
        <a href="#">Aktualizuj</a>  

    </div>
    <main>
        <div id="formularz">
        <?php if(!$baza): ?>
                <h2><?php echo $e; ?></h2>
            <?php else: ?>
            <form method="post">
            <h2>Formularz Pojazdy</h2>
                <div>
                <label for="vin">
                    <p>VIN:</p>
                    <input type="text" id="vin" name="vin" required><br><br>
                </label>

                <label for="marka">
                    <p>Marka:</p>
                    <input type="text" id="marka" name="marka" required><br><br>
                </label>

                <label for="model">
                    <p>Model:</p>
                    <input type="text" id="model" name="model" required><br><br>
                </label>

                <label for="typ_nadwozia">
                    <p>Typ nadwozia:</p>
                    <input type="text" id="typ_nadwozia" name="typ_nadwozia" required><br><br>
                </label>

                <label for="typ_silnika">
                    <p>Typ silnika:</p>
                    <input type="text" id="typ_silnika" name="typ_silnika"><br><br>
                </label>

                <label for="silnik">
                    <p>Silnik:</p>
                    <input type="text" id="silnik" name="silnik"><br><br>
                </label>

                <label for="kolor">
                    <p>Kolor:</p>
                    <input type="text" id="kolor" name="kolor"><br><br>
                </label>

                <label for="dop_mas_calk">
                    <p>Dopuszczalna masa całkowita:</p>
                    <input type="number" id="dop_mas_calk" name="dop_mas_calk"><br><br>
                </label>

                <label for="mas_wlasna">
                    <p>Masa własna:</p>
                    <input type="number" id="mas_wlasna" name="mas_wlasna"><br><br>
                </label>

                <label for="przebieg">
                    <p>Przebieg:</p>
                    <input type="number" id="przebieg" name="przebieg"><br><br>
                </label>

                <label for="dt_przebiegu">
                    <p>Data przebiegu:</p>
                    <input type="date" id="dt_przebiegu" name="dt_przebiegu"><br><br>
                </label>

                <label for="paliwo">
                    <p>Paliwo:</p>
                    <input type="text" id="paliwo" name="paliwo"><br><br>
                </label>

                <label for="nr_rej">
                    <p>Numer rejestracyjny:</p>
                    <input type="text" id="nr_rej" name="nr_rej" required><br><br>
                </label>

                <label for="pojemnosc">
                    <p>Pojemność silnika:</p>
                    <input type="number" id="pojemnosc" name="pojemnosc"><br><br>
                </label>

                <label for="kraj_prod">
                    <p>Kraj produkcji:</p>
                    <input type="text" id="kraj_prod" name="kraj_prod"><br><br>
                </label>

                <label for="rok_prod">
                    <p>Rok produkcji:</p>
                    <input type="number" id="rok_prod" name="rok_prod" required><br><br>
                </label>

                <label for="skrzynia">
                    <p>Skrzynia biegów:</p>
                    <input type="text" id="skrzynia" name="skrzynia"><br><br>
                </label>

                <label for="ogumienie">
                    <p>Ogumienie:</p>
                    <input type="text" id="ogumienie" name="ogumienie"><br><br>
                </label>

                <label for="dt_przegl">
                    <p>Data przeglądu:</p>
                    <input type="date" id="dt_przegl" name="dt_przegl"><br><br>
                </label>

                <label for="moc">
                    <p>Moc silnika:</p>
                    <input type="text" id="moc" name="moc"><br><br>
                </label>

                <label for="olej">
                    <p>Olej silnikowy:</p>
                    <input type="text" id="olej" name="olej"><br><br>
                </label>

                <label for="naped">
                    <p>Napęd:</p>
                    <input type="text" id="naped" name="naped"><br><br>
                </label>

</div>
                <button type="submit" name="dodaj">Dodaj</button>
            </form>
        </div>
        <?php endif; ?>
    </main>
    <footer>
        <p>&copy Klasa 3R 2024</p>
    </footer>
</body>
</html>

<?php

$db->close();

?>

