<?php
include 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $movieId = $_POST['EmovieId'];
    $movieName = $_POST['EmovieName'];
    $movieYear = $_POST['EmovieYear'];
    $movieGenre = $_POST['EmovieGenre'];
    $movieLink = $_POST['EmovieLink'];
    $movieAbout = $_POST['EmovieAbout'];


    $sql = "UPDATE movietbl SET name='$movieName', year='$movieYear', genre='$movieGenre', description='$movieAbout',  magnet='$movieLink' WHERE movie_id='$movieId'";

   // $sql = "UPDATE movietbl SET (name, year, genre, description, magnet) VALUES ('$movieName', '$movieYear', '$movieGenre', '$movieAbout', '$movieLink') WHERE movie_id='$movieId'";

    if ($conn->query($sql)) {
        echo '<html><script>alert("Movie Edited Successfully"); setTimeout(function() { window.location.href = "../Admin.php"; }, 50);</script></html>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
}
