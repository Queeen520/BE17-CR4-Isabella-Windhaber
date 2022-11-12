<?php
require_once 'actions/db_connect.php';

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM media WHERE id = {$id}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $titel = $_POST['titel'];
        $type = $_POST['type'];
        $release_year = $_POST['release_year'];
        $description = $_POST['description'];
        $ISBN = $_POST['ISBN'];
        $author = $_POST['author'];
        $pages = $_POST['pages'];
        $producer = $_POST['producer'];
        $availability = $_POST['availability'];
        $picture = $data['picture'];
    } else {
        header("location: error.php");
    }
    mysqli_close($connect);
} else {
    header("location: error.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Entry</title>
        <?php require_once 'components/boot.php'?>
        <style type= "text/css">
            fieldset {
                margin: auto;
                margin-top: 100px;
                width: 60% ;
            }  
            .img-thumbnail{
                width: 70px !important;
                height: 70px !important;
            }     
        </style>
    </head>
    <body>
        <fieldset>
            <legend class='h2'>Update request <img class='img-thumbnail' src='pictures/<?php echo $picture ?>' alt="<?php echo $titel ?>"></legend>
            <form action="actions/a_update.php"  method="post" enctype="multipart/form-data">
                <table class="table">
                <tr>
                        <th>Titel</th>
                        <td><input class='form-control' type="text" name="titel" placeholder="Media Titel" /></td>
                    </tr>    
                    <tr>
                        <th>Type</th>
                        <td><input class='form-control' type="text" name="type" placeholder="Book/DVD/CD" step="any" /></td>
                    </tr>
                    <th>Release Year</th>
                        <td><input class='form-control' type="text" name="release_year" placeholder="YYYY" step="any" /></td>
                    </tr>
                    <th>Description</th>
                        <td><input class='form-control' type="text" name="description" placeholder="short description" step="any" /></td>
                    </tr>
                    <th>ISBN</th>
                        <td><input class='form-control' type="text" name="ISBN" placeholder="ISBN Num." step="any" /></td>
                    </tr>
                    <th>Author</th>
                        <td><input class='form-control' type="text" name="author" placeholder="Author Name" step="any" /></td>
                    </tr>
                    <th>Pages</th>
                        <td><input class='form-control' type="text" name="pages" placeholder="..." step="any" /></td>
                    </tr>
                    <th>Producer</th>
                        <td><input class='form-control' type="text" name="producer" placeholder="Producer Name" step="any" /></td>
                    </tr>
                    <th>Availability</th>
                        <td><input class='form-control' type="text" name="availability" placeholder="Available/Not Available" step="any" /></td>
                    </tr>
                       <th>Picture</th>
                        <td><input class="form-control" type="file" name= "picture" /></td>
                    </tr>
                    <tr>
                        <input type= "hidden" name= "id" value= "<?php echo $data['id'] ?>" />
                        <input type= "hidden" name= "picture" value= "<?php echo $data['picture'] ?>" />
                        <td><button class="btn btn-success" type= "submit">Save Changes</button></td>
                        <td><a href= "index.php"><button class="btn btn-warning" type="button">Back</button></a></td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </body>
</html>