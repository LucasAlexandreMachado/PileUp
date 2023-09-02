<?php
//conexão
require_once 'db_connect.php';

//sessão
session_start();

//botão enviar
if (isset($_POST['form_login'])):
    $erros = array();
    $email = mysqli_escape_string($connect, $_POST['form_email']);
    $password = mysqli_escape_string($connect, $_POST['form_password']);

    if(empty($email) or empty($password)):
        $erros[]= "<li> O campo login e senha precisam ser preenchidos</li>";
    else:
        $sql = "SELECT email FROM users WHERE email = '$email'";
        $result = mysqli_query($connect, $sql);

        if(mysqli_num_rows($result) > 0):

            $password = md5($password);
            $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
            $result = mysqli_query($connect, $sql);
            if(mysqli_num_rows($result) == 1 ):
                $data = mysqli_fetch_array($result);
                mysqli_close($connect);
                $_SESSION['loged'] = true;
                $_SESSION['id'] = $data['id'];
                header('Location:../blogCopia/index.php');
            else:
                $erros[]= "<li> O usuario e senha não conferem</li>";
            endif;
        else:
            $erros[] = "<li> Email inexistente </li>";
        endif;
endif;
endif;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="style.css" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <h1>Login</h1>
        <label>Email</label><br>
        <input class="input_1" type="text" name="form_email"><br>

        <label>Senha</label><br>
        <input class="input_1" type="password" name="form_password" id="senha"><br>
        <input type="checkbox" class="showPassword" onclick="mostrarSenha()"><label class="">Mostrar Senha</label><br>
        

        <input class="login" type="submit" name="form_login" value="Login"><br>
        <a class="link" href="signup/signup.php" name="redirect_signup">Não tem uma conta?</a><br>
        <?php 
    if (!empty($erros)):
        foreach($erros as $erro):
            echo $erro;
        endforeach;
    endif;
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
