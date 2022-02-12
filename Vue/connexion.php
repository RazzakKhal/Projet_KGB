<?php

$titre = 'Projet KGB';
ob_start();

?>

<!-- Corps html de la page detail -->
<div class="container-fluid violet">
    <div class="row w-100">
        <div class="col-md-11">
            <h1 class="text-center blanc">Bienvenue sur le site du KGB</h1>
        </div>
        <div class="col-md-1"><a href="<?= URL ?>accueil.php"><button type="button" class="btn btn-outline-secondary white">Accueil</button></a></div>

    </div>
    <div class="row">
        <h4 class="text-center blanc mod1">
            Vous pouvez vous connecter au panel d'administration en utilisant le formulaire ci-dessous.
        </h4>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="Modèle/traitement.php" class="form-inline text-center">

                <legend class="border-bottom mt-2">Formulaire de connexion</legend>

                <label for="mail">Identifiant</label>
                <input type="mail" id="mail" name="mail">
                <label for="pass">Mot de passe</label>
                <input type="password" id="pass" name="pass">
                <button type="submit" class="btn btn-info">Se connecter</button>

            </form>
        </div>
    </div>
</div>




<?php $corps = ob_get_clean(); ?>
<?php require('base.php'); ?>