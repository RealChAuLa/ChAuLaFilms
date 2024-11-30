<?php
session_start();
include 'config.php';
$Mid = isset($_GET["Mid"]) ? $_GET["Mid"] : null;
if ($Mid === null) {
    echo 'No Movie Selected To be Added to Favourites';
}
else {
    $user_id = $_SESSION["userNo"];
    $sql = "INSERT INTO favouritetbl (user_id, movie_id) VALUES ('$user_id', '$Mid')";
    if ($conn->query($sql)) {
        echo '<html><script>alert("Successfully Added to Favourites"); setTimeout(function() { window.history.go(-1); }, 50);</script></html>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
}
