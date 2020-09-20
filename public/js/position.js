// Utilise API getPosition du navigateur pour demander position à l'utilisateur

class Position {
    constructor() {
        this.status = document.getElementById("weather");
    }

    getPosition(success, error) {
        if (navigator.geolocation) {
            this.status.innerHTML = '<p>En attente...</p>';
            navigator.geolocation.getCurrentPosition(success, error);
        }

        else if (!navigator.geolocation) {
            this.status.innerHTML = '<p>Impossible de connaître votre position avec ce navigateur.</p>';
        }
    }
}