<!-- Vue ajout d'un projet -->

<?php $this->title = "Administration - Nouveau projet" ?>

<section id="admin">
    <!-- Hero secondaire -->
    <div id="hero" class="hero-container-secondary">
        <h1>Administration</h1>

        <div class="white-divider">
            <div class="white-divider-line"></div>
            <div class="white-divider-icon"><i class="fas fa-code"></i></div>
            <div class="white-divider-line"></div>
        </div>
    </div>

    <div class="container admin-section-container">
        <h3>Ajout d'un projet</h3>
        
        <?php include("form_project.php") ?>

        <div>
            <a href="index.php?route=administration" class="text-link" onclick="return confirm('Revenir au hub ? \nATTENTION : Toute modification sera perdue.')">Retour au hub admin</a> | <a href="index.php" class="text-link" onclick="return confirm('Revenir à l\'accueil ? \nATTENTION : Toute modification sera perdue.')">Retour à l'accueil</a> | <a href="index.php?route=blog" class="text-link" onclick="return confirm('Revenir au blog ? \nATTENTION : Toute modification sera perdue.')">Retour au blog</a>
        </div>
    </div>
</section>