<?php 
require_once 'actions/db_connect.php';

$sqlB = "SELECT * FROM media WHERE type = 'Book'";
$sqlD = "SELECT * FROM media WHERE type = 'DVD'";
$sqlC = "SELECT * FROM media WHERE type = 'CD'";

$resultB = mysqli_query($connect ,$sqlB);
$resultD = mysqli_query($connect ,$sqlD);
$resultC = mysqli_query($connect ,$sqlC);

$tbodyB=''; //this variable will hold the body for the table
$tbodyD=''; //this variable will hold the body for the table
$tbodyC=''; //this variable will hold the body for the table

$tbody='';

/* Button MORE only exists at Table Books because the Details Page is created for Books 
    NEXT:  creating Detail Pages for DVD + CD */
    
if (mysqli_num_rows($resultB)  > 0) {
    while ($row = mysqli_fetch_array($resultB, MYSQLI_ASSOC)) {
        $tbodyB .= "<tr>
            <td><img class='img-thumbnail' src='pictures/" .$row['picture']."'></td>
            <td>" .$row['titel']."</td>
            <td>" .$row['type']."</td>
            <td>" .$row['ISBN']."</td>
            <td>" .$row['author']."</td>
            <td>" .$row['status']."</td>

            <td><a href='update.php?id=" .$row['id']."'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a>
            <td><a href='details.php?id=" . $row['id'] . "'><button class='btn btn-primary btn-sm' type='button'>More</button></a>
            <td><a href='delete.php?id=" .$row['id']."'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a></td>
            </tr>";
    };
}
if (mysqli_num_rows($resultD)  > 0) {
    while ($row = mysqli_fetch_array($resultD, MYSQLI_ASSOC)) {
        $tbodyD .= "<tr>
        <td><img class='img-thumbnail' src='pictures/" .$row['picture']."'></td>
        <td>" .$row['titel']."</td>
        <td>" .$row['type']."</td>
        <td>" .$row['FSK']."</td>
        <td>" .$row['genre']."</td>
        <td>" .$row['status']."</td>

        <td><a href='update.php?id=" .$row['id']."'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a>
        <a href='delete.php?id=" .$row['id']."'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a></td>
        </tr>";
    };
}
if (mysqli_num_rows($resultC)  > 0) {
    while ($row = mysqli_fetch_array($resultC, MYSQLI_ASSOC)) {
        $tbodyC .= "<tr>
        <td><img class='img-thumbnail' src='pictures/" .$row['picture']."'></td>
        <td>" .$row['titel']."</td>
        <td>" .$row['type']."</td>
        <td>" .$row['FSK']."</td>
        <td>" .$row['genre']."</td>
        <td>" .$row['status']."</td>

        <td><a href='update.php?id=" .$row['id']."'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a>
        <a href='delete.php?id=" .$row['id']."'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a></td>
        </tr>";
    };
}
else {
    $tbody =  "<tr><td colspan='9'><center>No Data Available </center></td></tr>";
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
                <!--    Button for DVD & CD 
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
                        <th>ISBN</th>
                        <th>Author</th>
                        <th>Status</th>
                        <th colspan='3'>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?= $tbodyB;?> 
                    <?= $tbody;?> 
                </tbody>
            </table>
            <table class='table table-striped'>
                <thead class='table-info'>
                    <tr>
                        <th>Picture</th>
                        <th>Titel</th>
                        <th>Type</th>
                        <th>FSK</th>
                        <th>Genre</th>
                        <th>Status</th>
                        <th colspan='2'>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?= $tbodyD;?> 
                    <?= $tbody;?> 
                </tbody>
            </table>
            <table class='table table-striped'>
                <thead class='table-warning'>
                    <tr>
                        <th>Picture</th>
                        <th>Titel</th>
                        <th>Type</th>
                        <th>FSK</th>
                        <th>Genre</th>
                        <th>Status</th>
                        <th colspan='2'>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?= $tbodyC;?> 
                    <?= $tbody;?> 
                </tbody>
            </table>
        </div>
    </body>
</html>