<?php

include 'connect.php';

$id = $_GET['updateid'];

$sql = "Select * from `crud` where id=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);


$movie = $row['movie'];
$director = $row['director'];
$date = $row['date'];
$imdbScore = $row['imdbScore'];


if(isset($_POST['submit'])){


  $movie = $_POST['movie'];
  $director = $_POST['director'];
  $date = $_POST['date'];
  $imdbScore = $_POST['imdbScore'];

  $sql="update `crud` set movie='$movie', director='$director', date='$date', imdbScore='$imdbScore' where id=$id";

  $result=mysqli_query($con,$sql);

  if($result){
    header('location:display.php');
  }else{
    die(mysqli_error($con));
  }
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Movies CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container  my-5">
      <form method = "post">
        <div class="mb-3">
          <label for="movie" class="form-label">Movie</label>
          <input type="text" class="form-control" id="movie" name="movie" value= <?php echo $movie ?> >
        </div>

        <div class="mb-3">
          <label for="director" class="form-label">Director</label>
          <input type="text" class="form-control" id="director" name="director" value= <?php echo $director ?>>
        </div>

        <div class="mb-3">
          <label for="date" class="form-label">Date</label>
          <input type="date" class="form-control" id="date" name="date" value= <?php echo $date ?>>
        </div>

        <div class="mb-3">
          <label for="imdbScore" class="form-label">IMDB Score</label>
          <input type="number" class="form-control" id="imdbScore" step="any" name="imdbScore" value= <?php echo $imdbScore ?>>
        </div>

        <button type="submit" class="btn btn-primary" name='submit'>Submit</button>
      </form>
    </div>
  </body>
</html>
