<!DOCTYPE html>

<!-- Template de base -->

<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Le portfolio d'un Développeur Web Junior perdu dans les méandres de la complexité du code... Le blog est mis à jour régulièrement, alors à très vite !" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <script src="https://kit.fontawesome.com/bb97965415.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Open+Sans&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="public/css/main.css" />
    <link rel="stylesheet" href="public/css/header.css" />
    <link rel="stylesheet" href="public/css/footer" />
    <link rel="stylesheet" href="public/css/section1hero.css" />
    <link rel="stylesheet" href="public/css/section2hello.css" />
    <link rel="stylesheet" href="public/css/section3projects.css" />
    <link rel="stylesheet" href="public/css/section4latest.css" />
    <link rel="stylesheet" href="public/css/section5contact.css" />
    <link rel="stylesheet" href="public/css/page-loginregister.css" />
    <link rel="stylesheet" href="public/css/page-blog.css" />
    <title><?= $title ?></title>
</head>

<body>
    <header class="main-header">
        <div class="container header-container">
            <!-- Logo -->
            <div class="header-logo">
                <div class="header-logo-left-brace">
                    <a href="index.php"> { </a>
                </div>

                <div class="header-logo-text">
                    <p><strong><a href="index.php">Michel Martin</a></strong></p>
                    <p><a href="index.php"><strong><span class="header-logo-text-spe">Junior</span> Web Developer</strong></a></p>
                </div>

                <div class="header-logo-right-brace">
                    <a href="index.php"> } </a>
                </div>
            </div>

            <!-- Main menu -->
            <nav>
                <ul>
                    <li><a href="index.php#hello" class="main-nav-link">Hello :)</a></li>
                    <li><a href="index.php#projects" class="main-nav-link">Projets</a></li>
                    <li><a href="index.php#latest-article" class="main-nav-link">Article</a></li>
                    <li><a href="index.php#contact" class="main-nav-link">Contact</a></li>
                    <li><a href="index.php?route=blog" class="blog-button">Le Blog</a></li>
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
                        <li><a href="index.php">Accueil portfolio</a></li>
                        <li><a href="index.php#hello">Hello !</a></li>
                        <li><a href="index.php#projects">Mes projets</a></li>
                        <li><a href="index.php#latest-article">Dernier article</a></li>
                        <li><a href="index.php#contact">Contactez-moi</a></li>
                    </ul>

                    <ul>
                        <li><a href="#">Tous les projets</a></li>
                        <li><a href="index.php?route=blog">Accueil blog</a></li>

                        <?php
                        // Menu dynamique de connexion

                        if ($this->session->get("nickname")) : // Si connecté
                        ?>

                            <li><a href="index.php?route=logout">Déconnexion</a></li>
                            <li><a href="index.php?route=profile">Profil</a></li>

                            <?php
                            if ($this->session->get("role") === "admin") : // N'apparaît que si user admin
                            ?>
                                <li><a href="index.php?route=administration">Administration</a></li>
                            <?php
                            endif;
                            ?>

                        <?php
                        else : // Sinon pas connecté
                        ?>

                            <li><a href="index.php?route=register">Inscription</a></li>
                            <li><a href="index.php?route=login">Connexion</a></li>

                        <?php
                        endif;
                        ?>

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
                    Les sources d'inspiration sont nombreuses, mais la majeure partie du template a été créée à partir du thème Freelancer de <a href="https://startbootstrap.com/themes/freelancer/" rel="nofollow" title="Nouvel onglet vers StartBootstrap" class="dotted-white-link" target="_blank">StartBootstrap</a> que je remercie.
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