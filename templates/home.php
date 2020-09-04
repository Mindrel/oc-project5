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
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellendus cumque error cum ex incidunt placeat, minus odio qui inventore consectetur provident, voluptatum praesentium sit nemo vitae iusto. Beatae, recusandae adipisci!
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates animi accusamus molestiae autem deserunt repellendus ex veniam quod impedit, quaerat cumque molestias iusto! Nobis repellat perferendis quidem perspiciatis voluptatibus? Laudantium!
                </p>

                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellendus cumque error cum ex incidunt placeat, minus odio qui inventore consectetur provident, voluptatum praesentium sit nemo vitae iusto. Beatae, recusandae adipisci!
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid rem quisquam praesentium porro autem dolore quis ut commodi, dolorum maxime et quas quia sint totam incidunt voluptatum impedit iure culpa.
                </p>
            </div>
        </div>
    </section>

    <!-- Section 3 : Projets -->
    <section id="projects" class="colored-section">
        <div class="container projects-section-container">
            <h3>Mes super projets</h3>

            <!-- Séparateur blanc -->
            <div class="white-divider">
                <div class="white-divider-line"></div>
                <div class="white-divider-icon"><i class="fas fa-code"></i></div>
                <div class="white-divider-line"></div>
            </div>

            <!-- Galerie de projets -->
            <ul class="projects-gallery">
                <li>
                    <figure>
                        <img src="public/img/1.jpg" alt="projet" />
                        <figcaption>
                            <i class="fas fa-search-plus"></i>
                        </figcaption>
                    </figure>
                </li>

                <li>
                    <figure>
                        <img src="public/img/2.jpg" alt="projet" />
                        <figcaption>
                            <i class="fas fa-search-plus"></i>
                        </figcaption>
                    </figure>
                </li>

                <li>
                    <figure>
                        <img src="public/img/3.jpg" alt="projet" />
                        <figcaption>
                            <i class="fas fa-search-plus"></i>
                        </figcaption>
                    </figure>
                </li>

                <li>
                    <figure>
                        <img src="public/img/4.jpg" alt="projet" />
                        <figcaption>
                            <i class="fas fa-search-plus"></i>
                        </figcaption>
                    </figure>
                </li>

                <li>
                    <figure>
                        <img src="public/img/5.jpg" alt="projet" />
                        <figcaption>
                            <i class="fas fa-search-plus"></i>
                        </figcaption>
                    </figure>
                </li>

                <li>
                    <figure>
                        <img src="public/img/soon.jpg" alt="futur projet" />
                        <figcaption>
                            <p>Prochainement...</p>
                        </figcaption>
                    </figure>
                </li>
            </ul>

            <a href="#" class="colored-link-button">Voir tous les projets</a>
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
                        <h4 class="latest-article-title">Alors ? OpenClassrooms c'était comment ?</h4>
                    </header>

                    <section>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis minus dolorum, laborum consectetur illum, quo atque reiciendis quis neque ab similique quibusdam alias tempora, suscipit mollitia dignissimos laudantium! Ipsa, minus!<br />
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem labore animi, sint veniam qui odit eaque officia est molestiae ipsum culpa fugiat laudantium nemo maxime, pariatur consequuntur sunt praesentium
                            <span class="latest-article-extract-end">... (Go to the blog pour lire la suite)</span>
                        </p>
                    </section>
                </div>

                <footer class="latest-article-date">
                    <time datetime="2020-09-01 11:43">Septembre 2020</time>
                    <p>par Mich'</p>
                </footer>
            </article>

            <!-- Lien d'accès au blog -->
            <a href="#" class="light-link-button">Accéder au blog</a>
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
            <form method="post" action="#">
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
