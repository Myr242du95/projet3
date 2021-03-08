
<?php $titre_article='login'; ?>

<?php ob_start(); ?> 
    
    <!-- Connexion Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Connexion</h2>
                    <hr class="star-primary">
                </div>
            </div>       
        </div>         
    </section>
    <?php             
//nombre de ligne entrée
     $nbre_ligne=$req->rowCount();
        if ($nbre_ligne!= 0) 
        {
    ?>
<h2> Connexion réussie</h2>
    <?php
        }
        else
        {
         header("Location: index.php?action=loginPage&message=1");
        }
       $req->closeCursor();
    ?>

    <?php $contenu=ob_get_clean(); ?>
    <?php require('template.php'); ?>















    

       
