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
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Le blog</a></li>
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


</body>

</html>