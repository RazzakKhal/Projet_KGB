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

<form method="post" action="<?= URL ?>back/planquesaa ">
    <label for="adresse" class="form-label fs-4 fw-light">Adresse de la planque</label>
    <input type="text" name="adresse" class="form-control"><br>
    <fieldset>
        <legend>Pays de la Planque</legend>
        <label for="France">France</label>
        <input type="radio" id="France" name="pays" value="France">
        <label for="USA">USA</label>
        <input type="radio" id="USA" name="pays" value="USA">
        <label for="Afghanisthan">Afghanisthan</label>
        <input type="radio" id="Afghanisthan" name="nationnalite" value="Afghanisthan">
        <label for="Espagne">Espagne</label>
        <input type="radio" id="Espagne" name="pays" value="Espagne">
        <label for="Angleterre">Angleterre</label>
        <input type="radio" id="Angleterre" name="pays" value="Angleterre">
        <label for="Turquie">Turquie</label>
        <input type="radio" id="Turquie" name="pays" value="Turquie">
    </fieldset>
    <div class="form-text">Le pays de la planque doit être identique au pays de la mission choisie</div><br>
    <fieldset>
        <legend>Type de la Planque</legend>
        <label for="Maison">Maison</label>
        <input type="radio" id="Maison" name="type" value="Maison">
        <label for="Cabane">Cabane</label>
        <input type="radio" id="Cabane" name="type" value="Cabane">
        <label for="Eglise">Eglise</label>
        <input type="radio" id="Eglise" name="type" value="Eglise">
    </fieldset> <br>
    <label for="mission" class="form-label fs-4 fw-light">Numéro de la mission concernée</label> <!-- numéro doit exister -->
    <input type="number" name="mission" class="form-control">
    <div class="form-text">Il s'agit de l'identifiant de la mission trouvable dans l'accueil</div><br>
    <button type="submit" class="btn btn-info">Soumettre</button>
</form>




<?php $corps = ob_get_clean(); ?>
<?php require('Vue/base.php'); ?>