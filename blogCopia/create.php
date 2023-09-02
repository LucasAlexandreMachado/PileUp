<?php
    include "logic.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Criar Livro</title>

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
  </head>
  <body>
    <div class="container mt-5">
      <form method="POST">
        <input
          name="name"
          type="text"
          placeholder="Nome do livro"
          class="form-control bg-dark text-white my-3 text-center"
          required
        />
        <div class="form-check">
          <input
            class="form-check-input"
            type="checkbox"
            name="favorite"
            id="favorite"
          />
          <label class="form-check-label" for="favorite">
            Favorito
          </label>
        </div>
        <select name="status" class="form-control bg-dark text-white my-3" required>
          <option value="" disabled selected>Status</option>
          <option value="assistindo">Assistindo</option>
          <option value="plan to watch">Plan to Watch</option>
          <option value="completed">Completed</option>
          <option value="rewatching">Rewatching</option>
          <option value="paused">Paused</option>
          <option value="dropped">Dropped</option>
        </select>
        <input
          name="score"
          type="number"
          placeholder="Pontuação (1-10)"
          class="form-control bg-dark text-white my-3"
          min="1"
          max="10"
          required
        />
        <input
          name="episode_progress"
          type="number"
          placeholder="Progresso do episódio"
          class="form-control bg-dark text-white my-3"
        />
        <textarea
          name="notes"
          placeholder="Notas"
          class="form-control bg-dark text-white my-3"
        ></textarea>
        <button class="btn btn-dark" name="new_post">Adicionar um livro</button>
      </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
