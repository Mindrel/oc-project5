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
    <link rel="stylesheet" href="../public/css/section4latest.css" />
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
                    <li><a href="../public/index.php#hello" class="main-nav-link">Hello :)</a></li>
                    <li><a href="../public/index.php#projects" class="main-nav-link">Projets</a></li>
                    <li><a href="../public/index.php#latest-article" class="main-nav-link">Article</a></li>
                    <li><a href="../public/index.php#contact" class="main-nav-link">Contact</a></li>
                    <li><a href="#" class="blog-button">Le Blog</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <?= $content ?>

    <footer class="main-footer">
        <div class="container footer-container">
            <!-- Sitemap -->
            <div class="footer-part">
                <h4>Plan du site</h4>

                <div class="footer-part-divided">
                    <ul>
                        <li><a href="../public/index.php">Accueil portfolio</a></li>
                        <li><a href="../public/index.php#hello">Hello !</a></li>
                        <li><a href="../public/index.php#projects">Mes projets</a></li>
                        <li><a href="../public/index.php#latest-article">Dernier article</a></li>
                        <li><a href="../public/index.php#contact">Contactez-moi</a></li>
                    </ul>

                    <ul>
                        <li><a href="#">Accueil blog</a></li>
                        <li><a href="#">Inscription</a></li>
                        <li><a href="#">Connexion</a></li>
                    </ul>
                </div>
            </div>

            <!-- Social -->
            <div class="footer-part">
                <h4>Sur le web</h4>

                <p><a href="https://www.linkedin.com/in/michel-martin-dwj/" class="social"><i class="fab fa-linkedin-in"></i></a></p>
            </div>

            <!-- Crédits -->
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