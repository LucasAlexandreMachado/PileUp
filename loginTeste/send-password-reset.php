<?php

$email = $_POST["email"];

$token = bin2hex(random_bytes(16));

$token_hash = hash("sha256", $token);

$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

$mysqli = require __DIR__ . "/database.php";

$sql = "UPDATE user
        SET reset_token_hash = ?,
            reset_token_expires_at = ?
        WHERE email = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("sss", $token_hash, $expiry, $email);

$stmt->execute();

if ($mysqli->affected_rows) {

    $mail = require __DIR__ . "/mailer.php";

    $mail->setFrom("noreply@example.com");
    $mail->addAddress($email);
    $mail->Subject = "Recuperar Senha";
    $mail->Body = <<<END

    Clique <a href="http://pileup.byethost24.com/loginTeste/reset-password.php?token=$token">Aqui</a> 
    para resetar sua senha.

    END;

    try {

        $mail->send();

    } catch (Exception $e) {

        echo "A mensagem não pode ser enviada. Mailer error: {$mail->ErrorInfo}";

    }

}

echo "Mensagem enviada, Olhe seu Email";