
<?php $titre_article='loginPage'; ?>

<?php ob_start(); ?> 

    <!-- Connexion Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Inscription</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <form method="post" action="index.php?action=signUp">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <form name="sentMessage" id="contactForm" novalidate>
                            <div class="row control-group">
                            	<div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label for="nom">Nom</label>
                                    <input type="text" class="form-control" name="nom" placeholder="nom" id="nom" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label for="pseudo">Pseudo</label>
                                    <input type="text" class="form-control" name="pseudo" placeholder="pseudo" id="pseudo" required data-validation-required-message="Please enter your pseudo.">
                                    <p class="help-block text-danger"></p>
                                </div>                               
                            </div>
                            <div class="row control-group">
                            	<div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label for="email">Mail</label>
                                    <input type="email" class="form-control" name="email" placeholder="email" id="email" required data-validation-required-message="Please enter your email.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label for="mdp">Mot de passe</label>
                                    <input type="password" class="form-control" name="mdp" placeholder="mdp" id="mdp" required data-validation-required-message="Please enter your password.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label for="mdpC">Confirmez votre mot de passe</label>
                                    <input type="password" class="form-control" name="mdpC" placeholder="mdpC" id="mdpC" required data-validation-required-message="Please enter your password.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <br>
                            <div id="success"></div>
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <button type="submit" class="btn btn-success btn-lg">Send</button>
                                </div>
                            </div>
                        </form>
                        <?php
                            if (isset($_GET['message']) AND $_GET['message']=1) 
                            {
                                echo "<span style='color:#ff0000'>Login incorrect </span>";
                            }
                        ?>
                    </div>
                </div>
            </form>            
        </div>
    </section>

    <?php $contenu=ob_get_clean(); ?>
    <?php require('template.php'); ?>















    

       
