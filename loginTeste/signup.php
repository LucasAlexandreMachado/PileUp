<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="style.css" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="/js/validation.js" defer></script>
</head>
<body>
    

    
    <form action="process-signup.php" method="post" id="signup" novalidate>
        <h1>Cadastro</h1>
        <div>
            <label for="name">Nome</label><br>
            <input type="text" id="name" name="name" class="input_1">
        </div>
        
        <div>
            <label for="email">Email</label><br>
            <input type="email" id="email" name="email" class="input_1">
        </div>
        
        <div>
            <label for="password">Senha</label><br>
            <input type="password" id="password" name="password" class="input_1">
        </div>
        
        <div>
            <label for="password_confirmation">Repetir senha</label><br>
            <input type="password" id="password_confirmation" name="password_confirmation" class="input_1">
        </div>

        <input type="checkbox" class="showPassword" onclick="mostrarSenha()"><label class="">Mostrar Senha</label><br>

        <button class="login">Cadastrar</button><br>

        <a class="link" href="login.php" name="redirect_signup">Já tem uma conta?</a><br>

        <?php
    if (isset($_SESSION['error'])) {
        echo '<div class="error">' . $_SESSION['error'] . '</div>';
        unset($_SESSION['error']);
    }
    ?>
    </form>
</body>
</html>

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











