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
<form method="post" action="<?= URL ?>back/modagentv/<?= $agent->getCode() ?>">
    <label for="nom" class="form-label fs-4 fw-light">Nom de l'agent</label>
    <input type="text" name="nom" class="form-control" value="<?= $agent->getNom() ?>"><br>
    <label for="prenom" class="form-label fs-4 fw-light">Prénom de l'agent</label>
    <input type="text" name="prenom" class="form-control" value="<?= $agent->getPrenom() ?>"><br>
    <label for="date" class="form-label fs-4 fw-light">Date de naissance de l'agent</label>
    <input type="date" name="date" class="form-control"><br>
    <fieldset>
        <legend>Nationalité de l'agent</legend>
        <label for="Française">Française</label>
        <input type="radio" id="Française" name="nationalite" value="France">
        <label for="Américaine">Américaine</label>
        <input type="radio" id="Américaine" name="nationalite" value="USA">
        <label for="Afghane">Afghane</label>
        <input type="radio" id="Afghane" name="nationalite" value="Afghanisthan">
        <label for="Espagnole">Espagnole</label>
        <input type="radio" id="Espagnole" name="nationalite" value="Espagne">
        <label for="Anglaise">Anglaise</label>
        <input type="radio" id="Anglaise" name="nationalite" value="Angleterre">
        <label for="Turque">Turque</label>
        <input type="radio" id="Turque" name="nationalite" value="Turquie">
    </fieldset>
    <div class="form-text">La nationalité de l'agent doit être différente de celle des cibles sur la mission choisie</div><br>
    <label for="mission" class="form-label fs-4 fw-light">Numéro de la mission concernée</label> <!-- numéro doit exister -->
    <input type="number" name="mission" class="form-control" value="<?= $agent->getMission() ?>">
    <div class="form-text">Il s'agit de l'identifiant de la mission trouvable dans l'accueil</div><br>
    <fieldset>
        <legend>Spécialité(s) de l'agent</legend>
        <label for="assassinat">Assassinat</label>
        <input type="checkbox" id="assassinat" name="specialite[]" value="assassinat">
        <label for="surveillance">Surveillance</label>
        <input type="checkbox" id="surveillance" name="specialite[]" value="surveillance">
        <label for="infiltration">Infiltration</label>
        <input type="checkbox" id="infiltration" name="specialite[]" value="infiltration">
    </fieldset>
    <br>
    <button type="submit" class="btn btn-info">Soumettre</button>
</form>



<?php $corps = ob_get_clean(); ?>
<?php require('Vue/base.php'); ?>