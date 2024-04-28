<?php
// Połączenie z bazą danych
require('../conn.php');

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    
    </main>
</body>
</html>