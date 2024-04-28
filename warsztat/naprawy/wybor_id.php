<?php
// Połączenie z bazą danych
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
    
    // Sprawdzenie, czy zostało przekazane id rekordu do edycji
    if (isset($_GET['id']) && isset($_GET['submit'])) {
        $id = $_GET['id'];
        
        // Pobranie danych rekordu do edycji
        $sql = "SELECT * FROM naprawa WHERE id = $id";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            header("Location: aktualizacja.php?id='$id'") ;
            
        } else {
            // echo "Nie znaleziono rekordu o podanym ID.";
            echo '<script>alert("Nie znaleziono rekordu o podanym ID.")</script>';
            
        }
    } else {
        
        //  echo "Brak ID rekordu do edycji.";
    }  
}
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aktualizuj</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
<?php require('../components/nav.html'); ?>
    <header>
        <div>
            <h2 id="nazwa">Naprawy <p>//podaj id naprawy</p></h2>

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
            <form action="wybor_id.php" method="get">
                <div>

                
                    <label>
                        <p>ID Zamówienia:</p>
                            <input type="number" name="id" id="id"/>
                            <input type="hidden" name="submit"/>
                    </label>
                </div>
                <button type="submit">Szukaj</button>
            </form>
        </div>
        <?php endif; ?>
    </main>
    <footer>
        <p>&copy Klasa 3R 2024</p>
    </footer>
</body>
</html>