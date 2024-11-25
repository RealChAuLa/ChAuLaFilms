<?php
session_start();
require_once './php/config.php';
$Mid = isset($_GET["Mid"]) ? $_GET["Mid"] : null;

if ($Mid === null) {
    header("Location: chaulafilms.php");
    exit;
}
$movieidQuery = $conn->query("SELECT * FROM movietbl WHERE movie_id = $Mid;");
$row = $movieidQuery->fetch_assoc();
?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en" data-bss-forced-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ChAuLa Films</title>
    <link rel="icon" href="./assets/img/logo.png" type="image">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/ADLaM%20Display.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/css/Navbar-Right-Links-Dark-icons.css">
    <link rel="stylesheet" href="assets/css/css/style.css">
    <style>
        .background {
            z-index: -10;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url(data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['cover']); ?>);
            background-size: cover;
            background-position: center;
        }

        .details-gradient-custom {
            border-radius: 30px;
            width: fit-content;
            padding: 10px 29px;
            /* fallback for old browsers */
            background: rgba(33, 37, 41, 0.5);

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(31, 5, 59, 0.5), rgba(37, 117, 252, 0.5));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(33, 37, 41, 0.5), rgba(9, 30, 65, 0.5));
        }


        .black-layer {
            z-index: -10;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, 0) 100%);
            opacity: 99%;
        }

        @keyframes moveBackgroundUpDown {
            0% {
                background-position-y: 0;
            }

            100% {
                background-position-y: 100%;
            }
        }

        @keyframes moveBackgroundLeftRight {
            0% {
                background-position-x: 0;
            }

            100% {
                background-position-x: 100%;
            }
        }
    </style>
    <style>
        .Mcontainer {
            font-family: 'ADLaM Display', serif;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            margin: 66px;
            text-shadow: 4px 4px 8px rgba(0, 0, 0, 0.7);
            align-content: center;
            transition: all 1s;
            transform: scale(100%);

        }

        @media (max-width: 1079px) {
            .Mcontainer {
                flex-direction: column;
                transition: all 1s;

                justify-content: center;

            }

            .column2 {
                flex-direction: column;
                text-align: center;
                justify-content: center;
                align-items: center;
                text-align: center;
                transition: all 1s;

            }

            .row {
                justify-content: center;
            }




        }
    </style>

</head>

<body style="background:rgb(16,16,20);color:rgb(255,255,255);border-color:rgba(255,255,255,0);">
    <div class="not-blured">
        <div class="background"></div>
        <div class="black-layer"></div>
        <script>
            window.onload = function() {
                const background = document.querySelector('.background');

                function checkOrientation() {
                    if (window.innerWidth > window.innerHeight) {
                        // Landscape orientation
                        background.style.animation = 'moveBackgroundUpDown 20s infinite alternate linear';
                    } else {
                        // Portrait orientation
                        background.style.animation = 'moveBackgroundLeftRight 20s infinite alternate linear';
                    }
                }

                checkOrientation(); // Check initial orientation

                // Check orientation on resize
                window.addEventListener('resize', checkOrientation);
            }
        </script>
        <div style="width: auto; height: 80px;">
        </div>
        <nav class="navbar navbar-expand-md gradient-custom py-3 " data-bs-theme="dark" style=" position: fixed; z-index: 10; right: 0; left: 0; top: 0;" id="navBar">
            <div class="container"><a class="navbar-brand d-flex align-items-center " href="./ChAuLaFilms.php"><span class="d-flex justify-content-center align-items-center bs-icon-sm bs-icon-rounded bs-icon-primary me-2 bs-icon" style="background:#ffffff00;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" class="bi bi-film" style="font-size:56px;background:rgba(182,143,143,0);">
                            <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm4 0v6h8V1zm8 8H4v6h8zM1 1v2h2V1zm2 3H1v2h2zM1 7v2h2V7zm2 3H1v2h2zm-2 3v2h2v-2zM15 1h-2v2h2zm-2 3v2h2V4zm2 3h-2v2h2zm-2 3v2h2v-2zm2 3h-2v2h2z"></path>
                        </svg></span><span style="font-family:'ADLaM Display', serif;font-size:26px;">ChAuLa Films</span></a><button data-bs-toggle="collapse" data-bs-target="#navcol-5" class="navbar-toggler"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse " id="navcol-5" style="width:651.606px;">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="./ChAuLaFilms.php" style="font-family:'ADLaM Display', serif;">Home</a></li>
                        <li class="nav-item"><a class="nav-link" id="browseBtn" role="button" style="font-family:'ADLaM Display', serif;">Browse Movies</a></li>
                        <?php
                        if (isset($_SESSION['loggedin'])) { ?>
                            <li class="nav-item"><a class="nav-link" id="accountBtn" href="./Account.php" style="font-family:'ADLaM Display', serif;"><?php echo $_SESSION["userid"]; ?></a></li>
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
        <div class="Mcontainer">
            <!-- Poster Box -->
            <div class="column1" style="flex: 0; padding: 10px; display: flex; justify-content: center; align-items: center;margin: 30px;">
                <div id="movie-poster" style="box-shadow: 0px 0px 46px rgba(0, 0, 0, 1); width: 300px; height: auto; border-radius: 10px;">
                    <?php
                    $movieidQuery = $conn->query("SELECT * FROM movietbl WHERE movie_id = $Mid;");
                    $row = $movieidQuery->fetch_assoc();
                    ?>
                    <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($row['poster']); ?>" alt="<?php echo $row['name']; ?> Poster" style="width: 300px; height: auto; border-radius: 10px;">
                </div>
            </div>
            <div class="column2" style="flex: 1; display: flex; flex-direction: column; justify-content: center;flex-wrap: wrap; margin-left: 20px;">
                <div class="row" style="flex: 0;   margin: 5px;">
                    <h1 class="details-gradient-custom" style="width: fit-content;"><?php echo $row['name']; ?> </h1>
                    <div>
                        <p style="display: inline-block;" class="details-gradient-custom"><?php echo $row['year']; ?> | <?php echo $row['genre']; ?> </p>
                    </div>
                </div>

                <div class="row" style="flex: 0;   margin: 5px;">
                    <p class="details-gradient-custom" style="width: 600px; font-size:large;"><?php echo $row['description']; ?> </p>
                </div>
                <div class="row" style="flex: 0;   margin: 5px;">
                    <a class="btn btn-primary ms-md-2" role="button" data-bss-disabled-mobile="true" data-bss-hover-animate="pulse" href="<?php echo $row['magnet']; ?>" id="downloadBtn" style="padding:0;width:120px;height:29px;text-align:center;margin:7px;">Download</a>
                    <?php
                    if (isset($_SESSION['loggedin'])) {
                        $user_id = $_SESSION["userNo"];
                        $checkQuery = "SELECT * FROM favouritetbl WHERE movie_id = '$Mid' AND user_id = '$user_id'";
                        $result = $conn->query($checkQuery);
                        if ($result->num_rows > 0) { ?>
                            <a class="btn btn-success ms-md-2" role="button" data-bss-hover-animate="pulse" href="./php/FavouritesRemove.php?Mid=<?php echo $row['movie_id']; ?>" id="favouriteBtn" title="Click To Remove Favorites" style="padding:0;width:30px;height:30px;text-align:center;margin:7px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                            </a>
                        <?php } else { ?>
                            <a class="btn btn-outline-success ms-md-2" role="button" data-bss-hover-animate="pulse" href="./php/FavouritesAdd.php?Mid=<?php echo $row['movie_id']; ?>" id="favouriteBtn" title="Add to Favorites" style="padding:0;width:30px;height:30px;text-align:center;margin:7px; color: white; ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-star" viewBox="0 0 16 16">
                                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z" />
                                </svg>
                            </a>
                    <?php
                        }
                    } else {
                        echo '<div><br> </div><p style="opacity: 0.5;">Log In to Add To Favourites</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bs-init-1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/BrowseMovies.js"></script>
</body>

</html>