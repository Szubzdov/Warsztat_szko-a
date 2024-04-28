<?php
$id_conn = mysqli_connect('localhost', 'root', '', 'warsztat');

if(mysqli_connect_errno()){
    echo 'Sie nie połączysz, bo: ' . mysqli_connect_error();
    exit();
}



?>