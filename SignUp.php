<?php

include "./php/config.php" ;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $email = $_POST["email"]; 
    $password = $_POST["password"];
    $sql = "INSERT INTO logintbl (username,password,email,first_name,last_name) VALUES ('$username','$password','$email','$firstname','$lastname')"; 
    $result = mysqli_query($conn, $sql);

    if ($result == TRUE) {
      echo '<script>';
      echo 'alert("SignUp Successful Will ReDirect to HomePage");'; 
      echo 'setTimeout(function() {'; 
      echo 'window.location.href = "./ChAuLaFilms.php";';
      echo '}, 40);';
      echo '</script>';
      exit;
    }
    else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      echo"wrong";
    } 
    mysqli_close($conn); 
  }
?>








<!DOCTYPE html>
<html data-bs-theme="light" lang="en" data-bss-forced-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ChAuLa Films</title>
    <link rel="icon" href="./assets/img/logo.png" type="image">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/css/css/style.css">
    <link rel="stylesheet" href="assets/css/Carousel-Hero.css">
    <link rel="stylesheet" href="assets/css/Footer-with-social-media-icons.css">
    <style>
        /* Add smooth transition to all elements */
        * {
            transition: all 0.3s ease-in-out;
        }

        /* Define animations for specific elements */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Apply animation to elements */
        .animate-fade-in {
            animation: fadeIn 2s ease-in-out;
        }
    </style>
</head>
<body class="gradient-custom" style="background-color: black;" >



    <!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden animate-fade-in">
  <style>
    .background-radial-gradient {
      background-color:rgb(33, 37, 41);
      background-image: radial-gradient(650px circle at 0% 0%,
            hsl(218, 41%, 20%) 15%,
        rgb(40, 37, 41) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%),
        radial-gradient(1250px circle at 100% 100%,
          hsl(218, 41%, 45%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsla(226, 100%, 50%, 1)
          transparent 100%);
    }

    #radius-shape-1 {
      height: 220px;
      width: 220px;
      top: -60px;
      left: -130px;
      background: radial-gradient(hsla(247, 100%, 25%, 1), hsla(247, 100%, 55%, 1));
      overflow: hidden;
    }

    #radius-shape-2 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      bottom: -60px;
      right: -110px;
      width: 300px;
      height: 300px;
      background: radial-gradient(hsla(226, 100%, 50%, 1), hsla(247, 100%, 50%, 1));
      overflow: hidden;
    }

    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
  </style>

  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
        
        

        <a class="navbar-brand d-flex align-items-center" href="#">
                    <span class="d-flex justify-content-center align-items-center bs-icon-sm bs-icon-rounded bs-icon-primary me-1 bs-icon" style="background:#ffffff00;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="4em" height="4em" fill="currentColor" viewbox="0 0 16 14" class="bi bi-film" style="font-size:56px;background:rgba(182,143,143,0);">
                            <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm4 0v6h8V1zm8 8H4v6h8zM1 1v2h2V1zm2 3H1v2h2zM1 7v2h2V7zm2 3H1v2h2zm-2 3v2h2v-2zM15 1h-2v2h2zm-2 3v2h2V4zm2 3h-2v2h2zm-2 3v2h2v-2zm2 3h-2v2h2z">
                            </path>
                        </svg>
                        </span>
                    <span style="font-family:'ADLaM Display', serif;font-size:40px;">ChAuLa Films</span>
                </a>
        
        
        
        
        Find Whatever <br />
          <span style="color: hsl(218, 81%, 75%)">YOU LIKE !</span>
        </h1>
        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
        ChAuLa Films is a unique platform that caters to film enthusiasts of all kinds. , it embodies the spirit of diversity and inclusivity in the world of cinema.Whether you’re a fan of classic films, indie gems, blockbuster hits, or international cinema, ChAuLa Films is your go-to destination.
        It’s designed to help users navigate the vast world of film and find exactly what they’re looking for.The site offers an extensive library of films from various genres, directors, and eras. It’s more than just a streaming platform; it’s a community for film lovers. Users can explore, 
        It’s a place where everyone can find something they like and discover the magic of film. 🎬
        </p>
      </div>

      <div class="col-lg-6 mb-1 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass gradient-custom" style="border-radius: 20px;" >
          <div class="card-body px-4 py-5 px-md-5 " style="-webkit-text-fill-color: aliceblue;" >



          









            <form name="signupForm" id="signupForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateSignup()" method="post" >
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" id="firstname" name="firstname" class="form-control" style="background-color: rgb(30, 30, 40)" />
                    <label class="form-label" for="firstname">First name *</label>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" id="lastname" name="lastname" class="form-control" style="background-color: rgb(30, 30, 40)"/>
                    <label class="form-label" for="lastname">Last name</label>
                  </div>
                </div>
              </div>

              <!-- username input -->
              <div class="form-outline mb-4">
                <input type="username" id="username" name="username" class="form-control" style="background-color: rgb(30, 30, 40)"/>
                <label class="form-label" for="username">Username *</label>
              </div>

              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="email" name="email" class="form-control" style="background-color: rgb(30, 30, 40)" />
                <label class="form-label" for="email">Email address *</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="password" name="password" class="form-control" style="background-color: rgb(30, 30, 40)"/>
                <label class="form-label" for="password">Password *</label>
              </div>

              <!-- verify Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="verifypassword" name="verifypassword" class="form-control" style="background-color: rgb(30, 30, 40)" />
                <label class="form-label" for="verifypassword">Verify Password *</label>
              </div>

              

              <!-- Submit button -->
              <button type="submit" class="btn btn-primary btn-block mb-1">
                Sign up
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->










<script src="assets/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>

</html>


