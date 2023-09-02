<?php
//conexão
session_start();

    $conn = mysqli_connect("localhost", "root", "", "blogdata");

    if (!$conn) {
        echo "<h3 class='container bg-black text-center p-3 text-warning rounded-lg mt-5'>Não foi possível conectar ao banco de dados</h3>";
    }
    $userId = $_SESSION['id'];
    $sql = "SELECT * FROM books WHERE userId = $userId";
    $query = mysqli_query($conn, $sql);

    //código para mostrar somente o id do post que foi feito
    if (isset($_GET['postId'])) {
        $bookId = $_GET['postId'];
    
        // Consulta SQL para selecionar o livro com o ID correspondente
        $sql = "SELECT * FROM books WHERE bookId = $bookId";
        $query = mysqli_query($conn, $sql);
    
        // Verifica se há resultados
        if (mysqli_num_rows($query) > 0) {
            // Exibe os detalhes do livro
            $q = mysqli_fetch_assoc($query);
        }
    }
    
    //

    if (isset($_POST["new_post"])) {
        $name = $_POST["name"];
        $favorite = isset($_POST["favorite"]) ? 1 : 0;
        $status = $_POST["status"];
        $score = $_POST["score"];
        $episodeProgress = $_POST["episode_progress"];
        $notes = $_POST["notes"];
        $userId = $_SESSION['id'];
        

        $insertQuery = "INSERT INTO books(Name, Favorite, Status, Score, EpisodeProgress, Notes, userId) VALUES ('$name', $favorite, '$status', $score, $episodeProgress, '$notes', '$userId')";
        mysqli_query($conn, $insertQuery);

        header("Location: index.php?info=added");
        exit();
    }

    if (isset($_REQUEST['update'])) {
        $bookId = $_REQUEST['bookId'];
        $name = $_REQUEST["name"];
        $favorite = isset($_REQUEST["favorite"]) ? 1 : 0;
        $status = $_REQUEST["status"];
        $score = $_REQUEST["score"];
        $episodeProgress = $_REQUEST["episode_progress"];
        $notes = $_REQUEST["notes"];

        $updateQuery = "UPDATE books SET Name = '$name', Favorite = $favorite, Status = '$status', Score = $score, EpisodeProgress = $episodeProgress, Notes = '$notes' WHERE bookId = $bookId";
        mysqli_query($conn, $updateQuery);

        header("Location: index.php?info=updated");
        exit();
    }

    if (isset($_REQUEST['delete'])) {
        $bookId = $_REQUEST['bookId'];

        $sql = "DELETE FROM books WHERE bookId = $bookId";
        $deleteQuery = mysqli_query($conn, $sql);

        header("Location: index.php?info=deleted");
        exit();
    }


        // Verifica se o parâmetro "id" está presente na URL
        if(isset($_GET['id'])) {
            $bookId = $_GET['id'];
    
            // Consulta SQL para selecionar o livro com o ID correspondente
            $sql = "SELECT * FROM books WHERE bookId = $bookId";
            $query = mysqli_query($conn, $sql);
    
            // Verifica se há resultados
            if(mysqli_num_rows($query) > 0) {
                // Exibe os detalhes do livro
                $q = mysqli_fetch_assoc($query);
            }}
?>
