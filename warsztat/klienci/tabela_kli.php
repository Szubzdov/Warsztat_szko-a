<?php 
    require('../conn.php');

    
    try{
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql = "SELECT * FROM klienci";
        $result = $conn->query($sql);
        $baza = true;
    }catch(e){

        $baza = false;
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
    <div id="tablica_wynikow">
            <h2>Tabela Klienci</h2>
            <table>
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nazwisko</td>
                        <td>Imie</td>
                        <td>Drugie imie</td>
                        <td>Data ur.</td>
                        <td>Pesel</td>
                        <td>Ulica</td>
                        <td>Nr domu</td>
                        <td>Kod pocztowy</td>
                        <td>Miasto</td>
                        <td>Kraj</td>
                        <td>Narodowosc</td>
                        <td>Płeć</td>
                        <td>Telefon</td>
                        <td>Email</td>
                        <td>Nr dowodu</td>
                        <td>Wydany</td>
                    </tr>

                </thead>
                <tbody>
                    <?php if($baza === true){?>
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

                    <?php }?>

                </tbody>
            </table>
           
        </div>
    </main>
    <footer>
        <p>&copy Klasa 3R 2024</p>
    </footer>
</body>
</html>