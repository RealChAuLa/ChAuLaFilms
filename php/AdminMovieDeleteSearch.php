<?php
require_once('config.php');
$movieName = isset($_GET['movieName']) ? trim($_GET['movieName']) : '';
$sql = "SELECT * FROM movietbl WHERE name LIKE '%$movieName%'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $movies = [];
    while ($row = $result->fetch_assoc()) {
        $movies[] = $row;
    }
    $table = createTable($movies);
    echo $table;
} else {
    echo "<p>No movies found.</p>";
}
$conn->close();
function createTable($movies)
{
    
    $html = '<thead class="gradient-custom"><tr><th>ID</th><th data-priority="1">Name</th><th data-priority="2">Genre</th><th data-priority="3">Year</th><th data-priority="4"></th></tr></thead><tbody>';
    foreach ($movies as $movie) {
        $html .= "<tr><td>" . $movie['movie_id'] . "</td><td>" . $movie['name'] . "</td><td>" . $movie['year'] . "</td><td>" . $movie['genre'] . "</td><td>" . '<a class="btn btn-danger ms-md-2" role="button" data-bss-hover-animate="pulse" href="./php/delete.php?Mid='. $movie['movie_id'] .'" id="removeBtn" style="padding:1px;width:78px;height:30px;text-align:center;">Remove</a></td></tr>';
    }
    $html .= "</tbody>";
    return $html;
}
