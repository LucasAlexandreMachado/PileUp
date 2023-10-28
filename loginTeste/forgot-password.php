<!DOCTYPE html>
<html>
<head>
    <title>Esqueceu a senha</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="style.css" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>



    <form method="post" action="send-password-reset.php">

        <h1>Recuperar</h1><br>

        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" class="input_1"><br>

        <button class="login" style="margin-top:7px;">Enviar</button><br>

        <a class="link" href="login.php" name="redirect_signup">Lembrou?</a><br>

    </form>

</body>
</html>