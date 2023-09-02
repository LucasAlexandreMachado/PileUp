<?php 
//conexão com o banco de dados

$servername = "localhost";
$username_db = "root";
$password = "";
$db_name = "blogdata";

$connect = mysqli_connect($servername, $username_db, $password, $db_name);

if (mysqli_connect_error()):
    echo "Falha na conexão:".mysqli_connect_error();
endif;