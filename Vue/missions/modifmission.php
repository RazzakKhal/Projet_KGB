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
<form method="post" action="<?= URL ?>back/modmissionv/<?= $mission->getId() ?>">
    <label for="titre" class="form-label fs-4 fw-light">Titre de la mission</label>
    <input type="text" name="titre" class="form-control" value="<?= $mission->getTitre() ?>"><br>
    <label for="description" class="form-label fs-4 fw-light">Description de la mission</label>
    <input type="text" name="description" class="form-control" value="<?= $mission->getDescription() ?>"><br>
    <label for="nomcode" class="form-label fs-4 fw-light">Nom de code de la mission</label>
    <input type="text" name="nomcode" class="form-control" value="<?= $mission->getNomcode() ?>"><br>
    <fieldset>
        <legend>Pays de la Mission</legend>
        <label for="France">France</label>
        <input type="radio" id="France" name="pays" value="France">
        <label for="USA">USA</label>
        <input type="radio" id="USA" name="pays" value="USA">
        <label for="Afghanisthan">Afghanisthan</label>
        <input type="radio" id="Afghanisthan" name="pays" value="Afghanisthan">
        <label for="Espagne">Espagne</label>
        <input type="radio" id="Espagne" name="pays" value="Espagne">
        <label for="Angleterre">Angleterre</label>
        <input type="radio" id="Angleterre" name="pays" value="Angleterre">
        <label for="Turquie">Turquie</label>
        <input type="radio" id="Turquie" name="pays" value="Turquie">
    </fieldset> <br>
    <fieldset>
        <legend>Type de la Mission</legend>
        <label for="Assassinat">Assassinat</label>
        <input type="radio" id="Assassinat" name="type" value="Assassinat">
        <label for="Surveillance">Surveillance</label>
        <input type="radio" id="Surveillance" name="type" value="Surveillance">
        <label for="Infiltration">Infiltration</label>
        <input type="radio" id="Infiltration" name="type" value="Infiltration">
    </fieldset> <br>
    <label for="statut" class="form-label fs-4 fw-light">Statut de la mission</label>
    <input type="text" name="statut" class="form-control" value="<?= $mission->getStatut() ?>"><br>
    <label for="datedebut" class="form-label fs-4 fw-light">Date de début</label>
    <input type="date" name="datedebut" class="form-control"><br>
    <label for="datefin" class="form-label fs-4 fw-light">Date de fin</label>
    <input type="date" name="datefin" class="form-control"><br>
    <fieldset>
        <legend>Spécialité Requise</legend>
        <label for="Assassinat">Assassinat</label>
        <input type="radio" id="Assassinat" name="specialite" value="Assassinat">
        <label for="Surveillance">Surveillance</label>
        <input type="radio" id="Surveillance" name="specialite" value="Surveillance">
        <label for="Infiltration">Infiltration</label>
        <input type="radio" id="Infiltration" name="specialite" value="Infiltration">
    </fieldset> <br>
    <button type="submit" class="btn btn-info">Soumettre</button>
</form>




<?php $corps = ob_get_clean(); ?>
<?php require('Vue/base.php'); ?>