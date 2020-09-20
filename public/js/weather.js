// Classe qui gère l'élément météo

class Weather {
    constructor() {
        this.position = new Position();
        this.position.getPosition(this.getWeather, this.displayError); // Sans () fait référence à la fonction, avec () exécute la fonction
        this.weatherDiv = document.getElementById("weather");
    }

    // Récupère la météo (en cas de réussite du getPosition)
    getWeather = async (currentPosition) => {
        const response = await fetch("https://www.prevision-meteo.ch/services/json/lat=" + currentPosition.coords.latitude + "lng=" + currentPosition.coords.longitude);
        const jsonWeather = await response.json();

        this.displayData(jsonWeather);
    }

    // Affiche les données récupérées sur le site
    displayData(data) {
        this.weatherDiv.innerHTML = '<img src=' + data.current_condition.icon + ' alt=' + data.current_condition.condition + ' />' +
            '<p>La température actuelle est de ' + data.current_condition.tmp + '°C</p>';
    }
    
    // Récupère la météo de Perpignan en cas d'échec du getPosition
    displayError = async () => {
        const response = await fetch("https://www.prevision-meteo.ch/services/json/Perpignan");
        const jsonWeather = await response.json();
        this.weatherDiv.innerHTML = '<p>Vous n\'avez pas voulu donner votre position ? Je comprends...\nDans ce cas voici le temps qu\'il fait chez moi ! :</p>' +
        '';
    }
}

const weather = new Weather();