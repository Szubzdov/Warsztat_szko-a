<?php 
    require('../conn.php');
    $conn = new mysqli($servername,$username, $password, $dbname);
    $sql = "SELECT * FROM warsztat";
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
            <h2 id="nazwa">Warsztat <p>//tabela</p></h2>

        </div>
        
    </header>
    <div id="under_nav">
        <a href="tabela_war.php">Tabela</a> 
        <a href="warsztat.php">Dodaj</a> 
         

    </div>
    <main>
    <div id="tablica_wynikow">
            <h2>Tabela Warsztat</h2>
            <table>
                <thead>
                    <tr>
                        <td>ID naprawy</td>
                        <td>ID specjalizacji</td>
                        <td>ID części</td>
                        <td>Wartość</td>
                        <td>Robocizna</td>
                       
                       
                    </tr>

                </thead>
                <tbody>
                <?php while($r = $results->fetch_assoc()) { ?>
                        <tr>
                            <td><?=$r['id']?></td>
                            <td><?=$r['adres']?></td>
                            <td><?=$r['miasto']?></td>
                            <td><?=$r['wojewodztwo']?></td>
                            <td><?=$r['kraj']?></td>
                            <td><?=$r['kod_pocztowy']?></td>
                            <td><?=$r['telefon']?></td>
                            <td><?=$r['manager_id']?></td>
                            <td><?=$r['man_mag_id']?></td>
                            <td><?=$r['regon']?></td><!-- bład w bazie dantch ("region") -->
                            <td><?=$r['krs']?></td>
                            <td><?=$r['symbol']?></td>
                            
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