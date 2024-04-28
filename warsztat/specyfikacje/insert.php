<?php
    require('../conn.php');
    $napr = $_POST['naprId'];
    $czec = $_POST['czecId'];
    $wart = $_POST['wartosc'];
    $rob = $_POST['robocizna'];
    $sql = "INSERT INTO `specyfikacja` (`spec_id`, `napr_id`, `czesci_id`, `wartosc`, `robocizna`) VALUES ('','$napr','$czec','$wart','$rob');";
    $conn = new mysqli($servername,$username, $password, $dbname);
    $query = $conn->query($sql);
    if($query == true) {
        echo "Dodano nowy rekord";
    }
    else {
        echo "Błąd - nie dodano nowego rekordu";
    }
    $conn->close();
?>