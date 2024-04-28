<?php

ini_set('display_errors', '0');
$baza = false;
    require('../conn.php');
    $conn = new mysqli($servername,$username, $password, $dbname);

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
    $sql = "SELECT * FROM czesci";
    $results = $conn->query($sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj Części</title>
    <!-- <title>Warsztat ZSI</title> -->
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
<?php require('../components/nav.html'); ?>
    <header>
        <div>
            <h2 id="nazwa">Części <p>//tabela</p></h2>

        </div>
        
    </header>
    <div id="under_nav">
        <a href="tabela_cze.php">Tabela</a> 
        <a href="insert.php">Dodaj</a> 
        

    </div>
    <main>
    <?php if(!$baza): ?>
                <h2><?php echo $e; ?></h2>
            <?php else: ?>
    <div id="tablica_wynikow">
            <h2>Tabela Części</h2>
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
                            <td><?=$r['id']?></td>
                            <td><?=$r['nazwa']?></td>
                            <td><?=$r['symbol']?></td>
                            <td><?=$r['producent']?></td>
                            <td><?=$r['data_prod']?></td>
                            
                        </tr>
                    <?php } ?>

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