<?php
if (isset($_GET['Mid'])) {
    $movieId = $_GET['Mid'];
    include "config.php";
    $sql = "DELETE FROM movietbl WHERE movie_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $movieId);
    if ($stmt->execute()) {
        $stmt->close();
        echo '<html><script>alert("Movie Removed Successfully"); setTimeout(function() { window.location.href = "../Admin.php"; }, 50);</script></html>';
    } else {
        echo 'Query Execution Error';
    }
} else {
    echo 'No Movies are Selected to Delete';
}
