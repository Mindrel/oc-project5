// Utilise API geolocation du navigateur pour demander position à l'utilisateur

class Position {
    constructor() {
        this.status = document.getElementById("weather-content");
    }

    getPosition(success, error) {
        if (navigator.geolocation) {
            this.status.innerHTML = '<p>En attente de connaître votre position...</p>';
            navigator.geolocation.getCurrentPosition(success, error);
        }

        else if (!navigator.geolocation) {
            this.status.innerHTML = '<p>Dommage, vous n\'êtes pas en mesure d\'afficher la météo...</p>';
        }
    }
}