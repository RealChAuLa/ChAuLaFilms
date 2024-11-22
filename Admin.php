<?php
session_start();
if ($_SESSION["type"] != "admin") {
    header("Location: chaulafilms.php");
    exit;
}
?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en" data-bss-forced-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ChAuLa Films</title>
    <link rel="icon" href="./assets/img/logo.png" type="image">
    <link rel="stylesheet" href="assets/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Aboreto.css">
    <link rel="stylesheet" href="assets/css/ADLaM%20Display.css">
    <link rel="stylesheet" href="assets/css/Font%20Awesome%205%20Brands.css">
    <link rel="stylesheet" href="assets/css/Font%20Awesome%205%20Free.css">
    <link rel="stylesheet" href="assets/css/Poppins.css">
    <link rel="stylesheet" href="assets/css/Schibsted%20Grotesk.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/css/Navbar-Right-Links-Dark-icons.css">
    <link rel="stylesheet" href="assets/css/css/style.css">
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="stylesheet" href="assets/css/movieform.css">
    <script src="assets/js/jquery.min.js"></script>



</head>

<body style="background:rgb(33, 37, 41);color:rgb(255,255,255);border-color:rgba(255,255,255,0);">

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

                    <div class="nav-button" onclick="clickItem()" data-target="add"><i class="fas fa-plus-circle" style="margin: 5px;"></i>Add</div>
                    <div class="nav-button" onclick="clickItem()" data-target="edit"><i class="fas fa-newspaper" style="margin: 5px;"></i><span> Edit</span></div>
                    <div class="nav-button" onclick="clickItem()" data-target="remove"><i class="fas fa-trash" style="margin: 5px;"></i><span> Remove</span></div>
                    <div class="nav-button" ><i style="margin: 5px;" ></i><a href="./php/signout.php">SignOut</a></div>
                    
                </ul>
            </div>
        </div>
    </nav>
    <div class="content active" id="add">
        <div class="gradient-custom" style="border-radius: 20px; padding: 5px 15px 5px 15px; min-width: inherit;width:100%;max-width: inherit;">
            <h2 style="font-family: 'ADLaM Display', serif; text-align: left; margin:20px 5px 20px 5px; padding:5px 20px 5px 20px; background-color: rgb(33 37 41 / 0%); border-radius:20px; width: fit-content; ">Add New Movie</h2>
            <div class="formbold-main-wrapper">
                <div class="formbold-form-wrapper">
                    <form action="./php/upload.php" method="post" onsubmit="return validateUpload()" enctype="multipart/form-data">
                        <div class="formbold-input-flex">
                            <div>
                                <label for="movieName" class="formbold-form-label">Name</label>
                                <input type="text" name="movieName" id="movieName" placeholder="Movie Name" class="formbold-form-input" />
                            </div>

                            <div>
                                <label for="movieYear" class="formbold-form-label">Year</label>
                                <input type="text" name="movieYear" id="movieYear" placeholder="Released Year" class="formbold-form-input" />
                            </div>
                            <div>
                                <label class="formbold-form-label">Genre</label>

                                <select class="formbold-form-input" name="movieGenre" id="movieGenre">
                                    <option value="others">Movie Type</option>
                                    <option value="Action">Action</option>
                                    <option value="Adventure">Adventure</option>
                                    <option value="Animation">Animation</option>
                                    <option value="Biography">Biography</option>
                                    <option value="Comedy">Comedy</option>
                                    <option value="Crime">Crime</option>
                                    <option value="Documentary">Documentary</option>
                                    <option value="Drama">Drama</option>
                                    <option value="Family">Family</option>
                                    <option value="Fantasy">Fantasy</option>
                                    <option value="Film-Noir">Film-Noir</option>
                                    <option value="Game-Show">Game-Show</option>
                                    <option value="History">History</option>
                                    <option value="Horror">Horror</option>
                                    <option value="Music">Music</option>
                                    <option value="Musical">Musical</option>
                                    <option value="Mystery">Mystery</option>
                                    <option value="News">News</option>
                                    <option value="Reality-TV">Reality-TV</option>
                                    <option value="Romance">Romance</option>
                                    <option value="Sci-Fi">Sci-Fi</option>
                                    <option value="Sport">Sport</option>
                                    <option value="Talk-Show">Talk-Show</option>
                                    <option value="Thriller">Thriller</option>
                                    <option value="War">War</option>
                                    <option value="Western">Western</option>
                                </select>

                            </div>
                            <div class="formbold-mb-3">
                                <label for="movieLink" class="formbold-form-label">Download Link</label>
                                <input type="text" name="movieLink" id="movieLink" class="formbold-form-input" placeholder="Torrent Magnet Link" />
                            </div>
                        </div>
                        <div class="formbold-mb-3">
                            <label for="movieAbout" class="formbold-form-label">Description</label>
                            <textarea rows="5" name="movieAbout" id="movieAbout" class="formbold-form-input" placeholder="About Movie"></textarea>
                        </div>
                        <div class="formbold-input-flex">
                            <div class="formbold-form-file-flex">
                                <label for="movieCover" class="formbold-form-label">
                                    Upload Cover
                                </label>
                                <input type="file" name="movieCover" id="movieCover" class="formbold-form-file" />
                            </div>
                            <div class="formbold-form-file-flex">
                                <label for="moviePoster" class="formbold-form-label">
                                    Upload Poster
                                </label>
                                <input type="file" name="moviePoster" id="moviePoster" class="formbold-form-file" />
                            </div>
                        </div>

                        <button class="formbold-btn" id="uploadBtn" type="submit" style="background-color:blue;">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="content" id="edit">
        <div class="gradient-custom" style="border-radius: 20px; padding: 5px 15px 5px 15px; min-width: inherit;width:100%;max-width: inherit;">
            <h2 style="font-family: 'ADLaM Display', serif; text-align: left; margin:20px 5px 20px 5px; padding:5px 20px 5px 20px; background-color: rgb(33 37 41 / 0%); border-radius:20px; width: fit-content; ">Edit Movie</h2>
            <div style="display: flex;">
                <div class="LEFTThing" style="padding: 2vw;display: flex;flex-direction: column;">
                    <input type="text" name="EEmovieName" id="EEmovieName" onkeyup="EditsearchMovie()" placeholder="Movie Name To Edit" style="background: rgba(255,255,255,0);color: white;border-radius: 24px;;border-color: rgb(0,0,0);padding-right: 29px;padding-left: 17px;height: 30.8389px;margin-bottom: 14px;margin-top: 16px;margin-left: 6px;overflow-y: auto;">
                    <br>
                    <p>*Type The Movie Name Until There's only one result*</p>
                    <div class="table-responsive" data-pattern="priority-columns">
                        <table id="editResults" class="table tableCustom tableEdit table-bordered table-hover gradient-custom">
                            <!-- Load search results -->
                        </table>
                    </div>
                </div>
                <div id="RIGHTThing" style="margin: 0em 1em 2em 1em;">
                    <!-- Edit Result Form -->
                </div>

                <script>
                    function EditsearchMovie() {
                        const movieName = document.getElementById("EEmovieName").value;
                        document.getElementById("editResults").innerHTML = "";
                        document.getElementById("RIGHTThing").innerHTML = "";
                        if (movieName.length > 1) {
                            fetch('./php/AdminMovieEditSearch.php?movieName=' + movieName)
                                .then(response => response.text())
                                .then(data => {

                                    document.getElementById("editResults").innerHTML = data;
                                    load();
                                })
                                .catch(error => {
                                    console.error("Error fetching movie data:", error);
                                });
                        }
                        load();
                    }

                    function LoadToForm() {
                        const movieID = document.getElementById("loadBtn").value;
                        document.getElementById("RIGHTThing").innerHTML = "";
                        document.getElementById("editResults").innerHTML = "";
                        fetch('./php/edit.php?Mid=' + movieID)
                            .then(response => response.text())
                            .then(data => {

                                document.getElementById("RIGHTThing").innerHTML = data;
                            })
                            .catch(error => {
                                console.error("Error fetching movie data:", error);
                            });

                    }
                </script>
            </div>
        </div>
    </div>
    <div class="content" id="remove">
        <div class="gradient-custom" style="border-radius: 20px; padding: 2vw; min-width: inherit;width:100%;display: flex;flex-direction: column;">
            <h2>Remove Movie</h2>
            <input type="text" name="RmovieName" id="RmovieName" onkeyup="searchMovie()" placeholder="Movie Name To Delete" style="background: rgba(255,255,255,0);color: white;border-radius: 24px;;border-color: rgb(0,0,0);padding-right: 29px;padding-left: 17px;height: 30.8389px;margin-bottom: 14px;margin-top: 16px;margin-left: 6px;overflow-y: auto;">
            <br>
            <div class="table-responsive" data-pattern="priority-columns">
                <table id="DeletesearchResults" class="table tableCustom table-bordered table-hover gradient-custom">
                    <!-- Delete search results -->
                </table>
            </div>
        </div>
    </div>
    <script>
        function searchMovie() {
            const movieName = document.getElementById("RmovieName").value;
            document.getElementById("DeletesearchResults").innerHTML = "";
            if (movieName.length > 1) {
                fetch('./php/AdminMovieDeleteSearch.php?movieName=' + movieName)
                    .then(response => response.text())
                    .then(data => {

                        document.getElementById("DeletesearchResults").innerHTML = data;
                    })
                    .catch(error => {
                        console.error("Error fetching movie data:", error);
                    });
            }
        }
    </script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/admin.js"></script>
</body>

</html>