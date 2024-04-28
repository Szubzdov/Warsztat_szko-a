<?php
function addClient($nazwisko, $imie, $imie2, $data_ur, $pesel, $ulica, $nr_d, $kod_pocz, $miasto, $kraj, $narodowosc, $plec, $nr_tel, $email, $nr_dow, $wydany)
{
    require('../conn.php');
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    

    $stmt = $conn->prepare("INSERT INTO klienci (nazwisko, imie, imie2, data_ur, pesel, ulica, nr_d, kod_pocz, miasto, kraj, narodowosc, plec, nr_tel, email, nr_dow, wydany) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssssssss", $nazwisko, $imie, $imie2, $data_ur, $pesel, $ulica, $nr_d, $kod_pocz, $miasto, $kraj, $narodowosc, $plec, $nr_tel, $email, $nr_dow, $wydany);

    
    $nazwisko = htmlspecialchars(strip_tags($nazwisko));
    $imie = htmlspecialchars(strip_tags($imie));
    $imie2 = htmlspecialchars(strip_tags($imie2));
    $data_ur = htmlspecialchars(strip_tags($data_ur));
    $pesel = htmlspecialchars(strip_tags($pesel));
    $ulica = htmlspecialchars(strip_tags($ulica));
    $nr_d = htmlspecialchars(strip_tags($nr_d));
    $kod_pocz = htmlspecialchars(strip_tags($kod_pocz));
    $miasto = htmlspecialchars(strip_tags($miasto));
    $kraj = htmlspecialchars(strip_tags($kraj));
    $narodowosc = htmlspecialchars(strip_tags($narodowosc));
    $plec = htmlspecialchars(strip_tags($plec));
    $nr_tel = htmlspecialchars(strip_tags($nr_tel));
    $email = htmlspecialchars(strip_tags($email));
    $nr_dow = htmlspecialchars(strip_tags($nr_dow));
    $wydany = htmlspecialchars(strip_tags($wydany));

    if ($stmt->execute()) {
        // echo '<script>alert("Pomyślnie dodano.")</script>';
        header("Location: in_kli.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}


$nazwisko = $_POST['nazwisko'];
$imie = $_POST['imie'];
$imie2 = $_POST['imie2'];
$data_ur = $_POST['data_ur'];
$pesel = $_POST['pesel'];
$ulica = $_POST['ulica'];
$nr_d = $_POST['nr_d'];
$kod_pocz = $_POST['kod_pocz'];
$miasto = $_POST['miasto'];
$kraj = $_POST['kraj'];
$narodowosc = $_POST['narodowosc'];
$plec = $_POST['plec'];
$nr_tel = $_POST['nr_tel'];
$email = $_POST['email'];
$nr_dow = $_POST['nr_dow'];
$wydany = $_POST['wydany'];

addClient($nazwisko, $imie, $imie2, $data_ur, $pesel, $ulica, $nr_d, $kod_pocz, $miasto, $kraj, $narodowosc, $plec, $nr_tel, $email, $nr_dow, $wydany);


?>