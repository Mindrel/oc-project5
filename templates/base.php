<!DOCTYPE html>

<!-- Template de base -->

<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Le portfolio d'un Développeur Web Junior perdu dans les méandres de la complexité du code... Le blog est mis à jour régulièrement, alors à très vite !" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <script src="https://kit.fontawesome.com/bb97965415.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Open+Sans&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../public/css/main.css" />
    <link rel="stylesheet" href="../public/css/header.css" />
    <link rel="stylesheet" href="../public/css/section1hero.css" />
    <link rel="stylesheet" href="../public/css/section2hello.css" />
    <link rel="stylesheet" href="../public/css/section3projects.css" />
    <link rel="stylesheet" href="../public/css/section4blog.css" />
    <link rel="stylesheet" href="../public/css/section5contact.css" />
    <link rel="stylesheet" href="../public/css/footer" />
    <title><?= $title ?></title>
</head>

<body>
    <header class="main-header">
        <div class="container header-container">
            <!-- Logo -->
            <div class="header-logo">
                <div class="header-logo-left-brace">
                    {
                </div>

                <div class="header-logo-text">
                    <p><strong>Michel Martin</strong></p>
                    <p><strong><span class="header-logo-text-spe">Junior</span> Web Developer</strong></p>
                </div>

                <div class="header-logo-right-brace">
                    }
                </div>
            </div>

            <!-- Main menu -->
            <nav>
                <ul>
                    <li><a href="../public/index.php#hello">Hello :)</a></li>
                    <li><a href="../public/index.php#projects">Projets</a></li>
                    <li><a href="../public/index.php#latest-article">Le blog</a></li>
                    <li><a href="../public/index.php#contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Section 1 : Hero -->
    <section id="hero">
        <div class="container hero-container">
            <img src="../public/img/avatar.svg" alt="avatar" class="hero-avatar" />

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
                        <img src="../public/img/1.jpg" alt="projet" />
                        <figcaption>
                            <i class="fas fa-search-plus"></i>
                        </figcaption>
                    </figure>
                </li>

                <li>
                    <figure>
                        <img src="../public/img/2.jpg" alt="projet" />
                        <figcaption>
                            <i class="fas fa-search-plus"></i>
                        </figcaption>
                    </figure>
                </li>

                <li>
                    <figure>
                        <img src="../public/img/3.jpg" alt="projet" />
                        <figcaption>
                            <i class="fas fa-search-plus"></i>
                        </figcaption>
                    </figure>
                </li>

                <li>
                    <figure>
                        <img src="../public/img/4.jpg" alt="projet" />
                        <figcaption>
                            <i class="fas fa-search-plus"></i>
                        </figcaption>
                    </figure>
                </li>

                <li>
                    <figure>
                        <img src="../public/img/5.jpg" alt="projet" />
                        <figcaption>
                            <i class="fas fa-search-plus"></i>
                        </figcaption>
                    </figure>
                </li>

                <li>
                    <figure>
                        <img src="../public/img/soon.jpg" alt="futur projet" />
                        <figcaption>
                            <p>Prochainement...</p>
                        </figcaption>
                    </figure>
                </li>
            </ul>
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

    <footer class="main-footer">
        <div class="container footer-container">
            <div class="footer-part">
                <h4>Plan du site</h4>

                <ul>
                    <li><a href="../public/index.php">Page d'accueil</a></li>
                    <li><a href="../public/index.php#hello">Hello ! (présentation)</a></li>
                    <li><a href="../public/index.php#projects">Mes projets</a></li>
                    <li><a href="../public/index.php#latest-article">Article du blog</a></li>
                    <li><a href="../public/index.php#contact">Contactez-moi</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Connexion</a></li>
                </ul>
            </div>

            <div class="footer-part">
                <h4>Sur le web</h4>

                <p><a href="#" class="social"><i class="fab fa-linkedin-in"></i></a></p>
            </div>

            <div class="footer-part">
                <h4>Sources</h4>

                <p>
                    Design fait main sans framework.<br />
                    Les sources d'inspiration sont nombreuses, mais la majeure partie du template a été créée à partir du thème Freelancer de <a href="https://startbootstrap.com/themes/freelancer/" title="Nouvel onglet vers StartBootstrap" class="dotted-white-link" target="_blank">StartBootstrap</a> que je remercie.
                </p>
            </div>
        </div>

        <!-- Barre copyright -->
        <div class="footer-copyright">
            <p class="container"><span class="footer-logo-left-brace"> { </span><span class="footer-logo-text-spe">Copyright © 2020</span> Portfolio & Blog de Michel Martin<span class="footer-logo-right-brace"> } </span></p>
        </div>
    </footer>

</body>

</html>