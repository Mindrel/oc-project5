// Bascule le volet météo
function toggleWeather() {
    document.getElementById("weather").classList.toggle("active"); // Inverse la valeur false ou true
}

// Déclenche auto toggleWeather() dès que page chargée
document.addEventListener("DOMContentLoaded", toggleWeather);

// Rebascule auto au bout de 2s
setTimeout(toggleWeather, 2000);