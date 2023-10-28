<?php
    include "logic.php";

    if(!isset($_SESSION['id'])):
      header('Location:../../loginTeste/login.php');
  endif;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Detalhes do Livro</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
  </head>
  <body>

    <div class="container mt-5">
    <input type='button' class="btn btn-danger" style="" value='Voltar' onclick='history.go(-1)' />
    <?php foreach($query as $q){?>
    <div class="bg-dark p-5 rounded-lg text-white text-center">
        <?php
        // Check if there is a file_name associated with the book and it exists
        if (!empty($q['file_name']) && file_exists($q['file_name'])) {
            echo '<img src="' . $q['file_name'] . '" class="img-fluid" alt="Book Image">';
        } else {
            echo '<img src="placeholder.jpg" class="img-fluid" alt="Placeholder Image">';
        }
        ?>
        <h1><?php echo $q['Name'];?></h1>
        <p>Status: <?php echo $q['Status'];?></p>
        <p>Pontuação: <?php echo $q['Score'];?></p>
        <p>Progresso do Episódio: <?php echo $q['EpisodeProgress'];?></p>
        <p>Notas: <?php echo $q['Notes'];?></p>

        <div class="d-flex mt-2 justify-content-center align-items-center">
            <a href="edit.php?postId=<?php echo $q['bookId'];?>" class="btn btn-light btn-sm">Editar</a>

            <form method="POST">
                <input type="hidden" name="bookId" value="<?php echo $q["bookId"];?>">
                <button class="btn btn-danger btn-sm ml-2" name="delete">Deletar</button>
            </form>
        </div>
    </div>
<?php }?>


    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
