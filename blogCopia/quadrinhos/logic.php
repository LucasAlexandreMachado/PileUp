<?php
session_start();

$conn = mysqli_connect("endereço_servidor", "username_do_banco", "sua_senha", "nome_do_seu_banco");

if (!$conn) {
    echo "<h3 class='container bg-black text-center p-3 text-warning rounded-lg mt-5'>Não foi possível conectar ao banco de dados</h3>";
}
$userId = $_SESSION['id'];
$sql = "SELECT * FROM comics WHERE userId = $userId";
$query = mysqli_query($conn, $sql);

if (isset($_GET['postId'])) {
    $bookId = $_GET['postId'];
    $userId = $_SESSION['id'];
    
    $sql = "SELECT * FROM comics WHERE bookId = $bookId AND userId = $userId";
    $query = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($query) > 0) {
        $q = mysqli_fetch_assoc($query);
    } else {
        header("Location: index.php");
        exit;
    }
}

if (isset($_POST["new_post"])) {
    if ($_FILES["image_upload"]["error"] == UPLOAD_ERR_OK) {
        $upload_dir = "uploads/";
        $temp_name = $_FILES["image_upload"]["tmp_name"];
        $image_name = basename($_FILES["image_upload"]["name"]);
        $target_path = $upload_dir . $image_name;
    
        if (move_uploaded_file($temp_name, $target_path)) {
            $name = $_POST["name"];
            $favorite = isset($_POST["favorite"]) ? 1 : 0;
            $status = $_POST["status"];
            $score = $_POST["score"];
            $episodeProgress = $_POST["episode_progress"];
            $notes = $_POST["notes"];
            $userId = $_SESSION['id'];
    
            $insertQuery = "INSERT INTO comics (Name, Favorite, Status, Score, EpisodeProgress, Notes, userId, file_name) 
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
    
    if ($_FILES["new_image_upload"]["error"] == UPLOAD_ERR_OK) {
        $upload_dir = "uploads/";
        $temp_name = $_FILES["new_image_upload"]["tmp_name"];
        $image_name = basename($_FILES["new_image_upload"]["name"]);
        $target_path = $upload_dir . $image_name;
    
        if (move_uploaded_file($temp_name, $target_path)) {
            $updateQuery = "UPDATE comics SET Name = '$name', Favorite = $favorite, Status = '$status', Score = $score, EpisodeProgress = $episodeProgress, Notes = '$notes', file_name = '$target_path' WHERE bookId = $bookId";
            mysqli_query($conn, $updateQuery);
    
            header("Location: index.php?info=updated");
            exit();
        } else {
            echo "Error uploading the new image.";
        }
    } else {
        $updateQuery = "UPDATE comics SET Name = '$name', Favorite = $favorite, Status = '$status', Score = $score, EpisodeProgress = $episodeProgress, Notes = '$notes' WHERE bookId = $bookId";
        mysqli_query($conn, $updateQuery);
    
        header("Location: index.php?info=updated");
        exit();
    }
}

if (isset($_REQUEST['delete'])) {
    $bookId = $_REQUEST['bookId'];

    $sql = "DELETE FROM comics WHERE bookId = $bookId";
    $deleteQuery = mysqli_query($conn, $sql);

    header("Location: index.php?info=deleted");
    exit();
}

if(isset($_GET['id'])) {
    $bookId = $_GET['id'];
    
    $sql = "SELECT * FROM comics WHERE bookId = $bookId";
    $query = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($query) > 0) {
        $q = mysqli_fetch_assoc($query);
    }
}

if (isset($_POST["upload_profile_image"])) {
    if ($_FILES["profile_image"]["error"] == UPLOAD_ERR_OK) {
        $upload_dir = "profileImage/";
        $temp_name = $_FILES["profile_image"]["tmp_name"];
        $image_name = basename($_FILES["profile_image"]["name"]);
        $target_path = $upload_dir . $image_name;
    
        if (move_uploaded_file($temp_name, $target_path)) {
            $updateQuery = "UPDATE user SET profile_image = '$target_path' WHERE id = $userId";
            mysqli_query($conn, $updateQuery);
    
            header("Location: profile.php");
            exit();
        } else {
            echo "Erro ao fazer o upload da imagem de perfil.";
        }
    }
}
?>
