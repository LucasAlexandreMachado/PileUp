<?php
//conexão
session_start();

$conn = mysqli_connect("endereço_servidor", "username_do_banco", "sua_senha", "nome_do_seu_banco");

    if (!$conn) {
        echo "<h3 class='container bg-black text-center p-3 text-warning rounded-lg mt-5'>Não foi possível conectar ao banco de dados</h3>";
    }
    $userId = $_SESSION['id'];
    $sql = "SELECT * FROM series WHERE userId = $userId";
    $query = mysqli_query($conn, $sql);

    if (isset($_GET['postId'])) {
        $bookId = $_GET['postId'];
        $userId = $_SESSION['id']; // Supondo que o id do usuário esteja armazenado em $_SESSION['id']
    
        // Consulta SQL para selecionar o livro com o ID correspondente e o mesmo userId
        $sql = "SELECT * FROM series WHERE bookId = $bookId AND userId = $userId";
        $query = mysqli_query($conn, $sql);
    
        // Verifica se há resultados
        if (mysqli_num_rows($query) > 0) {
            // Exibe os detalhes do livro
            $q = mysqli_fetch_assoc($query);
        } else {
            // Nenhum dado encontrado, redirecione para o index
            header("Location: index.php");
            exit; // Certifique-se de sair do script após o redirecionamento
        }
    }
       
    
    //

    if (isset($_POST["new_post"])) {
        // Se o arquivo de upload foi enviado com sucesso
        if ($_FILES["image_upload"]["error"] == UPLOAD_ERR_OK) {
            $upload_dir = "uploads/"; // Diretório de destino das imagens
            $temp_name = $_FILES["image_upload"]["tmp_name"];
            $image_name = basename($_FILES["image_upload"]["name"]);
            $target_path = $upload_dir . $image_name;
    
            // Move o arquivo para a pasta "uploads"
            if (move_uploaded_file($temp_name, $target_path)) {
                // Resto do seu código para inserir dados no banco de dados
                $name = $_POST["name"];
                $favorite = isset($_POST["favorite"]) ? 1 : 0;
                $status = $_POST["status"];
                $score = $_POST["score"];
                $episodeProgress = $_POST["episode_progress"];
                $notes = $_POST["notes"];
                $userId = $_SESSION['id'];
    
                // Insere o caminho da imagem no banco de dados
                $insertQuery = "INSERT INTO series (Name, Favorite, Status, Score, EpisodeProgress, Notes, userId, file_name) 
                                VALUES ('$name', $favorite, '$status', $score, $episodeProgress, '$notes', '$userId', '$target_path')";
                mysqli_query($conn, $insertQuery);
    
                header("Location: index.php?info=added");
                exit();
            } else {
                echo "Erro ao fazer o upload da imagem.";
            }
        }
    }
    

    if (isset($_REQUEST['update'])) {
        $bookId = $_REQUEST['bookId'];
        $name = $_REQUEST["name"];
        $favorite = isset($_REQUEST["favorite"]) ? 1 : 0;
        $status = $_REQUEST["status"];
        $score = $_REQUEST["score"];
        $episodeProgress = $_REQUEST["episode_progress"];
        $notes = $_REQUEST["notes"];
    
        // Check if a new image file has been uploaded
        if ($_FILES["new_image_upload"]["error"] == UPLOAD_ERR_OK) {
            $upload_dir = "uploads/"; // Directory for image uploads
            $temp_name = $_FILES["new_image_upload"]["tmp_name"];
            $image_name = basename($_FILES["new_image_upload"]["name"]);
            $target_path = $upload_dir . $image_name;
    
            // Move the new image file to the "uploads" directory
            if (move_uploaded_file($temp_name, $target_path)) {
                // Update the database with the new image path
                $updateQuery = "UPDATE series SET Name = '$name', Favorite = $favorite, Status = '$status', Score = $score, EpisodeProgress = $episodeProgress, Notes = '$notes', file_name = '$target_path' WHERE bookId = $bookId";
                mysqli_query($conn, $updateQuery);
    
                header("Location: index.php?info=updated");
                exit();
            } else {
                echo "Error uploading the new image.";
            }
        } else {
            // No new image file was uploaded, update the database without changing the image path
            $updateQuery = "UPDATE series SET Name = '$name', Favorite = $favorite, Status = '$status', Score = $score, EpisodeProgress = $episodeProgress, Notes = '$notes' WHERE bookId = $bookId";
            mysqli_query($conn, $updateQuery);
    
            header("Location: index.php?info=updated");
            exit();
        }
    }

    if (isset($_REQUEST['delete'])) {
        $bookId = $_REQUEST['bookId'];

        $sql = "DELETE FROM series WHERE bookId = $bookId";
        $deleteQuery = mysqli_query($conn, $sql);

        header("Location: index.php?info=deleted");
        exit();
    }


        // Verifica se o parâmetro "id" está presente na URL
        if(isset($_GET['id'])) {
            $bookId = $_GET['id'];
    
            // Consulta SQL para selecionar o livro com o ID correspondente
            $sql = "SELECT * FROM series WHERE bookId = $bookId";
            $query = mysqli_query($conn, $sql);
    
            // Verifica se há resultados
            if(mysqli_num_rows($query) > 0) {
                // Exibe os detalhes do livro
                $q = mysqli_fetch_assoc($query);
            }}


            if (isset($_POST["upload_profile_image"])) {
                // Verifica se o arquivo de upload foi enviado com sucesso
                if ($_FILES["profile_image"]["error"] == UPLOAD_ERR_OK) {
                    $upload_dir = "profileImage/"; // Diretório de destino das imagens de perfil
                    $temp_name = $_FILES["profile_image"]["tmp_name"];
                    $image_name = basename($_FILES["profile_image"]["name"]);
                    $target_path = $upload_dir . $image_name;
            
                    // Move o arquivo para a pasta "profile_images"
                    if (move_uploaded_file($temp_name, $target_path)) {
                        // Atualiza o banco de dados com o caminho da imagem de perfil
                        $updateQuery = "UPDATE user SET profile_image = '$target_path' WHERE id = $userId";
                        mysqli_query($conn, $updateQuery);
            
                        // Redireciona para a página de perfil ou outra página apropriada
                        header("Location: profile.php");
                        exit();
                    } else {
                        echo "Erro ao fazer o upload da imagem de perfil.";
                    }
                }
            }
            
?>
