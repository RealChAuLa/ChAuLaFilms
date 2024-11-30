<?php
        include 'config.php';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $movieName = $_POST['movieName'];
        $movieYear = $_POST['movieYear'];
        $movieGenre = $_POST['movieGenre'];
        $movieLink = $_POST['movieLink'];
        $movieAbout = $_POST['movieAbout'];
        $poster1 = $_FILES['moviePoster']['tmp_name'];
        $poster1Data = file_get_contents($poster1);
        $moviePoster = addslashes($poster1Data);
        $poster2 = $_FILES['movieCover']['tmp_name'];
        $poster2Data = file_get_contents($poster2);
        $movieCover = addslashes($poster2Data);
        $sql = "INSERT INTO movietbl (name, year, genre, description, cover, magnet, poster) VALUES ('$movieName', '$movieYear', '$movieGenre', '$movieAbout','$movieCover', '$movieLink', '$moviePoster')";
        if ($conn->query($sql)) {
            echo '<html><script>alert("Movie Added Successfully"); setTimeout(function() { window.location.href = "../Admin.php"; }, 50);</script></html>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        mysqli_close($conn);
        }