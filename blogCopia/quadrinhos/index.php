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
    <title>Biblioteca</title>

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
        <style>
      body, html {
        height: 100%;
      }
      .container {
        min-height: 100%;
        display: flex;
        flex-direction: column;
      }
    </style>
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
      <h1 class=" mb-1">Quadrinhos</h1>
      <div class="text-center mb-1">
        <a href="../livros/index.php" class="btn btn-outline-dark">Livros</a>
        <a href="../series/index.php" class="btn btn-outline-dark">Series</a>
        <a href="../filmes/index.php" class="btn btn-outline-dark">Filmes</a>
        <a href="index.php" class="btn btn-outline-dark">Quadrinhos</a>
      </div>
      <!-- Criar um novo livro -->
      <div class="text-center">
        <a href="create.php" class="btn btn-outline-dark">Adicionar quadrinho</a>
        <a href="../profile/profile.php" class="btn btn-info">Perfil</a>
        <a href="../../loginTeste/logout.php" class="btn btn-danger">Sair</a>
      </div>




      <!-- Mostrar livros da base de dados -->
      <div class="row">
      
      <?php foreach($query as $q){?>
    <div class="col-12 col-lg-4 d-flex justify-content-center">
        <div class="card text-white bg-dark mt-5" style="width:18rem;">
            <?php
            // Check if there is a file_name associated with the book and it exists
            if (!empty($q['file_name']) && file_exists($q['file_name'])) {
                echo '<img src="' . $q['file_name'] . '" class="card-img-top" alt="Book Image">';
            } else {
                echo '<img src="placeholder.jpg" class="card-img-top" alt="Placeholder Image">';
            }
            ?>
            <div class="card-body">
                <h5 class="card-title"><?php echo $q['Name'];?></h5>
                <p class="card-text">Status: <?php echo $q['Status'];?></p>
                <p class="card-text">Pontuação: <?php echo $q['Score'];?></p>
                <p class="card-text">Progresso: <?php echo $q['EpisodeProgress'];?></p>
                <p class="card-text">Notas: <?php echo $q['Notes'];?></p>
                <a href="view.php?postId=<?php echo $q['bookId'];?>" class="btn btn-light">Detalhes: <span class="text-danger">&rarr;</span></a>
            </div>
        </div>
    </div>
<?php } ?>


      </div>

    </div>
    <footer class="bg-dark text-light text-center py-3" style="margin-top:50px">
    <div class="container">
      <p>&copy; PileUp - Lucas Alexandre Machado - 2023</p>
      <a href="https://anilist.co/home">Sobre</a>
    </div>
  </footer>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
