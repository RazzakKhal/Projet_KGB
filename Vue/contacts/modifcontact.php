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
<form method="post" action="<?= URL ?>back/modcontactv/<?= $contact->getId() ?> ">
    <label for="nom" class="form-label fs-4 fw-light">Nom du contact</label>
    <input type="text" name="nom" class="form-control" value="<?= $contact->getNom() ?>"><br>
    <label for="prenom" class="form-label fs-4 fw-light">Prénom du contact</label>
    <input type="text" name="prenom" class="form-control" value="<?= $contact->getPrenom() ?>"><br>
    <label for="date" class="form-label fs-4 fw-light">Date de naissance du contact</label>
    <input type="text" name="date" class="form-control" value="<?= $contact->getDate() ?>"><br>
    <label for="nomcode" class="form-label fs-4 fw-light">Nom de code du contact</label>
    <input type="text" name="nomcode" class="form-control" value="<?= $contact->getNomcode() ?>"><br>
    <label for="nationalite" class="form-label fs-4 fw-light">Nationalité du contact</label>
    <input type="text" name="nationalite" class="form-control" value="<?= $contact->getNationalite() ?>"><br>
    <label for="number" class="form-label fs-4 fw-light">Numéro de la mission concernée</label> <!-- numéro doit exister -->
    <input type="number" name="mission" class="form-control" value="<?= $contact->getMission() ?>"><br>
    <button type="submit" class="btn btn-info">Soumettre</button>
</form>





<?php $corps = ob_get_clean(); ?>
<?php require('Vue/base.php'); ?>