<?php
    include "logic.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editar Livro</title>

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
  </head>
  <body>
    <div class="container mt-5">

        <?php foreach($query as $q){?>
            <form method="POST">
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
                <option value="assistindo" <?php echo $q["Status"] == "assistindo" ? "selected" : ""?>>Assistindo</option>
                <option value="plan to watch" <?php echo $q["Status"] == "plan to watch" ? "selected" : ""?>>Plan to Watch</option>
                <option value="completed" <?php echo $q["Status"] == "completed" ? "selected" : ""?>>Completed</option>
                <option value="rewatching" <?php echo $q["Status"] == "rewatching" ? "selected" : ""?>>Rewatching</option>
                <option value="paused" <?php echo $q["Status"] == "paused" ? "selected" : ""?>>Paused</option>
                <option value="dropped" <?php echo $q["Status"] == "dropped" ? "selected" : ""?>>Dropped</option>
              </select>
              <input name="score" type="number" placeholder="Pontuação (1-10)" class="form-control bg-dark text-white my-3" 
              value="<?php echo $q["Score"]?>" min="1" max="10" required>
              <input name="episode_progress" type="number" placeholder="Progresso do episódio" class="form-control bg-dark text-white my-3"
              value="<?php echo $q["EpisodeProgress"]?>">
              <textarea name="notes" placeholder="Notas" class="form-control bg-dark text-white my-3"><?php echo $q["Notes"]?></textarea>
              <button class="btn btn-dark" name="update">Atualizar Livro</button>
            </form>
        <?php } ?>


    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
