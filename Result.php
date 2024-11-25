<?php
session_start();
require_once './php/config.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Check if the required form fields are set
    $Mname = isset($_GET['Mname']) ? $_GET['Mname'] : '';
    $genre = isset($_GET['genre']) ? $_GET['genre'] : '';
    $year = isset($_GET['year']) ? $_GET['year'] : '';
    $sql = "SELECT * FROM movietbl WHERE 1";
    if (!empty($Mname)) {
        $sql .= " AND name LIKE '%$Mname%'";
    }
    if (!empty($genre)) {
        $sql .= " AND genre = '$genre'";
    }
    if (!empty($year)) {
        $sql .= " AND year = '$year'";
    }
    $sql .= " ORDER BY movie_id DESC";
    $movieQuery = $conn->query($sql);
}
?>



<!DOCTYPE html>
<html data-bs-theme="light" lang="en" data-bss-forced-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ChAuLa Films</title>
    <link rel="icon" href="./assets/img/logo.png" type="image">
    <script src="assets/js/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="assets/css/Aboreto.css">
    <link rel="stylesheet" href="assets/css/ADLaM%20Display.css">
    <link rel="stylesheet" href="assets/css/Font%20Awesome%205%20Brands.css">
    <link rel="stylesheet" href="assets/css/Font%20Awesome%205%20Free.css">
    <link rel="stylesheet" href="assets/css/Poppins.css">
    <link rel="stylesheet" href="assets/css/Schibsted%20Grotesk.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/css/Navbar-Right-Links-Dark-icons.css">
    <link rel="stylesheet" href="assets/css/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/css/style.css">
    <link rel="stylesheet" href="assets/css/Carousel-Hero.css">
    <link rel="stylesheet" href="assets/css/Footer-with-social-media-icons.css">
    <style>
        .browse-content .browse-movie-bottom {
            max-width: 180px;
        }

        a {
            text-decoration: none !important;
        }

        * {
            font-family: 'ADLaM Display', serif;
        }

        .container {
            margin-right: auto;
            margin-left: auto;
            padding-left: 15px;
            padding-right: 15px;
        }

        .browse-content section {
            margin-top: 20px;
            box-sizing: border-box;
        }

        .browse-movie-wrap {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            margin-bottom: 20px;
        }

        .browse-movie-link {
            display: block;
            max-width: 220px;
            border: 5px solid #fff;
            transition: border .15s ease-in-out;
            border-radius: 4px;
            font-size: 24px;
        }

        .browse-movie-title {
            font-size: .85em;
            color: #fff;
            font-size: 20px;
            display: block;
            transition: color .15s ease-in-out;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .browse-movie-year {
            color: #fff;
            font-size: 20px;
        }

        img {
            height: 252px;
            width: 170px;
            object-fit: cover;
        }

        @media (min-width: 576px) {
            .browse-movie-wrap {
                width: 50%;
            }
        }

        @media (min-width: 768px) {
            .browse-movie-wrap {
                width: 33.3333%;
            }
        }

        @media (min-width: 992px) {
            .browse-movie-wrap {
                width: 25%;
            }
        }

        @media (min-width: 1200px) {
            .browse-movie-wrap {
                width: 20%;
            }
        }
    </style>
</head>

<body style="background:rgb(16,16,20);color:rgb(255,255,255);border-color:rgba(255,255,255,0);">
    <div class="not-blured">
        <div style="width: auto; height: 80px;">
        </div>
        <nav class="navbar navbar-expand-md gradient-custom py-3 " data-bs-theme="dark" style=" position: fixed; z-index: 10; right: 0; left: 0; top: 0;" id="navBar">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center " href="./ChAuLaFilms.php">
                    <span class="d-flex justify-content-center align-items-center bs-icon-sm bs-icon-rounded bs-icon-primary me-2 bs-icon" style="background:#ffffff00;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" class="bi bi-film" style="font-size:56px;background:rgba(182,143,143,0);">
                            <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm4 0v6h8V1zm8 8H4v6h8zM1 1v2h2V1zm2 3H1v2h2zM1 7v2h2V7zm2 3H1v2h2zm-2 3v2h2v-2zM15 1h-2v2h2zm-2 3v2h2V4zm2 3h-2v2h2zm-2 3v2h2v-2zm2 3h-2v2h2z"></path>
                        </svg>
                    </span>
                    <span style="font-family:'ADLaM Display', serif;font-size:26px;">ChAuLa Films</span></a><button data-bs-toggle="collapse" data-bs-target="#navcol-5" class="navbar-toggler"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse " id="navcol-5" style="width:651.606px;">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="./ChAuLaFilms.php" style="font-family:'ADLaM Display', serif;">Home</a></li>
                        <li class="nav-item"><a class="nav-link" id="browseBtn" role="button" style="font-family:'ADLaM Display', serif;">Browse Movies</a></li>
                        <?php
                        if (isset($_SESSION['loggedin'])) { ?>
                            <li class="nav-item"><a class="nav-link" id="accountBtn" href="Account.php" style="font-family:'ADLaM Display', serif;"><?php echo $_SESSION["userid"]; ?></a></li>
                        <?php } else {
                            // If not logged in, show the Log In link
                            echo '<li class="nav-item"><a class="btn btn-primary ms-md-2" role="button" data-bss-disabled-mobile="true" data-bss-hover-animate="pulse" href="#" id="loginBtn" style="padding:0;width:70px;height:29px;text-align:center;margin:7px;font-family:\'ADLaM Display\', serif;">Log In</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <form action="./php/search.php" method="GET">
            <div class="text-center d-xl-flex justify-content-xl-center align-items-xl-center gradient-custom" id="NosearchDiv">
                <input type="text" name="Mname" id="Mname" placeholder="Search a Movie" style="font-family: 'ADLaM Display', serif;background: rgba(255,255,255,0);color: white;border-radius: 24px;padding: 0px;border-color: rgb(0,0,0);margin: 0px;padding-right: 29px;padding-left: 17px;height: 30.8389px;margin-bottom: 14px;margin-top: 16px;margin-left: 6px;overflow-y: auto;">
                <label class="form-label text-end form-label" style="font-family: 'ADLaM Display', serif;padding: 0px;margin: 20px;height: 24.9712px;width: 60px;margin-right: 20px;margin-left: 22px;">Genre :</label>
                <select name="genre" style="font-family: 'ADLaM Display', serif;background: rgba(255,255,255,0);color: rgb(108,108,108);border-radius: 24px;padding: 0px;border-color: rgb(0,0,0);margin: 0px;padding-right: 29px;padding-left: 17px;height: 30.8389px;margin-bottom: 14px;margin-top: 16px;margin-left: 6px;overflow-y: auto;">
                    <option value="">Movie Type</option>
                    <?php
                    $movieidQuery = $conn->query("SELECT DISTINCT genre FROM movietbl  ORDER BY genre ASC;");
                    while ($row = $movieidQuery->fetch_assoc()) {
                    ?>
                        <option value="<?php echo $row['genre']; ?>"><?php echo $row['genre']; ?></option>
                    <?php
                    }
                    ?>
                </select>
                <label class="form-label text-end form-label" style="font-family: 'ADLaM Display', serif;padding: 0px;margin: 20px;height: 24.9712px;width: 49.1995px;margin-right: 20px;margin-left: 22px;">Year :</label>
                <select name="year" style="font-family: 'ADLaM Display', serif;background: rgba(255,255,255,0);color: rgb(108,108,108);border-radius: 24px;padding: 6px;border-color: rgb(0,0,0);margin: -8px;width: 85.072px;padding-left: 10px;margin-top: 11px;margin-bottom: 14px;margin-right: 21px;margin-left: 13px;">
                    <?php
                    $movieidQuery = $conn->query("SELECT DISTINCT year FROM movietbl ORDER BY year DESC;");
                    ?>
                    <option value="">All</option>

                    <?php
                    while ($row = $movieidQuery->fetch_assoc()) {
                    ?>
                        <option value="<?php echo $row['year']; ?>"><?php echo $row['year']; ?></option>
                    <?php
                    }
                    ?>

                </select>
                <input class="btn btn-primary" type="submit" data-bss-disabled-mobile="true" data-bss-hover-animate="pulse" style="padding: 2px 20px;margin: 8px;height: 33.524px;border-radius: 18px;font-family: 'ADLaM Display', serif;border-width: 4px;width: 102.332px;margin-left: 29px;padding-left: 0px;padding-right: 0px;padding-top: 0px;padding-bottom: 0px;margin-bottom: 14px;margin-top: 14px;margin-right: 22px;">
            </div>
        </form>
        <div class="browse-content">
            <div class="container">
                <section>
                    <div class="row">
                        <?php
                        while ($row = $movieQuery->fetch_assoc()) {
                        ?>
                            <div class="browse-movie-wrap col-sm-4 col-md-5 col-lg-4">
                                <a href="Movie.php?Mid=<?php echo $row['movie_id']; ?>" class="browse-movie-link">
                                    <img class="img-responsive" src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($row['poster']); ?>">
                                </a>
                                <div class="browse-movie-bottom">
                                    <a href="Movie.php?Mid=<?php echo $row['movie_id']; ?>" class="browse-movie-title"><?php echo $row['name']; ?></a>
                                    <div class="browse-movie-year"><?php echo $row['year']; ?></div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </section>
            </div>
        </div>

        <footer id="footer">
            <div class="gradient-custom" style="text-align: center; margin: 30px; padding: 15px; border-radius: 15px;">
                <p style="margin-top: auto;color:grey; font-family: 'ADLaM Display', serif">Copyright © 2024 ChAuLa Films Division Of ChAuLa Entertainment Pvt. Ltd.</p>
            </div>
        </footer>
    </div>

    <div class="popup-container active " style="z-index: 10">
        <div class=" container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white gradient-custom" style="border-radius: 2rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-8">
                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-white-50 mb-5">Please enter your login and password!</p>
                                <form id="loginForm" name="loginForm" action="./php/login.php" method="post" onsubmit="return validateLogin()">
                                    <div class="form-outline form-white mb-4">
                                        <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Your Email" />
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Your Password" />
                                    </div>
                                    <button class="btn btn-outline-light btn-lg px-5" type="submit" data-bss-hover-animate="pulse" id="loginButton">Login</button>
                                </form>
                            </div>
                            <div>
                                <p class="">Don't have an account?
                                    <a href="SignUp.php" class="text-white-50 fw-bold">Sign Up</a>
                                </p>
                            </div>
                            <div class="loginClose-icon">
                                <i class="fa-regular fa-circle-xmark fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/BrowseMovies.js"></script>
</body>

</html>