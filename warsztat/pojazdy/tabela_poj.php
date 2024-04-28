<?php 
    require('../conn.php');
    $conn = new mysqli($servername,$username, $password, $dbname);
    $sql = "SELECT * FROM pojazdy";
    $results = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj </title>
    <!-- <title>Warsztat ZSI</title> -->
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
<?php require('../components/nav.html'); ?>
    <header>
        <div>
            <h2 id="nazwa">Pojazdy <p>//tabela</p></h2>

        </div>
        
    </header>
    <div id="under_nav">
        <a href="tabela_poj.php">Tabela</a> 
        <a href="pojazdy.php">Dodaj</a> 
        <a href="#">Aktualizuj</a>  

    </div>
    <main>
    <div id="tablica_wynikow">
            <h2>Tabela Pojazdy</h2>
            <div style="overflow:auto">
            <table>
                <thead>
                    <tr>
                        <td>Klient ID</td>
                        <td>VIN</td>
                        <td>Data od</td>
                        <td>Data do</td>
                        <td>Uwagi</td>
                       
                       
                    </tr>

                </thead>
                <tbody>
                <?php while($r = $results->fetch_assoc()) { ?>
                        <tr>
                            <td><?=$r['vin']?></td>
                            <td><?=$r['marka']?></td>
                            <td><?=$r['model']?></td>
                            <td><?=$r['typ_nadwozia']?></td>
                            <td><?=$r['typ_silnika']?></td>
                            <td><?=$r['silnik']?></td>
                            <td><?=$r['kolor']?></td>
                            <td><?=$r['dop_mas_calk']?></td>
                            <td><?=$r['mas_wlasna']?></td>
                            <td><?=$r['przebieg']?></td>
                            <td><?=$r['dt_przebiegu']?></td>
                            <td><?=$r['paliwo']?></td>
                            <td><?=$r['nr_rej']?></td>
                            <td><?=$r['pojemnosc']?></td>
                            <td><?=$r['kraj_prod']?></td>
                            <td><?=$r['rok_prod']?></td>
                            <td><?=$r['skrzynia']?></td>
                            <td><?=$r['ogumienie']?></td>
                            <td><?=$r['dt_przegl']?></td>
                            <td><?=$r['moc']?></td>
                            <td><?=$r['olej']?></td>
                            <td><?=$r['naped']?></td>
                            
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
                </div>
        </div>
    </main>
    <footer>
        <p>&copy Klasa 3R 2024</p>
    </footer>
</body>
</html>