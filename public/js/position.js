// Utilise API geolocation du navigateur pour demander position à l'utilisateur

class Position {
    constructor() {
        this.status = document.getElementById("weather-content");
    }

    // Déclenche l'API JS geolocation et affiche message selon réussite ou échec
    getPosition(success, error) {
        if (navigator.geolocation) {
            this.status.innerHTML = '<p>En attente de connaître votre position...</p>';
            navigator.geolocation.getCurrentPosition(success, error);
        }

        else if (!navigator.geolocation) {
            this.status.innerHTML = '<p>Dommage, le site n\'est pas en mesure de connaître votre position...</p>';
        }
    }
}