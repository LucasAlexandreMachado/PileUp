<?php

session_start();

if (empty($_POST["name"])) {
    $_SESSION['error'] = "O nome é obrigatório";
} elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = "É necessário um email válido";
} elseif (strlen($_POST["password"]) < 8) {
    $_SESSION['error'] = "A senha deve ter no mínimo 8 caracteres";
} elseif (!preg_match("/[a-z]/i", $_POST["password"])) {
    $_SESSION['error'] = "A senha deve ter no mínimo uma letra";
} elseif (!preg_match("/[0-9]/", $_POST["password"])) {
    $_SESSION['error'] = "A senha deve ter no mínimo um número";
} elseif ($_POST["password"] !== $_POST["password_confirmation"]) {
    $_SESSION['error'] = "As senhas devem ser iguais";
} else {
    $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $mysqli = require __DIR__ . "/database.php";

    $sql = "INSERT INTO user (name, email, password_hash)
            VALUES (?, ?, ?)";

    $stmt = $mysqli->stmt_init();

    if (!$stmt->prepare($sql)) {
        $_SESSION['error'] = "Erro SQL: " . $mysqli->error;
    } else {
        $stmt->bind_param("sss", $_POST["name"], $_POST["email"], $password_hash);

        if ($stmt->execute()) {
            header("Location: login.php");
            exit;
        } else {
            if ($mysqli->errno === 1062) {
                $_SESSION['error'] = "Email já cadastrado";
            } else {
                $_SESSION['error'] = $mysqli->error . " " . $mysqli->errno;
            }
        }
    }
}

header("Location: signup.php");
exit;
