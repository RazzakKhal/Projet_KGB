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
<form method="post" action="<?= URL ?>back/ciblesaa ">
    <label for="nom" class="form-label fs-4 fw-light">Nom de la cible</label>
    <input type="text" name="nom" class="form-control"><br>
    <label for="prenom" class="form-label fs-4 fw-light">Prénom de la cible</label>
    <input type="text" name="prenom" class="form-control"><br>
    <label for="date" class="form-label fs-4 fw-light">Date de naissance de la cible</label>
    <input type="text" name="date" class="form-control"><br>
    <label for="nomcode" class="form-label fs-4 fw-light">Nom de code de la cible</label>
    <input type="text" name="nomcode" class="form-control"><br>
    <label for="nationalite" class="form-label fs-4 fw-light">Nationalité de la cible</label>
    <input type="text" name="nationalite" class="form-control"><br>
    <label for="number" class="form-label fs-4 fw-light">Numéro de la mission concernée</label> <!-- numéro doit exister -->
    <input type="number" name="mission" class="form-control"><br>
    <button type="submit" class="btn btn-info">Soumettre</button>
</form>



<?php $corps = ob_get_clean(); ?>
<?php require('Vue/base.php'); ?>