<?php
    ini_set('display_errors', '0');
    $baza = false;
    require('../conn.php');
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
            $e = "Błąd " . mysqli_connect_error();
        break;
}
} else {
    $baza = true;
    $sql = "SELECT * FROM pracownicy";
    $results = $conn->query($sql);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj Pracownicy</title>
    <!-- <title>Warsztat ZSI</title> -->
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
<?php require('../components/nav.html'); ?>
    <header>
        <div>
            <h2 id="nazwa">Pracownicy <p>//tabela</p></h2>

        </div>
        
    </header>
    <div id="under_nav">
        <a href="tabela_prac.php">Tabela</a> 
        <a href="form_pracownicy_insert.php">Dodaj</a> 
        <a href="update_prac.php">Aktualizuj</a>  

    </div>
    <main style="">  
        <?php if(!$baza): ?>
                    <h2><?php echo $e; ?></h2>
                <?php else: ?>
    <div id="tablica_wynikow"  >
            <h2>Tabela Klienci</h2>
            <div style="overflow:auto">

            <table>
                <thead>
                    <tr>
                        <td>Nazwisko</td>
                        <td>Imie</td>
                        <td>Dr. Imie</td>
                        <td>Data ur.</td>
                        <td>Pesel</td>
                        <td>Ulica</td>
                        <td>Nr. domu</td>
                        <td>Kod Pocz.</td>
                        <td>Miasto</td>
                        <td>Kraj</td>
                        <td>Narodowosc</td>
                        <td>Stanowisko</td>
                        <td>Plec</td>
                        <td>Zarobki</td>
                        <td>Data zat.</td>
                        <td>Data zw.</td>
                        <td>Okr. zat.</td>
                        <td>Telefon</td>
                        <td>Email</td>
                        <td>Wykształcenie</td>
                        <td>Zawód</td>
                        <td>Uzytkownik</td>
                        <td></td>
                        <td>Miejsce</td>
                        <td>Departament</td>

                        <td>Szef</td>
                        <td>Nr. dow</td>
                        <td>Wydany</td>
                    </tr>

                </thead>
                <tbody >
                <?php while($r = $results->fetch_assoc()) { ?>
                        <tr>
                            <td><?=$r['nazwisko']?></td>
                            <td><?=$r['imie']?></td>
                            <td><?=$r['imie2']?></td>
                            <td><?=$r['data_ur']?></td>
                            <td><?=$r['pesel']?></td>
                            <td><?=$r['ulica']?></td>
                            <td><?=$r['nr_d']?></td>
                            <td><?=$r['kod_pocz']?></td>
                            <td><?=$r['miasto']?></td>
                            <td><?=$r['kraj']?></td>
                            <td><?=$r['narodowosc']?></td>
                            <td><?=$r['stanowisko']?></td>
                            <td><?=$r['plec']?></td>
                            <td><?=$r['zarobki']?></td>
                            <td><?=$r['data_zatr']?></td>
                            <td><?=$r['data_zw']?></td>
                            <td><?=$r['okr_zatr']?></td>
                            <td><?=$r['nr_tel']?></td>
                            <td><?=$r['email']?></td>
                            <td><?=$r['wykszt']?></td>
                            <td><?=$r['zawod_wy']?></td>
                            <td><?=$r['uzytk']?></td>
                            <td><?=$r['hash']?></td>
                            <td><?=$r['miejsce']?></td>
                            <td><?=$r['depart']?></td>
                            <td><?=$r['szef_id']?></td> 
                            <td><?=$r['nr_dow']?></td>
                            <td><?=$r['wydany']?></td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table> 
        </div> 
    </div>
    <?php endif; ?>
</main>
    <footer>
        <p>&copy Klasa 3R 2024</p>
    </footer>
</body>
</html>