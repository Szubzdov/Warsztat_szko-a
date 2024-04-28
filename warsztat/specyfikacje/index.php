<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Specyfikacje</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
<?php require('../components/nav.html'); ?>
    <header>
        <div>
            <h2 id="nazwa">Specyfikacje <p>//dodaj specyfikacje</p></h2>

        </div>
        
    </header>
    <div id="under_nav">
        <a href="tabela_spec.php">Tabela</a> 
        <a href="index.php">Dodaj</a> 
       

    </div>
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
        function skrypt1($conn) {
            $sql = "SELECT id FROM naprawa";
            $query = $conn->query($sql);
            if($query == false) {
                echo "Błąd zapytania";
            }
            while($row = $query->fetch_array()) {
                echo "<option value='".$row['id']."'>";
                echo $row['id'];
                echo "</option>";
            }
            // $conn->close();
        }
        function skrypt2($conn) {
            $sql = "SELECT * FROM czesci";
            $query = $conn->query($sql);
            if($query === false) {
                echo "Błąd zapytania";
            }else{
                while($row = $query->fetch_array()) {
                    echo "<option value='".$row['id']."'>";
                    echo $row['id'];
                    echo "</option>";
                }

            }
            // $query->close();
        }
    }
    ?>
    <main>
    <div id="formularz">
    <?php if(!$baza): ?>
                <h2><?php echo $e; ?></h2>
            <?php else: ?>
    <form action="insert.php" method="post">
        <h2>Formularz Specyfikacje</h2>
        <div>
        
            <label>
                <p>Naprawy ID:</p>
                <select name="naprId">
                    <?php
                    skrypt1($conn);
                    ?>
                </select>

            </label>
            <label>
                <p>Części ID:</p>
                <select name="czecId">
                    <?php
                    skrypt2($conn);
                    ?>
                </select>
            </label>
            <label>
                <p>Wartość:</p>
                <td><input type="number" step="0.01" name="wartosc"></td>
            </label>
            <label>
                <p>Robocizna</p>
                <td><input type="number" step="0.01" name="robocizna"></td>
            </label>
            
            
        </div>
        <button type="submit">Dodaj</button>
    </form>
    </div>
    <?php endif; ?>
    </main>
    <footer>
        <p>&copy Klasa 3R 2024</p>
    </footer>
</body>
</html>