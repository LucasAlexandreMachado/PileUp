<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Recuperar senha</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="style.css" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>





    <form method="post" action="process-reset-password.php">

        <h1>Recuperar senha</h1><br>

        <input type="hidden" name="token" value="<?= htmlspecialchars($_GET["token"]) ?>">

        <label for="password">Nova senha</label><br>
        <input type="password" id="password" name="password" class="input_1"><br>

        <label for="password_confirmation">Repita a nova senha</label><br>
        <input type="password" id="password_confirmation" class="input_1"
               name="password_confirmation"><br>

               <input type="checkbox" class="showPassword" onclick="mostrarSenha()"><label class="">Mostrar Senha</label><br>

        <button class="login" style="margin-top:10px;">Enviar</button><br>
        <a class="link" href="login.php" name="redirect_signup">Voltar para o login?</a><br>

        <?php
    if (isset($_SESSION['error'])) {
        echo '<div class="error">' . $_SESSION['error'] . '</div>';
        unset($_SESSION['error']); // Clear the error after displaying it
    } elseif (isset($_SESSION['success'])) {
        echo '<div class="success">' . $_SESSION['success'] . '</div>';
        unset($_SESSION['success']); // Clear the success message after displaying it
    }
    ?>
    </form>

</body>
<script>
    function mostrarSenha() {
        var senha = document.getElementById("password");
        var confirmacaoSenha = document.getElementById("password_confirmation");

        if (senha.type == "password" && confirmacaoSenha.type == "password") {
            senha.type = "text";
            confirmacaoSenha.type = "text";
        } else {
            senha.type = "password";
            confirmacaoSenha.type = "password";
        }
    }
</script>
