<?php
require_once 'db_connect.php';
require_once 'file_upload.php';

if ($_POST) {   
    $titel = $_POST['titel'];
    $type = $_POST['type'];
    $release_year = $_POST['release_year'];
    $description = $_POST['description'];
    $ISBN = $_POST['ISBN'];
    $author = $_POST['author'];
    $pages = $_POST['pages'];
    $producer = $_POST['producer'];
    $FSK = $_POST['FSK'];
    $genre = $_POST['genre'];
    $status = $_POST['status'];
    $uploadError = '';
    //this function exists in the file upload.
    $picture = file_upload($_FILES['picture']);  
   
    $sql = "INSERT INTO media (titel, type, release_year, description, ISBN, author, pages, producer, FSK, genre, status, picture) VALUES ('$titel', '$type', '$release_year', '$description', '$ISBN', '$author', '$pages', '$producer', '$FSK', '$genre', '$status', '$picture->fileName')";

    if (mysqli_query($connect, $sql) == true) {
        $class = "success";
        $message = "The entry below was successfully created <br>
            <table class='table w-50'><tr>
            <td> $titel </td>
            <td> $type </td>
            </tr></table><hr>";
        $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
    } else {
        $class = "danger";
        $message = "Error while creating record. Try again: <br>" . $connect->error;
        $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
    }
    mysqli_close($connect);
} else {
    header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update</title>
        <?php require_once '../components/boot.php'?>
    </head>
    <body>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Create request response</h1>
            </div>
            <div class="alert alert-<?=$class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../index.php'><button class="btn btn-primary" type='button'>Home</button></a>
            </div>
        </div>
    </body>
</html>