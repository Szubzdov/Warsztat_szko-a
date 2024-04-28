<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz pracownicy</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>

<?php


include('conn.php'); // zaimportowanie pliku do połączenia

$sql_stan = "SELECT * FROM stanowiska;";
$query_stan = mysqli_query($id_conn, $sql_stan);


if(isset($_POST['submit'])){

    $imie = $_POST['imie'] ; 
    $imie2 = $_POST['imie2'] ; 
    $nazw = $_POST['nazw'] ; 
    $plec = $_POST['plec'] ;
    $narodowosc = $_POST['narodowosc'] ; 
    $pesel = $_POST['pesel']; 
    $data_ur = $_POST['datur'] ; 

    $kraj = $_POST['kraj']; 
    $kodpocz = $_POST['kodpocz']; 
    $miasto = $_POST['miasto']; 
    $ulica = $_POST['ulica']; 
    $nr_d = $_POST['nrd'];
    $login = $_POST['uzytk'];

    $zarobki = $_POST['zarobki']; 
    $szef_id = $_POST['szef_id']; 
    $data_zatr = $_POST['data_zatr']; 
    $okr_zart = $_POST['okr_zatr'];
    $nr_tel = $_POST['nr_tel']; 
    $email = $_POST['email']; 
    $wykszt = $_POST['wykszt']; 
    $zawod_wy = $_POST['zawod_wy'];
    $nr_dow = $_POST['nr_dow']; 
    $wydany = $_POST['wydany']; 
    $stanowisko = $_POST['stanowisko']; 
    $miejsce = $_POST['miejsce']; 
    $dept = $_POST['dept'];
    

    $sql = "INSERT INTO pracownicy (`id`, `nazwisko`, `imie`, `imie2`, `data_ur`, `pesel`, `ulica`, `nr_d`, `kod_pocz`, `miasto`, `kraj`, `narodowosc`, `stanowisko`, `plec`, `zarobki`, `data_zatr`, `data_zw`, `okr_zatr`, `nr_tel`, `email`, `wykszt`, `zawod_wy`, `uzytk`, `hash`, `miejsce`, `depart`, `szef_id`, `nr_dow`, `wydany`)
    VALUES (null,'$nazw','$imie','$imie2','$data_ur','$pesel', '$ulica','$nr_d', '$kodpocz', '$miasto','$kraj', '$narodowosc','$stanowisko','$plec', '$zarobki','$data_zatr','','$okr_zart', '$nr_tel', '$email', '$wykszt', '$zawod_wy','$login','','$miejsce','$dept',null,'$nr_dow','$wydany');";
    mysqli_query($id_conn, $sql);
    unset($_POST);
    header("Location: form_pracownicy_insert.php");
    exit;

}

?>
<body>
<?php require('../components/nav.html'); ?>
    <header>
        <div>
            <h2 id="nazwa">Pracownicy <p>//dodaj pracownika</p></h2>

        </div>
        
    </header>
    <div id="under_nav">
        <a href="tabela_prac.php">Tabela</a> 
        <a href="form_pracownicy_insert.php">Dodaj</a> 
        <a href="update_prac.php">Aktualizuj</a>  

    </div>
    <main style="padding:0px;display:block">
        <div id="formularz">
        <form action="form_pracownicy_insert.php" method="post">
        <h2>Formularz Pracownicy</h2>
            <table>
                
                <tr><td>Imię:                   </td><td><input type="text" name="imie" required>        </td></tr>
                <tr><td>Drugie Imię:            </td><td><input type="text" name="imie2" >       </td></tr>
                <tr><td>Nazwisko:               </td><td><input type="text" name="nazw" required>        </td></tr>
                <tr><td>Narodowość:             </td><td><input type="text" name="narodowosc">  </td></tr>
                <tr><td>Pesel:                  </td><td><input type="number" name="pesel">     </td></tr>
                <tr><td>Data Urodzenia:         </td><td><input type="date" name="datur" required>      </td></tr>
                <tr><td>Płeć:                   </td><td><select name="plec" required>
                                                            <option value="M">Mężczyzna</option>
                                                            <option value="K">Kobieta</option>
                                                        </select>                               </td></tr>
    
                <tr><td>Kraj:                   </td><td><input type="text" name="kraj">        </td></tr>
                <tr><td>Kod pocztowy:           </td><td><input type="text" name="kodpocz">    </td></tr>
                <tr><td>Miasto:                 </td><td><input type="text" name="miasto" required>      </td></tr>
                <tr><td>Ulica:                  </td><td><input type="text" name="ulica">       </td></tr>
                <tr><td>Numer domu:             </td><td><input type="text" name="nrd">        </td></tr>
                
                <tr><td>Login:                  </td><td><input type="text" name="uzytk">       </td></tr>
                <tr><td>Staniowisko:            </td><td><select name="stanowisko" required>
                                    <?php while($row = mysqli_fetch_array($query_stan)){ ?>
                                        <option value="<?= $row['nazwa'] ?>"><?= $row['nazwa'] ?></option>
                                    <?php } ?>
                                                         </select>                              </td></tr>
                <tr><td>Zarobki:                </td><td><input type="number" name="zarobki" required>   </td></tr>
                <tr><td>ID Menadżera:           </td><td><input type="number" name="szef_id" required>   </td></tr>
                <tr><td>Data zatrudnienia:      </td><td><input type="date" name="data_zatr" required>   </td></tr>
                <tr><td>Miejsce zatrudnienia:   </td><td><input type="text" name="miejsce" required>     </td></tr>
                <tr><td>Dział:                  </td><td><input type="text" name="dept">        </td></tr>
                <tr><td>Data zatrudnienia:      </td><td><input type="date" name="data_zatr">   </td></tr>
                <tr><td>Okres zatrudnienia:     </td><td><input type="text" name="okr_zatr">    </td></tr>
                <tr><td>Numer telefonu:         </td><td><input type="tel" name="nr_tel">       </td></tr>
                <tr><td>Email:                  </td><td><input type="email" name="email">      </td></tr>
                <tr><td>Wykształcenie:          </td><td><input type="text" name="wykszt" required>      </td></tr>
                <tr><td>Zawód wyuczony:         </td><td><input type="text" name="zawod_wy">    </td></tr>
                <tr><td>Numer dowodu:           </td><td><input type="text" name="nr_dow">      </td></tr>
                <tr><td>Wydany:                 </td><td><input type="date" name="wydany">      </td></tr>
            </table>
            <button type="submit" name="submit">Dodaj</button>
            
            </form>
        </div>    
                
    </main>
</body>
</html>