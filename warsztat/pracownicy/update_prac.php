<?php
    $id_conn = mysqli_connect('localhost','root','','warsztat');
    $sql = "SELECT * FROM pracownicy";
    $sql_q = mysqli_query($id_conn , $sql);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
<?php require('../components/nav.html'); ?>
    <header>
        <div>
            <h2 id="nazwa">Pracownicy <p>//aktualizacja</p></h2>
            
        </div>
        
    </header>
    <div id="under_nav">
        <a href="tabela_prac.php">Tabela</a> 
        <a href="form_pracownicy_insert.php">Dodaj</a> 
        <a href="update_prac.php">Aktualizuj</a>  

    </div>
    <main>
        <div id="formularz">
            <form action="up_prac.php" method="post">
                <div>
                    <label for="kogo">
                        <p>Kogo Chcesz UPDATE:</p>
                        <select name="id" id="kogo">
                            <?php
                                while($row = mysqli_fetch_array($sql_q)){
                                    echo "<option value='".$row['id']."'>";
                                    echo $row['imie'] . " " . $row['nazwisko'];
                                    echo "</option>";
                                }
                            ?>
                        </select>
                    </label>
                </div>
                <button type="submit">Dodaj</button>
            </form>
            </div>
    </main>
</body>
</html>
<?php mysqli_close($id_conn); ?>