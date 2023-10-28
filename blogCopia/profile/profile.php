<?php
    include "../livros/logic.php";

    if(!isset($_SESSION['id'])):
        header('Location:../loginTeste/login.php');
    endif;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
</head>
<body>
    <div class="container mt-5">
<form method="POST" enctype="multipart/form-data">
    <h1>Escolher foto de perfil</h1><br>
    <input type="file" name="profile_image" style="margin-bottom:10px;"><br>
    <input type="submit" name="upload_profile_image" value="Enviar">
</form>
<?php 
$sql = "SELECT * FROM user WHERE id = $userId";
$query = mysqli_query($conn, $sql);

if ($query) {
    $row = mysqli_fetch_assoc($query);
    $profileImage = $row['profile_image'];

    if ($profileImage) {
        // Exibe a imagem de perfil
        echo '<img src="' . $profileImage . '" alt="Imagem de Perfil" class="img-fluid" style="">';
    } else {
        // Caso o usuário não tenha uma imagem de perfil, você pode exibir uma imagem padrão ou uma mensagem
        echo 'O usuário não possui uma imagem de perfil.';
    }
}  
$sql = "SELECT name FROM user WHERE id = $userId"; // Substitua $userId pelo ID do usuário logado
$query = mysqli_query($conn, $sql);

if ($query) {
    $row = mysqli_fetch_assoc($query);
    $name = $row['name'];

        echo '<br>Nome de Usuário: ' . $name;


        
}
?>
<!-- 
<textarea name="notes" placeholder="Notas" class="form-control bg-dark text-white my-3"><?php echo $name?></textarea>
-->


<br>
        <input type='button' class="btn btn-info" value='Voltar' onclick='history.go(-1)' />
</body>

<script>
    $(document).ready(function(){
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('a[href="#top"]').fadeIn();
        } else {
            $('a[href="#top"]').fadeOut();
        }
    });

    $('a[href="#top"]').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });
});
</script>
</html>


