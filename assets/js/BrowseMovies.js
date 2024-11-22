
let browseBtn = document.getElementById("browseBtn");
let searchDiv = document.getElementById("NosearchDiv");
let isVisible = false;
browseBtn.addEventListener("click", () => {


    isVisible = !isVisible; // Toggle the visibility state
    if (isVisible) {
        searchDiv.id = "NosearchDiv";
        isSearchDiv = false;
        browseBtn.className = "nav-link";
    } else {
        searchDiv.id = "searchDiv";
        isSearchDiv = true;
        browseBtn.className = "nav-link active";
    }

});





