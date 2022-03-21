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
<form method="post" action="<?= URL ?>back/missionsaa ">
    <label for="titre" class="form-label fs-4 fw-light">Titre de la mission</label>
    <input type="text" name="titre" class="form-control"><br>
    <label for="description" class="form-label fs-4 fw-light">Description de la mission</label>
    <input type="text" name="description" class="form-control"><br>
    <label for="nomcode" class="form-label fs-4 fw-light">Nom de code de la mission</label>
    <input type="text" name="nomcode" class="form-control"><br>
    <label for="pays" class="form-label fs-4 fw-light">Pays de la mission</label>
    <input type="text" name="pays" class="form-control"><br>
    <label for="type" class="form-label fs-4 fw-light">Type de mission</label>
    <input type="text" name="type" class="form-control"><br>
    <label for="statut" class="form-label fs-4 fw-light">Statut de la mission</label>
    <input type="text" name="statut" class="form-control"><br>
    <label for="datedebut" class="form-label fs-4 fw-light">Date de début</label>
    <input type="text" name="datedebut" class="form-control"><br>
    <label for="datefin" class="form-label fs-4 fw-light">Date de fin</label>
    <input type="text" name="datefin" class="form-control"><br>
    <label for="specialite" class="form-label fs-4 fw-light">Specialité requise</label>
    <input type="text" name="specialite" class="form-control"><br>
    <button type="submit" class="btn btn-info">Soumettre</button>
</form>




<?php $corps = ob_get_clean(); ?>
<?php require('Vue/base.php'); ?>