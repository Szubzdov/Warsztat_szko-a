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
        require('../conn.php');
        $conn = new mysqli($servername,$username, $password, $dbname);

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
    ?>
    <main>
    <div id="formularz">
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
    </main>
   
</body>
</html>