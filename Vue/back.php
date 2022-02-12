<?php

$titre = 'Projet KGB';
ob_start();

?>

<!-- Corps html de la page back -->
<div class="container-fluid violet">
    <div class="row w-100">
        <div class="col-md-11">
            <h1 class="text-center blanc">Bienvenue sur le site du KGB cher Admin</h1>
        </div>
        <div class="col-md-1"><button type="button" class="btn btn-outline-secondary white">Se deconnecter</button></div>

    </div>
    <div class="row">
        <h4 class="text-center blanc mod1">
            Vous pouvez consulter et modifier la base de données ci-dessous.
        </h4>
    </div>
</div>



<?php $corps = ob_get_clean(); ?>
<?php require('base.php'); ?>