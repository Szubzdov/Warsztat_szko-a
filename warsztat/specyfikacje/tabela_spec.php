<?php 
    require('../conn.php');
    $conn = new mysqli($servername,$username, $password, $dbname);
    $sql = "SELECT * FROM specyfikacja";
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
            <h2 id="nazwa">Specyfikacje <p>//tabela</p></h2>

        </div>
        
    </header>
    <div id="under_nav">
        <a href="tabela_spec.php">Tabela</a> 
        <a href="index.php">Dodaj</a> 
         

    </div>
    <main>
    <div id="tablica_wynikow">
            <h2>Tabela Specyfikacje</h2>
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
                            <td><?=$r['napr_id']?></td>
                            <td><?=$r['spec_id']?></td>
                            <td><?=$r['czesci_id']?></td>
                            <td><?=$r['wartosc']?></td>
                            <td><?=$r['robocizna']?></td>
                            
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