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
    <title>Criar Filme</title>

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
  </head>
  <body>
    <div class="container mt-5">
    <input type='button' class="btn btn-danger" style="" value='Voltar' onclick='history.go(-1)' />
      <form method="POST" enctype="multipart/form-data">
        <input
          name="name"
          type="text"
          placeholder="Nome do Filme"
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
          <option value="pretendo assistir">Pretendo Assistir</option>
          <option value="completo">Completo</option>
          <option value="reassistindo">Reassistindo</option>
          <option value="pausado">Pausado</option>
          <option value="abandonado">Abandonado</option>
        </select>
        <input
          name="score"
          type="number"
          placeholder="Pontuação (1-10)"
          class="form-control bg-dark text-white my-3"
          min="0"
          max="10"
          required
        />
        <input
          name="episode_progress"
          type="number"
          placeholder="Progresso"
          class="form-control bg-dark text-white my-3"
          required
        />
        <textarea
          name="notes"
          placeholder="Notas"
          class="form-control bg-dark text-white my-3"
        ></textarea>
        <label>Escolher capa</label>
        <input type="file" name="image_upload" accept="image/*" required/><br>
    <input type="submit" name="new_post" value="Adicionar Filme" class="btn-primary"/>
      </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
