<?php 
    require('../conn.php');
    $conn = new mysqli($servername,$username, $password, $dbname);
    $sql = "SELECT * FROM naprawa";
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
            <h2 id="nazwa">Naprawy <p>//tabela</p></h2>

        </div>
        
    </header>
    <div id="under_nav">
        <a href="tabela_nap.php">Tabela</a> 
        <a href="formularz.php">Dodaj</a> 
        <a href="wybor_id.php">Aktualizuj</a>  

    </div>
    <main>
    <div id="tablica_wynikow">
            <h2>Tabela Klienci</h2>
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
                            <td><?=$r['klienci_id']?></td>
                            <td><?=$r['pojazdy_vin']?></td>
                            <td><?=$r['data_od']?></td>
                            <td><?=$r['data_do']?></td>
                            <td><?=$r['uwagi']?></td>
                            
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </main>
    <footer>
        <p>&copy Klasa 3R 2024</p>
    </footer>
</body>
</html>