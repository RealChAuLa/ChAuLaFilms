<?php
session_start();
include 'config.php';

$Mid = isset($_GET["Mid"]) ? $_GET["Mid"] : null;
if ($Mid === null) {
    echo 'No Movie Selected To be Removed from Favorites';
} else {
    $user_id = $_SESSION["userNo"];
    $sql = "DELETE FROM favouritetbl WHERE user_id = '$user_id' AND movie_id = '$Mid'";
    if ($conn->query($sql)) {
        echo '<html><script>alert("Successfully Removed from Favorites"); setTimeout(function() { window.history.go(-1); }, 50);</script></html>';
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
     mysqli_close($conn);
}
