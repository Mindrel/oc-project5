// Affiche la flèche vers le haut du site

const topArrow = document.getElementById("top-arrow");

function myScrollFunc() {
    let y = window.scrollY;
    if (y >= 150) {
        topArrow.className = "";
    } else {
        topArrow.className = "top-arrow-hidden";
    }
};

window.addEventListener("scroll", myScrollFunc);