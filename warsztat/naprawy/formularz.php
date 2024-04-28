<?php
   ini_set('display_errors', '0');
    $baza = false;
// Sprawdzenie, czy formularz został wysłany

// Połączenie z bazą danych
require('../conn.php');
$conn = new mysqli($servername,$username, $password, $dbname);

if ($conn->connect_error) {
    $baza = false;
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
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Sprawdzenie, czy wszystkie wymagane pola zostały wypełnione
                    if (isset($_POST["klienci_id"]) && isset($_POST["pojazdy_vin"]) && isset($_POST["data_od"]) && isset($_POST["data_do"]) && isset($_POST["uwagi"])) {
                        // Pobranie danych z formularza
                        $klienci_id = $_POST["klienci_id"];
                        $pojazdy_vin = $_POST["pojazdy_vin"];
                        $data_od = $_POST["data_od"];
                        $data_do = $_POST["data_do"];
                        $uwagi = $_POST["uwagi"];           
        // Zapytanie SQL do dodania nowego rekordu do tabeli Naprawa
        $sql = "INSERT INTO naprawa (klienci_id, pojazdy_vin, data_od, data_do, uwagi) VALUES ('$klienci_id', '$pojazdy_vin', '$data_od', '$data_do', '$uwagi')";
    }
        
        if ($conn->query($sql) === TRUE) {
            // Komunikat o sukcesie, gdy rekord został dodany poprawnie
            echo "Nowy rekord został poprawnie dodany do tabeli Naprawa.";
        } else {
            // Komunikat o błędzie, gdy wystąpił problem z dodawaniem rekordu
            echo "Błąd: " . $sql . "<br>" . $conn->error;
        }

        // Zamknięcie połączenia
        $conn->close();
    } else {
        // Komunikat o błędzie, gdy nie wszystkie wymagane pola zostały wypełnione
        // echo "Wypełnij wszystkie wymagane pola.";
    }
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dodaj nowy rekord do tabeli Naprawa</title>
<link rel="stylesheet" href="../styles/style.css">
</head>
<body>
<?php require('../components/nav.html'); ?>
    <header>
        <div>
            <h2 id="nazwa">Naprawy <p>//dodaj naprawę</p></h2>
            
        </div>
        
    </header>
    <div id="under_nav">
        <a href="tabela_nap.php">Tabela</a> 
        <a href="formularz.php">Dodaj</a> 
        <a href="wybor_id.php">Aktualizuj</a>  

    </div>
    <main>
        <?php if(!$baza): ?>
                <h2><?php echo $e; ?></h2>
            <?php else: ?>
        <div id="formularz">
        <form action="formularz.php" method="post">
            <div>
                <label for="klienci_id">
                    <p>ID Klienta:</p>
                    <select id="klienci_id" name="klienci_id" required>
                        <option value="">----</option>
                        <?php
                        // Połączenie z bazą danych
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "warsztat";
                    
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            die("Błąd połączenia: " . $conn->connect_error);
                        }
                    
                        // Pobranie danych klientów z bazy danych
                        $sql = "SELECT id, nazwisko, imie FROM klienci";
                        $result = $conn->query($sql);
                    
                        // Wyświetlenie opcji w polu rozwijanym
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<option value='".$row['id']."'>".$row['nazwisko']." ".$row['imie']."</option>";
                            }
                        }
                        ?>
                    </select>
                </label>
        
        <label for="pojazdy_vin">
            <p>Numer VIN pojazdu:</p>
            <select id="pojazdy_vin" name="pojazdy_vin" required>
                <option value="">Wybierz Numer VIN:</option>
                <?php
                // Pobranie danych pojazdów z bazy danych
                $sql = "SELECT vin, marka, model FROM pojazdy";
                $result = $conn->query($sql);
            
                // Wyświetlenie opcji w polu rozwijanym
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row['vin']."'>".$row['marka']." ".$row['model']."</option>";
                    }
                }
                ?>
            </select>
        </label>
        
        <label for="data_od">
            <p>Data rozpoczęcia naprawy:</p>
            <input type="date" id="data_od" name="data_od" required><br>
        </label>
        <label for="data_do">
            <p>Przewidywana data zakończenia naprawy:</p>
            <input type="date" id="data_do" name="data_do" required><br>
        </label>
        <label for="uwagi">
            <p>Uwagi:</p>
            <textarea id="uwagi" name="uwagi" rows="5" cols="50" required></textarea><br><br>
        </label>
    </div>
        <button type="submit">Dodaj</button>
        </form>
        </div>
        <?php endif; ?>
    </main>

</body>
<footer>
        <p>&copy Klasa 3R 2024</p>
    </footer>
</html>
