<?php
include "config.php" ;
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $Mname = isset($_GET['Mname']) ? $_GET['Mname'] : '';
    $genre = isset($_GET['genre']) ? $_GET['genre'] : '';
    $year = isset($_GET['year']) ? $_GET['year'] : '';
    $params = array();
    if (!empty($Mname)) {
        $params[] = "Mname=" . urlencode($Mname);
    }
    if (!empty($genre)) {
        $params[] = "genre=" . urlencode($genre);
    }
    if (!empty($year)) {
        $params[] = "year=" . urlencode($year);
    }
    $redirect_url = "../result.php";
    if (!empty($params)) {
        $redirect_url .= "?" . implode("&", $params);
    }
    header("Location: $redirect_url");
    exit; 
} else {
    echo "Error: Invalid request method.";
}
?>
