<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php require_once 'components/boot.php'?>
        <title>Add New Media</title>
        <style>
            fieldset {
                margin: auto;
                margin-top: 100px;
                width: 60% ;
            }       
        </style>
    </head>
    <body>
        <fieldset>
            <legend class='h2'>Add New Media</legend>
            <form action="actions/a_create.php" method= "post" enctype="multipart/form-data">
                <table class='table'>
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
                    <tr>
                        <th>Picture</th>
                        <td><input class='form-control' type="file" name="picture" /></td>
                    </tr>
                    <tr>
                        <td><button class='btn btn-success' type="submit">Upload Picture</button></td>
                        <td><a href="index.php"><button class='btn btn-warning' type="button">Back Home</button></a></td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </body>
</html>