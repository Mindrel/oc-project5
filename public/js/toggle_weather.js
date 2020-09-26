// Bascule le volet météo
function toggleWeather() {
    document.getElementById("weather").classList.toggle("active"); // Inverse la valeur false ou true
}

// Déclenche auto toggleWeather() dès que page chargée si écran > SM
if (window.matchMedia("(min-width: 768px)").matches) {
    document.addEventListener("DOMContentLoaded", toggleWeather);
    setTimeout(toggleWeather, 2000); // Rebascule auto au bout de 2s
}
