<?php
// Vue page d'accueil

$this->title = "Michel Martin - Le Portfolio | Accueil"
?>

<!-- Section 1 : Hero -->
<section id="hero">
    <div class="container hero-container">
        <img src="public/img/avatar.svg" alt="avatar" class="hero-avatar" />

        <h1>Michel Martin</h1>

        <!-- Séparateur blanc -->
        <div class="white-divider">
            <div class="white-divider-line"></div>
            <div class="white-divider-icon"><i class="fas fa-code"></i></div>
            <div class="white-divider-line"></div>
        </div>

        <h2>Développeur Web Junior - Étudiant OpenClassrooms</h2>

        <!-- Météo -->
        <div id="weather">
            <!-- Bouton ouverture fermeture météo -->
            <div id="weather-toggle-btn" onclick="toggleWeather()">
                <i class="fas fa-sun"></i>
            </div>

            <p class="vertical-text">Un petit peu d'AJAX ?</p>

            <div id="weather-content"></div>
        </div>
    </div>
</section>

<!-- Section 2 : Hello (présentation) -->
<section id="hello">
    <div class="container hello-section-container">
        <h3>Bonjour !</h3>

        <!-- Séparateur sombre -->
        <div class="dark-divider">
            <div class="dark-divider-line"></div>
            <div class="dark-divider-icon"><i class="fas fa-code"></i></div>
            <div class="dark-divider-line"></div>
        </div>

        <div class="hello-text">
            <p>
                Petit padawan ou maître développeur, cador du recrutement ou simple visiteur, qui que vous soyez bienvenue sur mon humble portfolio !<br />
                À vrai dire ce n'est pas qu'un simple portfolio... C'est une sorte de vitrine qui reflète mon niveau de compétences du moment.
                Autrement dit, le niveau d'un développeur junior ! Le parcours OpenClassrooms impose la création de plusieurs projets de développement
                de sites web. C'est au cours du dernier qu'il m'est venu l'idée de créer un site tel que celui-ci.
            </p>

            <p>
                Passionné d'informatique, je suis un technicien un peu touche à tout qui a fini par s'intéresser au code.<br /> 
                Résultat : une année d'études en ligne pour obtenir un diplôme au bout, tout en continuant à exercer un métier à temps plein en parallèle ! N'hésitez pas
                à parcourir les pages de mes projets et à visiter les sites correspondants. Le blog est régulièrement mis à jour et vous pouvez même commenter 
                mes articles. En pied de page vous trouverez des liens vers mon profil LinkedIn et mon compte GitHub. Alors à très vite :)
            </p>
        </div>
    </div>
</section>

<!-- Section 3 : Projets -->
<section id="projects" class="colored-section">
    <div class="container projects-section-container">
        <h3>Mes projets récents</h3>

        <!-- Séparateur blanc -->
        <div class="white-divider">
            <div class="white-divider-line"></div>
            <div class="white-divider-icon"><i class="fas fa-code"></i></div>
            <div class="white-divider-line"></div>
        </div>

        <!-- Galerie de projets -->
        <ul class="projects-gallery">

            <?php
            foreach ($latestProjects as $project) :
            ?>
                <li>
                    <figure>
                        <img src="<?= htmlspecialchars($project->getLogo()) ?>" alt="logo projet" />
                        <figcaption>
                            <a href="index.php?route=project&projectId=<?= htmlspecialchars($project->getId()) ?>"><i class="fas fa-search-plus"></i></a>
                        </figcaption>
                    </figure>
                </li>
            <?php
            endforeach;
            ?>

            <li>
                <figure>
                    <img src="public/img/soon.jpg" alt="futur projet" />
                    <figcaption>
                        <p>D'autres projets à venir prochainement...</p>
                    </figcaption>
                </figure>
            </li>
        </ul>

        <a href="index.php?route=projects&page=1" class="colored-link-button">Voir tous les projets</a>
    </div>
</section>

<!-- Section 4 : Dernier article du blog -->
<section id="latest-article">
    <div class="container latest-article-section-container">
        <h3>Dernier article du blog</h3>

        <!-- Séparateur sombre -->
        <div class="dark-divider">
            <div class="dark-divider-line"></div>
            <div class="dark-divider-icon"><i class="fas fa-code"></i></div>
            <div class="dark-divider-line"></div>
        </div>

        <!-- Date/auteur et contenu article -->

        <article>
            <div class="latest-article-content">
                <header>
                    <h4 class="latest-article-title"><?= htmlspecialchars($latestArticle->getTitle()) ?></h4>
                </header>

                <section>
                    <p>
                        <?= nl2br(htmlspecialchars($latestArticle->getContent())) ?><span class="latest-article-extract-end">... (Go to the blog pour lire la suite)</span>
                    </p>
                </section>
            </div>

            <footer class="latest-article-date">
                <time datetime="<?= htmlspecialchars($latestArticle->getTimeTag()) ?>"><?= ucfirst(htmlspecialchars($latestArticle->getCreationDate())) // ucfirst 1ère lettre majuscule ?></time>
                <p>par <?= htmlspecialchars($latestArticle->getAuthor()) ?></p>
            </footer>
        </article>

        <!-- Lien d'accès au blog -->
        <a href="index.php?route=blog" class="light-link-button">Accéder au blog</a>
    </div>
</section>

<!-- Séparateur de sections -->
<div class="divider"></div>

<!-- Section 5 : Contact -->
<section id="contact">
    <div class="container contact-section-container">
        <h3>Contactez-moi</h3>

        <!-- Séparateur sombre -->
        <div class="dark-divider">
            <div class="dark-divider-line"></div>
            <div class="dark-divider-icon"><i class="fas fa-code"></i></div>
            <div class="dark-divider-line"></div>
        </div>

        <!-- Formulaire de contact -->
        <form method="post" action="index.php?route=sendEmail">
            <div class="contact-input">
                <input type="text" id="nom" name="nom" placeholder="Nom" spellcheck="false" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nom'" />
                <label for="nom">Nom</label>
            </div>

            <div class="contact-input">
                <input type="email" id="email" name="email" placeholder="Email" spellcheck="false" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" />
                <label for="email">Email</label>
            </div>

            <div class="contact-input">
                <textarea id="message" name="message" placeholder="Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Vous n\'êtes pas inspiré ? &#128527;'"></textarea>
                <label for="message">Message</label>
            </div>

            <input type="submit" value="Envoyer" id="submit" name="submit" class="colored-submit-button" />
        </form>
    </div>
</section>

<script src="public/js/toggle_weather.js"></script>
<script src="public/js/position.js"></script>
<script src="public/js/weather.js"></script>