<?php
// conexão
require_once '../db_connect.php';

// sessão
session_start();

// botão enviar
if (isset($_POST['form_signup'])) {
    $erros = array();
    $username = mysqli_escape_string($connect, $_POST['form_username']);
    $password = mysqli_escape_string($connect, $_POST['form_password']);
    $email = mysqli_escape_string($connect, $_POST['form_email']);

    // Verifica se os campos estão vazios
    if (empty($username) || empty($password) || empty($email)) {
        $erros[] = "<li> Todos os campos precisam ser preenchidos</li>";
    } else {
        // Verifica se o email já está cadastrado
        $sql = "SELECT email FROM users WHERE email = '$email'";
        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) > 0) {
            $erros[] = "<li> Este email já está cadastrado</li>";
        } else {
            // Insere o novo usuário no banco de dados
            $password = md5($password);
            $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

            if (mysqli_query($connect, $sql)) {
                header('Location:../login.php'); // Redireciona para a página de login
            } else {
                echo "Erro ao cadastrar o usuário: " . mysqli_error($connect);
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style.css" >
    <title>Document</title>
</head>

<body>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <h1>Cadastro</h1>
        <label>Nome</label><br>
        <input class="input_1" type="text" name="form_username"><br>

        <label>Email</label><br>
        <input class="input_1" type="text" name="form_email"><br>

        <label>Senha:</label><br>
        <input class="input_1" type="password" name="form_password" id="senha"><br>

        <input type="checkbox" class="showPassword" onclick="mostrarSenha()"><label class="">Mostrar Senha</label><br>

        <input class="login" type="submit" name="form_signup" value="Enviar"><br>
        <a class="link" href="../login.php" name="redirect_signup">Já tem uma conta?</a><br>
        <?php
    if (!empty($erros)) {
        foreach ($erros as $erro) {
            echo $erro;
        }
    }
    ?>

    </form>
        <!--Script em JavaScript para mostrar/esconder senha-->
<script>
    function mostrarSenha(){
        var tipo = document.getElementById("senha");
            if(tipo.type =="password") 
                {tipo.type = "text";}
            else
                {tipo.type  = "password"}
    }
</script>
</body>
</html>
