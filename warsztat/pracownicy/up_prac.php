<?php
    $id_conn = mysqli_connect('localhost','root','','warsztat');
    $id = $_POST['id'] ?? 1; // JAK CHCESZ TO USUŃ DEAFULTA


    if(isset($_POST['up'])){
        $update = "UPDATE pracownicy SET nazwisko = '".$_POST['nazwisko']."',    imie = '".$_POST['imie']."' ,       imie2 = '".$_POST['imie2']."',    data_ur = '".$_POST['data_ur']."',         pesel = '".$_POST['pesel']."',       ulica='".$_POST['ulica']."', nr_d = '".$_POST['nr_d']."',
                                         kod_pocz = '".$_POST['kod_pocz']."',  miasto = '".$_POST['miasto']."' ,      kraj = '".$_POST['kraj']."',  narodowosc = '".$_POST['narodowosc']."', stanowisko = '".$_POST['stanowisko']."', plec = '".$_POST['plec']."',
                                         zarobki =  '".$_POST['zarobki']."',  data_zw = '".$_POST['data_zw']."' , okr_zatr = '".$_POST['okr_zatr']."',  nr_tel = '".$_POST['nr_tel']."',          email = '".$_POST['email']."',    wykszt = '".$_POST['wykszt']."',
                                         zawod_wy = '".$_POST['zawod_wy']."', miejsce = '".$_POST['miejsce']."' ,   depart = '".$_POST['depart']."',    nr_dow = '".$_POST['nr_dow']."',         wydany = '".$_POST['wydany']."'
                                         WHERE id = ".$_POST['id'].";";
        mysqli_query($id_conn , $update);
        header("Location: update_prac.php");
        
    }

    $sel = "SELECT * FROM pracownicy WHERE id = '".$id."';";
    $sql_q = mysqli_query($id_conn , $sel);


    // required JEST UŻYTE W input TYLKO JAK W BAZIE DANYCH POLE NIE JEST TYPU NULL
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Pracowników</title>
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
<?php 
    while($sql_q_w = mysqli_fetch_array($sql_q)){ 
?>
    <main>
    <div id="formularz">
        <form action="up_prac.php" method="post">
        <div>
            <label for="nazwisko">
                <p>Nazwisko:</p>
                <input type="text" id="nazwisko" name="nazwisko" value="<?= $sql_q_w['nazwisko'] ?>" required><br>
            </label>

            <label for="imie">
                <p>Imię:</p>
                <input type="text" id="imie" name="imie" value="<?= $sql_q_w['imie'] ?>" required><br>
            </label>

            <label for="imie2">
                <p>Drugie imię:</p>
                <input type="text" id="imie2" name="imie2" value="<?= $sql_q_w['imie2'] ?>"><br>
            </label>

            <label for="data_ur">
                <p>Data urodzenia:</p>
                <input type="date" id="data_ur" name="data_ur" value="<?= $sql_q_w['data_ur'] ?>"><br>
            </label>

            <label for="pesel">
                <p>PESEL:</p>
                <input type="text" id="pesel" name="pesel" maxlength="11" value="<?= $sql_q_w['pesel'] ?>"><br>
            </label>

            <label for="ulica">
                <p>Ulica:</p>
                <input type="text" id="ulica" name="ulica" value="<?= $sql_q_w['ulica'] ?>"><br>
            </label>

            <label for="nr_d">
                <p>Numer domu:</p>
                <input type="text" id="nr_d" name="nr_d" value="<?= $sql_q_w['nr_d'] ?>"><br>
            </label>

            <label for="kod_pocz">
                <p>Kod pocztowy:</p>
                <input type="text" id="kod_pocz" name="kod_pocz" maxlength="6" value="<?= $sql_q_w['kod_pocz'] ?>"><br>
            </label>

            <label for="miasto">
                <P>Miasto:</P>
                <input type="text" id="miasto" name="miasto" value="<?= $sql_q_w['miasto'] ?>" required><br>
            </label>

            <label for="kraj">
                <p>Kraj:</p>
                <input type="text" id="kraj" name="kraj" value="<?= $sql_q_w['kraj'] ?>"><br>
            </label>

            <label for="narodowosc">
                <p>Narodowość:</p>
                <input type="text" id="narodowosc" name="narodowosc" value="<?= $sql_q_w['narodowosc'] ?>"><br>
            </label>

            <label for="stanowisko">
                <p>Stanowisko:</p>
                <select name="stanowisko" id="stanowisko">
                    <?php
                        $sql_st_p = "SELECT * FROM stanowiska INNER JOIN pracownicy ON pracownicy.stanowisko = stanowiska.nazwa WHERE pracownicy.id = '".$id."';";
                        $sql_st_p = mysqli_query($id_conn , $sql_st_p);
                        while($row = mysqli_fetch_array($sql_st_p)){
                            echo "<option value='".$row['nazwa']."' selected hidden>";
                            echo $row['nazwa'];
                            echo "</option>";
                        }

                        $sql_s = "SELECT * FROM stanowiska";
                        $sql_s_w = mysqli_query($id_conn, $sql_s);
                        while($row = mysqli_fetch_array($sql_s_w)){
                            echo "<option value='".$row['nazwa']."'>";
                            echo $row['nazwa'];
                            echo "</option>";
                        }
                    ?>
                </select><br>
            </label>

            <label for="plec"> <!-- TU PROBLEM W UPDATE --->
                <p>Płeć:</p>
                <select id="plec" name="plec" value="<?= $sql_q_w['plec'] ?>">
                    <option value="M">M</option>
                    <option value="K">K</option>
                </select><br>
            </label>

            <label for="zarobki">
                <p>Zarobki:</p>
                <input type="number" id="zarobki" name="zarobki" value="<?= $sql_q_w['zarobki'] ?>" required><br>
            </label>

            <label for="data_zw">
                <p>Data zwolnienia:</p>
                <input type="date" id="data_zw" name="data_zw" value="<?= $sql_q_w['data_zw'] ?>"><br>
            </label>

            <label for="okr_zatr">
                <p>Okres zatrudnienia:</p>
                <input type="text" id="okr_zatr" name="okr_zatr" value="<?= $sql_q_w['okr_zatr'] ?>"><br>
            </label>

            <label for="nr_tel">
                <p>Nr Telefonu:</p>
                <input type="number" id="nr_tel" name="nr_tel" max="999999999" value="<?= $sql_q_w['nr_tel'] ?>"><br>
            </label>

            <label for="email">
                <p>Email:</p>
                <input type="email" id="email" name="email" value="<?= $sql_q_w['email'] ?>"><br>
            </label>

            <label for="wykszt">
                <p>Wykształcenie:</p>
                <input type="text" id="wykszt" name="wykszt" value="<?= $sql_q_w['wykszt'] ?>" required><br>
            </label>

            <label for="zawod_wy">
                <p>Zawód wykształcony:</p>
                <input type="text" id="zawod_wy" name="zawod_wy" value="<?= $sql_q_w['zawod_wy'] ?>"><br>
            </label>

            <label for="miejsce">
                <p>Miejsce:</p>
                <input type="text" id="miejsce" name="miejsce" value="<?= $sql_q_w['miejsce'] ?>"><br>
            </label>

            <label for="depart">
                <p>Departament:</p>
                <input type="text" id="depart" name="depart" value="<?= $sql_q_w['depart'] ?>"><br>
            </label>

            <label for="szef_id">
                <p>Szef ID:</p>
                <input type="number" id="szef_id" name="szef_id" value="<?= $sql_q_w['szef_id'] ?>" disabled><br> <!-- JEST ATRYBUT disabled BO BYŁ Z TYM PROMBLEM W UPDATE --->
            </label>

            <label for="nr_dow">
                <p>Numer dowodu:</p>
                <input type="text" id="nr_dow" name="nr_dow" value="<?= $sql_q_w['nr_dow'] ?>" maxlength="11" ><br>
            </label>

            <label for="wydany">
                <p>Wydany:</p>
                <input type="date" id="wydany" name="wydany" value="<?= $sql_q_w['wydany'] ?>"><br>
            </label>

            <input type="hidden" name="id" value='"<?=$sql_q_w['id']?>"'><br> <!-- TU PO PROSTU PRZEKAZUJE DALEJ id -->
                    </div>
          
            <button type="submit" name="up">Update</button>
        
        </form>
                    </div>
    </main>
    <?php } ?>
</body>
</html>
<?php mysqli_close($id_conn); ?>