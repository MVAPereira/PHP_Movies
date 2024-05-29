<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <button class="btn btn-primary my-5"> 
        <a href="movie.php" class ="text-light text-decoration-none"> Add Movie </a>
    </button>

    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">Movie</th>
                <th scope="col">Director</th>
                <th scope="col">Date</th>
                <th scope="col">ImdbScore</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "Select * from `crud`";
                $result = mysqli_query($con, $sql);

                if($result){
                    while($row = mysqli_fetch_assoc($result)){
                        $id = $row['id'];
                        $movie = $row['movie'];
                        $director = $row['director'];
                        $date = $row['date'];
                        $imdbScore = $row['imdbScore'];
                        
                        echo '
                            <tr>
                                <td>'.$movie.'</td>
                                <td>'.$director.'</td>
                                <td>'.$date.'</td>
                                <td>'.$imdbScore.'</td>
                                <td><button class="btn btn-warning"><a class="text-light  text-decoration-none" href="update.php?updateid='.$id.'">Update</a></button></td>
                                <td><button class="btn btn-danger"><a class="text-light  text-decoration-none" href="delete.php?deleteid='.$id.'">Delete</a></button></td>
                            </tr>
                        ';
                    }

                }    
            ?>
        </tbody>
    </table>
    
   

</div>

</body>
</html>