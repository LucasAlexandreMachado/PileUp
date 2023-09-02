<?php
    include "logic.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="../loginCopia/style.css" >
    <title>Biblioteca</title>

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
  </head>
  <body>

    <div class="container mt-5">
      <!-- Notificação de ação -->
      <?php 
      if (isset($_REQUEST['info'])){?>
        <?php if($_REQUEST['info'] == "added") {?>
        <div class="alert alert-success" role="alert">
          Adicionado com sucesso!
        </div>
        <?php }else if ($_REQUEST['info'] == "updated"){?>
          <div class="alert alert-success" role="alert">
          Atualizado com sucesso!
        </div>
        <?php }else if ($_REQUEST['info'] == "deleted"){?>
          <div class="alert alert-danger" role="alert">
          Excluído com sucesso!
        </div>
        <?php }?>
      <?php }?>

      <!-- Criar um novo livro -->
      <div class="text-center">
        <a href="create.php" class="btn btn-outline-dark">Adicionar um novo livro</a>
        <a href="../loginCopia/logout.php" class="btn btn-danger">sair</a>
      </div>

      <!-- Mostrar livros da base de dados -->
      <div class="row">
      
        <?php foreach($query as $q){?>
          <div class="col-12 col-lg-4 d-flex justify-content-center">
            <div class="card text-white bg-dark mt-5" style="width:18rem;">
              <div class="card-body" >
                <h5 class="card-title"><?php echo $q['Name'];?></h5>
                <p class="card-text">Status: <?php echo $q['Status'];?></p>
                <p class="card-text">Pontuação: <?php echo $q['Score'];?></p>
                <p class="card-text">Progresso do episódio: <?php echo $q['EpisodeProgress'];?></p>
                <p class="card-text">Notas: <?php echo $q['Notes'];?></p>
                <a href="view.php?postId=<?php echo $q['bookId'];?>" class="btn btn-light">Detalhes <span class="text-danger">&rarr;</span></a>
              </div>
            </div>
          </div>
        <?php }?>

      </div>

    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
