
<?php $titre_article='pub'; ?>

<?php ob_start(); ?>
<!-- Contenu à mettre dans le template -->
   <!-- Publication -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Publication</h2>
                    <hr class="star-primary">
                </div>
            </div>

            <?php
               while ($data= $req->fetch())
                {
            ?>
                 <div class="col-sm-4 portfolio-item">
                    <h3>
                        <strong>  <?= htmlspecialchars($data['titre_article'])?> 
                        </strong><br/> 
                    </h3>
                    <h5>
                        <em><?= $data['date_article_fr'] ?></em>
                    </h5>                   
                    <p>
                       <?php  echo '<em>'.nl2br(htmlspecialchars($data['chapo']) ).'</em>'.'<br/>'; ?>
                    </p>
                    <a href="index.php?action=getPostComments&amp;id_article=<?= $data['id_article']; ?>" class="portfolio-link" data-toggle="modal"> 
                        <em>Commentaires</em>
                    </a>
                </div>  
            <?php
                }
                    $req->closeCursor();
            ?> 
        </div>
    </section>

    <?php $contenu=ob_get_clean(); ?>
    <?php require('template.php'); ?>















    

       
