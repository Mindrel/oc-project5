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
    <link rel="stylesheet" href="../public/css/footer" />
    <title><?= $title ?></title>
</head>

<body>
    <header>
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
                    <li><a href="../public/index.php">Hello :)</a></li>
                    <li><a href="#">Projets</a></li>
                    <li><a href="#">Le blog</a></li>
                    <li><a href="#">Contact</a></li>
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
                        <img src="../public/img/1.jpg" />
                        <figcaption>
                            <i class="fas fa-search-plus"></i>
                        </figcaption>
                    </figure>
                </li>

                <li>
                    <figure>
                        <img src="../public/img/2.jpg" />
                        <figcaption>
                            <i class="fas fa-search-plus"></i>
                        </figcaption>
                    </figure>
                </li>

                <li>
                    <figure>
                        <img src="../public/img/3.jpg" />
                        <figcaption>
                            <i class="fas fa-search-plus"></i>
                        </figcaption>
                    </figure>
                </li>

                <li>
                    <figure>
                        <img src="../public/img/4.jpg" />
                        <figcaption>
                            <i class="fas fa-search-plus"></i>
                        </figcaption>
                    </figure>
                </li>

                <li>
                    <figure>
                        <img src="../public/img/5.jpg" />
                        <figcaption>
                            <i class="fas fa-search-plus"></i>
                        </figcaption>
                    </figure>
                </li>

                <li>
                    <figure>
                        <img src="../public/img/soon.jpg" />
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

            <article>
                <header>
                    <h4></h4>
                </header>
                
                <section>

                </section>
                
                <footer>

                </footer>
            </article>

            <a href="#">Accéder au blog</a>
        </div>
    </section>

    <!-- Section 5 : Contact -->
    <section id="contact" class="colored-section">
        <div class="container contact-section-container">
            <h3>Contactez-moi</h3>

            <!-- Séparateur blanc -->
            <div class="white-divider">
                <div class="white-divider-line"></div>
                <div class="white-divider-icon"><i class="fas fa-code"></i></div>
                <div class="white-divider-line"></div>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer-container">
            <div>
                <h4>Titre</h4>

                <p>bla bla bla</p>
            </div>

            <div>
                <h4>Titre</h4>

                <p>bla bla bla</p>
            </div>

            <div>
                <h4>Titre</h4>

                <p>bla bla bla</p>
            </div>
        </div>
        
        <div class="footer-copyright">
            <p><span> { </span>Copyright © 2020 Portfolio & Blog de Michel Martin<span> } </span></p>
        </div>
    </footer>

</body>

</html>