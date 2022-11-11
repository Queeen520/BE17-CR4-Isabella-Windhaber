<?php 
require_once 'actions/db_connect.php';

$sql = "SELECT * FROM media";
$result = mysqli_query($connect ,$sql);

$tbody=''; //this variable will hold the body for the table

if(mysqli_num_rows($result) > 0) {     
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){         
        $tbody .= "<tr>
            <td><img class='img-thumbnail' src='pictures/" .$row['picture']."'></td>
            <td>" .$row['titel']."</td>
            <td>" .$row['type']."</td>
            <td>" .$row['release_year']."</td>
            <td>" .$row['description']."</td>
            <td>" .$row['ISBN']."</td>
            <td>" .$row['author']."</td>
            <td>" .$row['pages']."</td>
            <td>" .$row['producer']."</td>
            <td>" .$row['availability']."</td>

            <td><a href='update.php?id=" .$row['id']."'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a>
            <a href='delete.php?id=" .$row['id']."'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a></td>
            </tr>";
    };
} else {
    $tbody =  "<tr><td colspan='6'><center>No Data Available </center></td></tr>";
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MEDIA LIBRARY</title>
        <?php require_once 'components/boot.php'?>
        <style type="text/css">
            .manageProduct {           
                margin: auto;
            }
            .img-thumbnail {
                width: 70px !important;
                height: 70px !important;
            }
            td {          
                text-align: left;
                vertical-align: middle;
            }
            tr {
                text-align: left;
            }
        </style>
    </head>
    <body>
        <div class="manageProduct w-75 mt-3">    
            <div class='mb-3'>
                <a href= "create.php"><button class='btn btn-primary'type="button" >Add New Media</button></a>
                <!--    Button for DVD & CD ?? 
                <a href= "create.php"><button class='btn btn-primary'type="button" >Add</button></a>
                <a href= "create.php"><button class='btn btn-primary'type="button" >Add</button></a>
                -->
            </div>
            <p class='h2'>Media Library</p>
            <table class='table table-striped'>
                <thead class='table-success'>
                    <tr>
                        <th>Picture</th>
                        <th>Titel</th>
                        <th>Type</th>
                        <th>Release Year</th>
                        <th>Short Description</th>
                        <th>ISBN</th>
                        <th>Author</th>
                        <th>Pages</th>
                        <th>Producer</th>
                        <th>Availability</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?= $tbody;?> 
                </tbody>
            </table>
        </div>
    </body>
</html>