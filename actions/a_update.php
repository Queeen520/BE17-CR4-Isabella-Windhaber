<?php
require_once 'db_connect.php';
require_once 'file_upload.php';

if ($_POST) {  
    $id = $_POST['id'];  
    $titel = $_POST['titel'];
    $release_year = $_POST['release_year'];
    $description = $_POST['description'];
    $ISBN = $_POST['ISBN'];
    $author = $_POST['author'];
    $pages = $_POST['pages'];
    $producer = $_POST['producer'];
    $FSK = $_POST['FSK'];
    $genre = $_POST['genre'];
    $status = $_POST['status'];
    //variable for upload pictures errors is initialised
    $uploadError = '';

    $picture = file_upload($_FILES['picture']);//file_upload() called  
    if($picture->error===0){
        ($_POST["picture"]=="product.png")?: unlink("../pictures/$_POST[picture]");           
        $sql = "UPDATE media SET titel = '$titel', release_year = '$release_year', description = '$description', ISBN = '$ISBN', author = '$author', pages = '$pages', FSK = '$FSK', genre = '$genre', status = '$status', picture = '$picture->fileName' WHERE id = {$id}";
    }else{
        $sql = "UPDATE media SET titel = '$titel', release_year = '$release_year', description = '$description', ISBN = '$ISBN', author = '$author', pages = '$pages' FSK = '$FSK', genre = '$genre', status = '$status' WHERE id = {$id}";
    }    
    if (mysqli_query($connect, $sql) === TRUE) {
        $class = "success";
        $message = "The Media was successfully updated";
        $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
    } else {
        $class = "danger";
        $message = "Error while updating record : <br>" . mysqli_connect_error();
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
                <h1>Update request response</h1>
            </div>
            <div class="alert alert-<?php echo $class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../update.php?id=<?=$id;?>'><button class="btn btn-warning" type='button'>Back</button></a>
                <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
            </div>
        </div>
    </body>
</html>