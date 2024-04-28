<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edytuj rekord w tabeli Naprawa</title>
<link rel="stylesheet" href="../styles/style.css">
</head>
<body>
<?php require('../components/nav.html'); ?>
    <header>
        <div>
            <h2 id="nazwa">Naprawy <p>//aktualizuj</p></h2>

        </div>
        
    </header>
    <div id="under_nav">
        <a href="tabela_nap.php">Tabela</a> 
        <a href="formularz.php">Dodaj</a> 
        <a href="wybor_id.php">Aktualizuj</a>  

    </div>
<!-- <h2>Edytuj rekord w tabeli Naprawa</h2> -->

<?php
// Połączenie z bazą danych
require('../conn.php');

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

// Sprawdzenie, czy zostało przekazane id rekordu do edycji
if (!isset($_GET['id'])) {
    echo "błąąąąd";
}else{
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM naprawa WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            ?>
            <main>
                <div id="formularz">
                <form action="aktualizacja.php?id=<?= $id ?>" method="post">
                    <div>

                    <label for="klienci_id">
                        <p>ID Klienta:</p>
                        <input type="text" id="klienci_id" name="klienci_id" value="<?= intval($row['klienci_id']) ?>" required><br>
                                    
                    </label>

                    <label for="pojazdy_vin">
                        <p>Numer VIN pojazdu:</p>
                        <input type="text" id="pojazdy_vin" name="pojazdy_vin" value="<?= $row['pojazdy_vin'] ?>" required><br>
                    
                    </label>
                    <label for="data_od">
                        <p>Data rozpoczęcia naprawy:</p>
                        <input type="date" id="data_od" name="data_od" value="<?= $row['data_od'] ?>" required><br>
                        </label>
                 
                    <label for="data_do">
                        <p>Przewidywana data zakończenia naprawy:</p>
                        <input type="date" id="data_do" name="data_do" value="<?= $row['data_do'] ?>" required><br>
                    </label>
                    <label for="uwagi">
                        <p>Uwagi:</p>
                        <textarea id="uwagi" name="uwagi" rows="4" cols="50" required><?= $row['uwagi'] ?></textarea><br><br>
                    </label>
                    
                </div>
                <button type="submit">Zaktualizuj rekord</button>
                </form>

            <?php

        }
    


        // Wyświetlenie formularza wypełnionego danymi rekordu do edycji
       

        // Sprawdzenie, czy formularz został wysłany (dane zostały zaktualizowane)
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Pobranie danych z formularza
            $klienci_id = $_POST["klienci_id"];
            $pojazdy_vin = $_POST["pojazdy_vin"];
            $data_od = $_POST["data_od"];
            $data_do = $_POST["data_do"];
            $uwagi = $_POST["uwagi"];

            // Zaktualizowanie rekordu w tabeli Naprawa
            $update_sql = "UPDATE naprawa SET klienci_id='$klienci_id', pojazdy_vin='$pojazdy_vin', data_od='$data_od', data_do='$data_do', uwagi='$uwagi' WHERE id=$id";

            if ($conn->query($update_sql) === TRUE) {
                echo "Rekord został zaktualizowany pomyślnie.";
            } else {
                echo "Błąd podczas aktualizacji rekordu: " . $conn->error;
            }
        }
    }   
}

// Zamknięcie połączenia
$conn->close();
?>

</body>
</html>
