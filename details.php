<?php
require_once 'actions/db_connect.php';

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM media WHERE id = {$id}";
    $result = mysqli_query($connect, $sql);
    $data = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) == 1) {
        $titel = $data['titel'];
        $picture = $data['picture'];
        $type = $data['type'];
        $release_year = $data['release_year'];
        $ISBN = $data['ISBN'];
        $description = $data['description'];
        $pages = $data['pages'];
        $author = $data['author'];
        $status = $data['status'];
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
    <title>Detail Page</title>
    <?php require_once 'components/boot.php' ?>
</head>

<body class="bg-light">
    <header>
        <div class="m-auto">
            <p class="h1 text-black text-center title">Book Details</p>
        </div>
    </header>
    <main class="container p-5">
        <div class='card m-3'>
            <div class='row g-0'>"
                <?php if ($status == 'Available')
                    echo "<p class='h5 text-center bg-success'>AVAILABLE</p>";
                else
                    echo "<p class='h5 text-center bg-danger'>NOT AVAILABLE</p>"; ?>
                <div class='col-md-4'>
                    <img src='pictures/<?php echo $picture ?>' alt='<?php echo $titel ?>'' style="height:50vh;object-fit:contain">
                </div>
                <div class='col-md-8'>
                    <div class='card-header'>
                        <h5 class='card-title'><?php echo $titel ?></h5>
                    </div>
                    <div class='card-body'>
                        <p class='card-text'><b><?php echo $type ?></b></p>
                        <p class='card-text'>Written by <i><?php echo $author ?></i></p>
                        <p class='card-text'>First released in: <?php echo $release_year ?></p>
                        <p class='card-text'>ISBN: <?php echo $ISBN ?></p>
                        <p class='card-text'><?php echo $description ?></p>
                    
                    </div>
                    <div class='card-footer'>
                        <tr>
                            <td><a href='update.php?id= <?php echo $id ?> '><button class=' btn btn-success btn-sm' type='button'>Edit</button></a>
                            <!-- DELETE BUTTON , not needed on the details page
                                <td><a href='delete.php?id= <?php echo $id ?> '><button class=' btn btn-danger btn-sm' type='button'>Delete</button></a></td> -->
                            <td><a href="index.php"><button class="btn btn-primary btn-sm" type="button">Back Home</button></a></td>
                        </tr>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>