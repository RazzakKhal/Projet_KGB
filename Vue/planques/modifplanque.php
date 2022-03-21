<?php

$titre = 'Projet KGB';
ob_start();

?>

<!-- Corps html de la page back -->
<div class="container-fluid violet">
    <div class="row w-100">
        <div class="col-md-11">
            <h1 class="text-center">Bienvenue sur le site du KGB cher Admin</h1>
        </div>
        <div class="col-md-1"><a href="<?= URL ?>connexion/deconnexion"><button type="button" class="btn btn-outline-secondary">Se Deconnecter</button></a></div>

    </div>
    <div class="row">
        <h4 class="text-center">
            Vous pouvez consulter et modifier la base de données ci-dessous.
        </h4>
    </div>
</div>

<form method="post" action="<?= URL ?>back/modplanquev/<?= $planque->getCode() ?> ">
    <label for="adresse" class="form-label fs-4 fw-light">Adresse de la planque</label>
    <input type="text" name="adresse" class="form-control" value="<?= $planque->getAdresse() ?>"><br>
    <label for="pays" class="form-label fs-4 fw-light">Pays de la planque</label> <!-- pays planque = pays mission -->
    <input type="text" name="pays" class="form-control" value="<?= $planque->getPays() ?>"><br>
    <label for="type" class="form-label fs-4 fw-light">Type de planque</label>
    <input type="text" name="type" class="form-control" value="<?= $planque->getType() ?>"><br>
    <label for="mission" class="form-label fs-4 fw-light">Numéro de la mission concernée</label> <!-- numéro doit exister -->
    <input type="number" name="mission" class="form-control" value="<?= $planque->getMission() ?>"><br>
    <button type="submit" class="btn btn-info">Soumettre</button>
</form>




<?php $corps = ob_get_clean(); ?>
<?php require('Vue/base.php'); ?>