<?php
//conexão
require_once 'db_connect.php';

//sessão
session_start();

//verificação
if(!isset($_SESSION['loged'])):
    header('Location:login.php');
endif;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo $_SESSION['id'];?></p>
    <h1>bem vindo</h1>
    <a href="logout.php">sair</a>
</body>
</html>