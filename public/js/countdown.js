// Compte à rebours utilisé dans les pages de redirection auto

window.onload = function countDown(i) {
    i = 5;
    let int = setInterval(function () {
        document.getElementById("countdown").innerHTML = i;
        i-- || clearInterval(int);  // Si 0 on stop l'interval
    }, 1000);
}
