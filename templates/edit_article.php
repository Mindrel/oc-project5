<!-- Vue édition d'un article -->

<?php $this->title = "Administration - Modifier l'article" ?>


<div>
    <?php include("form_article.php") ?>
    
    <div>
        <a href="index.php?route=administration" class="text-link" onclick="return confirm('Revenir au hub ? \nATTENTION : Toute modification sera perdue.')">Retour au hub admin</a> | <a href="index.php" class="text-link" onclick="return confirm('Revenir à l\'accueil ? \nATTENTION : Toute modification sera perdue.')">Retour à l'accueil</a> | <a href="index.php?route=blog" class="text-link" onclick="return confirm('Revenir au blog ? \nATTENTION : Toute modification sera perdue.')">Retour au blog</a>
    </div>
</div>