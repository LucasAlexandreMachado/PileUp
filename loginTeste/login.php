<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["id"] = $user["id"];
            
            header("Location: ../blogCopia/livros/index.php");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="style.css" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form method="post">
        <h1>Login</h1><br>
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" class="input_1"
               value="<?= htmlspecialchars($_POST["email"] ?? "") ?>"><br>
        
        <label for="password">Senha</label><br>
        <input type="password" name="password" id="password" class="input_1"><br>

        <input type="checkbox" class="showPassword" onclick="mostrarSenha()"><label class="">Mostrar Senha</label><br>
        
        <button class="login">Login</button><br>

        <a class="link" href="forgot-password.php" name="redirect_signup">Esqueceu a senha?</a><br>
        <a class="link" href="signup.php" name="redirect_signup">Não tem uma conta?</a><br>

        <?php if ($is_invalid): ?>
        <em>Login invalido</em>
    <?php endif; ?>
    </form>


    
</body>
</html>

<script>
    function mostrarSenha(){
        var tipo = document.getElementById("password");
            if(tipo.type =="password") 
                {tipo.type = "text";}
            else
                {tipo.type  = "password"}
    }
</script>








