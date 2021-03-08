
<?php $titre_article='ajoutCommententaire'; ?>

<?php ob_start(); ?>
<!-- Contenu à mettre dans le template -->
    
    
   <!-- AJOUT Formulaire -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Ajouter vos commentaires</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div>
                <form method="post" action="index.php?action=addComments&amp;id_article=<?= getPostComments['id_article']?>">
                    <label for="auteur">Auteur</label><br/>
                    <input type="text" name="auteur"><br/><br/>
                    <label for="commentaire">Commentaire</label><br/>
                    <textarea name="commentaire"></textarea><br/><br/>
                    <input type="submit" name="envoi">
                </form>
            </div>
        </div>
    </section>

    <?php $contenu=ob_get_clean(); ?>
    <?php require('template.php'); ?>















    

       
