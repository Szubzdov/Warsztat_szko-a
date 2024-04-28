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
            <h2 id="nazwa">Klienci <p>//tabela</p></h2>

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
        <div id="tablica_wynikow">
            <h2>Tabela Klienci</h2>
            <table>
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nazwisko</td>
                        <td>Imię</td>
                        <td>Drugie imię</td>
                        <td>Data ur.</td>
                        <td>Pesel</td>
                        <td>Ulica</td>
                        <td>Nr domu</td>
                        <td>Kod pocztowy</td>
                        <td>Miasto</td>
                        <td>Kraj</td>
                        <td>Narodowość</td>
                        <td>Płeć</td>
                        <td>Telefon</td>
                        <td>Email</td>
                        <td>Nr dowodu</td>
                        <td>Wydany</td>
                    </tr>

                </thead>
                <tbody>
                    <?php ?>
                        <?php while($r = $result->fetch_assoc()) { ?>
                            <tr>
                            <td><?=$r['id']?></td>
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
                                <td><?=$r['plec']?></td>
                                <td><?=$r['nr_tel']?></td>
                                <td><?=$r['email']?></td>
                                <td><?=$r['nr_dow']?></td>
                                <td><?=$r['wydany']?></td>
                            </tr>
                        <?php } ?>

                    <?php ?>

                </tbody>
            </table>
            
        </div>
        <?php endif; ?>
    </main>
    <footer>
        <p>&copy Klasa 3R 2024</p>
    </footer>
</body>
</html>