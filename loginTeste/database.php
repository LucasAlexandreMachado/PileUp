<?php

$host = "endereço_do_banco";
$dbname = "nome_do_banco_de_dados";
$username = "username_do_banco";
$password = "senha_do_banco";

$mysqli = new mysqli(hostname: $host,
                     username: $username,
                     password: $password,
                     database: $dbname);
                     
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;