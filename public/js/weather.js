// Classe qui gère l'élément météo

class Weather {
    constructor() {
        this.position = new Position();
        this.position.getPosition(this.getWeather, this.getDefaultWeather); // Sans () fait référence à la fonction, avec () exécute la fonction
        this.weatherElement = document.getElementById('weather-content');
        this.city = 'Perpignan';
    }

    // Récupère la météo de la position de l'utilisateur (en cas de réussite du getPosition)
    getWeather = async (currentPosition) => {
        const response = await fetch('https://www.prevision-meteo.ch/services/json/lat=' + currentPosition.coords.latitude + 'lng=' + currentPosition.coords.longitude);
        const jsonWeather = await response.json();

        this.displayData(jsonWeather);
    }

    // Affiche les données récupérées de la position de l'user
    displayData(data) {
        this.weatherElement.innerHTML = '<p class="weather-title">Votre temps</p><div class="weather-today"><p>Aujourd\'hui</p><img src=' +
            data.fcst_day_0.icon +
            ' alt="' +
            data.fcst_day_0.condition +
            '" class="weather-img" />' +
            '<p>Min. : ' +
            data.fcst_day_0.tmin +
            '°C</p><p>Max. : ' +
            data.fcst_day_0.tmax +
            '°C</p></div><div class="weather-tomorrow"><p>Demain</p><img src=' +
            data.fcst_day_1.icon +
            ' alt="' +
            data.fcst_day_1.condition +
            '" class="weather-img" /><p>Min. : ' +
            data.fcst_day_1.tmin +
            '°C</p><p>Max : ' +
            data.fcst_day_1.tmax +
            '°C</p></div>';
    }

    // Par défaut récupère la météo de this.city en cas d'échec du getPosition
    getDefaultWeather = async () => {
        const response = await fetch(`https://www.prevision-meteo.ch/services/json/${this.city}`);
        const jsonWeather = await response.json();

        this.displayDefaultData(jsonWeather);
    }

    // Affiche les données de this.city récupérées en cas d'échec du getPosition
    displayDefaultData(data) {
        this.weatherElement.innerHTML = '<p>Puisque vous n\'avez pas accepté de partager votre position, voici le temps qu\'il fait actuellement à ' +
            this.city + ' ! </p>' +
            '<div><img src=' +
            data.current_condition.icon +
            ' alt="' +
            data.current_condition.condition +
            '" class="weather-img" /><p>' +
            data.current_condition.tmp +
            '°C</p></div>';
    }
}

const weather = new Weather();