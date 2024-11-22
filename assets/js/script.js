document.addEventListener("DOMContentLoaded", function () {
  /* Login Hide/Show */
  const popupContainerEl = document.querySelector(".popup-container");
  const containerEl = document.querySelector(".not-blured");
  const btnEl = document.getElementById("loginBtn");
  const closeIconEl = document.querySelector(".loginClose-icon");

  btnEl.addEventListener("click", () => {
    containerEl.classList.add("not");
    popupContainerEl.classList.remove("active");
  });

  closeIconEl.addEventListener("click", () => {
    containerEl.classList.remove("not");
    popupContainerEl.classList.add("active");
  });

  var actionMovieBtn = document.getElementById("actionMovieBtn");
  var romanceMovieBtn = document.getElementById("romanceMovieBtn");
  var comedyMovieBtn = document.getElementById("comedyMovieBtn");
  var horrorMovieBtn = document.getElementById("horrorMovieBtn");

  var actionMovies = document.getElementById("actionMovies");
  var romanceMovies = document.getElementById("romanceMovies");
  var comedyMovies = document.getElementById("comedyMovies");
  var horrorMovies = document.getElementById("horrorMovies");

  actionMovieBtn.addEventListener("click", function () {
    actionMovies.scrollIntoView({ behavior: 'smooth' });
  });

  romanceMovieBtn.addEventListener("click", function () {
    romanceMovies.scrollIntoView({ behavior: 'smooth' });
  });

  comedyMovieBtn.addEventListener("click", function () {
    comedyMovies.scrollIntoView({ behavior: 'smooth' });
  });

  horrorMovieBtn.addEventListener("click", function () {
    horrorMovies.scrollIntoView({ behavior: 'smooth' });
  });
});





function validateSignup() {
  let x = document.forms["signupForm"]["firstname"].value;
  if (x == "") {
    alert("First Name must be filled out!");
    return false;
  }

  let p = document.forms["signupForm"]["username"].value;
  if (x == "") {
    alert("Userame must be filled out!");
    return false;
  }

  let y = document.forms["signupForm"]["email"].value;
  if (y == "") {
    alert("Email must be filled out!");
    return false;
  }
  var atops = y.indexOf("@");
  var dotpos = y.lastIndexOf(".");
  if (atops < 1 || (dotpos - atops < 2)) {
    alert("Please enter a Correct Email");
    return false;
  }

  if (document.signupForm.password.value != document.signupForm.verifypassword.value) {
    alert("Password Doesn't Match");
    document.signupForm.password.value = "";
    document.signupForm.verifypassword.value = "";
    return false;
  }
  else {
    let pw = document.forms["signupForm"]["password"].value;
    if (pw == "") {
      alert("Password must be filled out!");
      return false;
    }
  }

  return true;
};

function validateLogin() {
  let y = document.forms["loginForm"]["emailBox"].value;
  if (y == "") {
    alert("Email must be filled out!");
    return false;
  }
  var atops = y.indexOf("@");
  var dotpos = y.lastIndexOf(".");
  if (atops < 1 || (dotpos - atops < 2)) {
    alert("Please enter a Correct Email");
    return false;
  }

  let pw = document.forms["loginForm"]["passwordBox"].value;
  if (pw == "") {
    alert("Password must be filled out!");
    return false;
  }
  return true;

};


function validateUpload() {
  var movieName = document.getElementById('movieName');
  var movieYear = document.getElementById('movieYear');
  var movieGenre = document.getElementById('movieGenre');
  var movieLink = document.getElementById('movieLink');
  var movieAbout = document.getElementById('movieAbout');
  var movieCover = document.getElementById('movieCover');
  var moviePoster = document.getElementById('moviePoster');

  if (movieName.value === '') {
    alert('Please enter a movie name');
    return false;
  }

  if (movieYear.value === '' || isNaN(movieYear.value) || movieYear.value > 2300 || movieYear.value < 1888) {
    alert('Please enter a valid year');
    return false;
  }

  if (movieGenre.value === 'others') {
    alert('Please select a movie genre');
    return false;
  }

  if (movieLink.value === '') {
    alert('Please enter a download link');
    return false;
  }

  if (movieAbout.value === '') {
    alert('Please enter a description');
    return false;
  }

  if (movieCover.files.length === 0) {
    alert('Please select a movie cover image');
    return false;
  }

  if (moviePoster.files.length === 0) {
    alert('Please select a movie poster image');
    return false;
  }

  return true;
}




