<?php
    include "logic.php";

    if(!isset($_SESSION['id'])):
      header('Location:../../loginTeste/login.php');
  endif;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editar Livro</title>

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
  </head>
  <body>
    <div class="container mt-5">
    <input type='button' class="btn btn-danger" value='Voltar' onclick='history.go(-1)' />
        <?php foreach($query as $q){?>
            <form method="POST" enctype="multipart/form-data">
              <input type="hidden" name="bookId" value="<?php echo $q["bookId"]?>">
              <input name="name" type="text" placeholder="Nome do livro" class="form-control bg-dark text-white my-3 text-center" 
              value="<?php echo $q["Name"]?>" required>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="favorite" id="favorite" <?php echo $q["Favorite"] == 1 ? "checked" : ""?>>
                <label class="form-check-label" for="favorite">
                  Favorito
                </label>
              </div>
              <select name="status" class="form-control bg-dark text-white my-3" required>
                <option value="lendo" <?php echo $q["Status"] == "lendo" ? "selected" : ""?>>Lendo</option>
                <option value="pretendo ler" <?php echo $q["Status"] == "pretendo ler" ? "selected" : ""?>>Pretendo ler</option>
                <option value="completo" <?php echo $q["Status"] == "completo" ? "selected" : ""?>>Completo</option>
                <option value="relendo" <?php echo $q["Status"] == "relendo" ? "selected" : ""?>>Relido</option>
                <option value="pausado" <?php echo $q["Status"] == "pausado" ? "selected" : ""?>>Pausado</option>
                <option value="abandonado" <?php echo $q["Status"] == "abandonado" ? "selected" : ""?>>Abandonado</option>
              </select>
              <input name="score" type="number" placeholder="Pontuação (1-10)" class="form-control bg-dark text-white my-3" 
              value="<?php echo $q["Score"]?>" min="0" max="10" required>
              <input name="episode_progress" type="number" placeholder="Progresso do episódio" class="form-control bg-dark text-white my-3"
              value="<?php echo $q["EpisodeProgress"]?>">
              <textarea name="notes" placeholder="Notas" class="form-control bg-dark text-white my-3"><?php echo $q["Notes"]?></textarea>
              <label>Escolher nova capa?</label>
              <input type="file" name="new_image_upload" accept="image/*" /><br>
              <input type="submit" name="update" value="Atualizar o livro" class="btn-primary"/>
            </form>
        <?php } ?>


    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
