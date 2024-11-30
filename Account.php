<?php
session_start();
require_once './php/config.php';
if (!isset($_SESSION["loggedin"])) {
    header("Location: chaulafilms.php");
    exit;
}
$userId = $_SESSION["userNo"];
$movieidQuery = $conn->query("SELECT movie_id FROM favouritetbl WHERE user_id = $userId");
?>

<!DOCTYPE html>
<html data-bs-theme="light" lang="en" data-bss-forced-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ChAuLa Films</title>
    <link rel="icon" href="./assets/img/logo.png" type="image">
    <link rel="stylesheet" href="assets/css/ADLaM%20Display.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/css/Navbar-Right-Links-Dark-icons.css">
    <link rel="stylesheet" href="assets/css/css/style.css">
    <link rel="stylesheet" href="assets/css/Carousel-Hero.css">
    <link rel="stylesheet" href="assets/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/table.css">
</head>

<body style="background:rgb(16,16,20);color:rgb(255,255,255);border-color:rgba(255,255,255,0);">

    <div style="width: auto; height: 80px;">

    </div>
    <nav class="navbar navbar-expand-md gradient-custom py-3 " data-bs-theme="dark" style=" position: fixed; z-index: 10; right: 0; left: 0; top: 0;">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="./ChAuLaFilms.php">
                <span class="d-flex justify-content-center align-items-center bs-icon-sm bs-icon-rounded bs-icon-primary me-2 bs-icon" style="background:#ffffff00;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" class="bi bi-film" style="font-size:56px;background:rgba(182,143,143,0);">
                        <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm4 0v6h8V1zm8 8H4v6h8zM1 1v2h2V1zm2 3H1v2h2zM1 7v2h2V7zm2 3H1v2h2zm-2 3v2h2v-2zM15 1h-2v2h2zm-2 3v2h2V4zm2 3h-2v2h2zm-2 3v2h2v-2zm2 3h-2v2h2z">
                        </path>
                    </svg>
                </span>
                <span style="font-family:'ADLaM Display', serif;font-size:26px;">ChAuLa Films</span>
            </a>
            <button data-bs-toggle="collapse" data-bs-target="#navcol-5" class="navbar-toggler">
                <span class="visually-hidden">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navcol-5" style="width:651.606px; align-items: end;">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="./ChAuLaFilms.php" style="font-family:'ADLaM Display', serif;">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="./php/signout.php" style="font-family:'ADLaM Display', serif;">SignOut</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet prefetch' href='https://s3-us-west-2.amazonaws.com/s.cdpn.io/123941/rwd.table.min.css'>
    

    <div class="gradient-custom" style="border-radius: 20px; padding: 5px 15px 5px 15px; min-width: inherit;width:fit-content; max-width: inherit;left: 50%;margin: 15px auto;">

        <h2 style="font-family: 'ADLaM Display', serif; text-align: left; margin:20px 5px 20px 5px; padding:5px 20px 5px 20px; background-color: rgb(33 37 41 / 0%); border-radius:20px; width: fit-content; "><?php echo $_SESSION["uName"]; ?>'s Favourite Movies</h2>

        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive" data-pattern="priority-columns" style="border-radius: 20px;">
                        <table class="table table-bordered table-hover gradient-custom" style="background-color: #ffffff00;  ">
                            <thead class="gradient-custom">
                                <tr>
                                    <th>ID</th>
                                    <th data-priority="1">Name</th>
                                    <th data-priority="2">Genre</th>
                                    <th data-priority="3">Year</th>
                                    <th data-priority="4"></th>
                                    <th data-priority="5"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Database connection is already included at the beginning
                                while ($row = $movieidQuery->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['movie_id']; ?></td>
                                        <?php
                                        $movieid = $row['movie_id'];
                                        $moviedetailsQuery = $conn->query("SELECT * FROM movietbl WHERE movie_id = $movieid");
                                        while ($rows = $moviedetailsQuery->fetch_assoc()) {
                                        ?>
                                            <td>
                                                <a href="Movie.php?Mid=<?php echo $row['movie_id']; ?>">
                                                    <?php echo $rows['name']; ?>
                                                </a>
                                            </td>
                                            <td><?php echo $rows['genre']; ?></td>
                                            <td><?php echo $rows['year']; ?></td>
                                            <!-- make the remove button -->
                                            <td>
                                                <a class="btn btn-success ms-md-2" role="button" data-bss-hover-animate="pulse" href="<?php echo $rows['magnet']; ?>" id="downloadBtn" style="padding:1px;width:100px;height:30px;text-align:center;font-family:'ADLaM Display', serif;">Download</a>
                                            </td>
                                            <td>
                                                <a class="btn btn-danger ms-md-2" role="button" data-bss-hover-animate="pulse" href="./php/FavouritesRemove.php?Mid=<?php echo $row['movie_id']; ?>" id="removeBtn" style="padding:1px;width:78px;height:30px;text-align:center;font-family:'ADLaM Display', serif;">Remove</a>
                                            </td>

                                        <?php
                                        }
                                        ?>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>

                        </table>
                    </div><!--end of .table-responsive-->
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/BrowseMovies.js"></script>
</body>

</html>