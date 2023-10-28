<?php

session_start();

$token = $_POST["token"];

$token_hash = hash("sha256", $token);

$mysqli = require __DIR__ . "/database.php";

$sql = "SELECT * FROM user
        WHERE reset_token_hash = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if ($user === null) {
    $_SESSION['error'] = "Token não encontrado";
} elseif (strtotime($user["reset_token_expires_at"]) <= time()) {
    $_SESSION['error'] = "Token expirou";
} elseif (strlen($_POST["password"]) < 8) {
    $_SESSION['error'] = "A senha precisa ter pelo menos 8 caracteres";
} elseif (!preg_match("/[a-z]/i", $_POST["password"])) {
    $_SESSION['error'] = "A senha precisa conter pelo menos uma letra";
} elseif (!preg_match("/[0-9]/", $_POST["password"])) {
    $_SESSION['error'] = "A senha precisa conter pelo menos um numero";
} elseif ($_POST["password"] !== $_POST["password_confirmation"]) {
    $_SESSION['error'] = "As senhas não combinam";
} else {
    $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "UPDATE user
            SET password_hash = ?,
                reset_token_hash = NULL,
                reset_token_expires_at = NULL
            WHERE id = ?";

    $stmt = $mysqli->prepare($sql);

    $stmt->bind_param("ss", $password_hash, $user["id"]);

    $stmt->execute();

    $_SESSION['success'] = "Senha atualizada, você pode fazer login agora";
}

header("Location: reset-password.php?token=" . urlencode($token));
exit;
?>
