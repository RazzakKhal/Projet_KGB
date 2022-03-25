<?php

$titre = 'Projet KGB';
ob_start();

?>

<!-- Corps html de la page back -->
<div class="container-fluid violet">
    <div class="row w-100">
        <div class="col-md-9">
            <h1 class="text-center">Bienvenue sur le site du KGB cher Admin</h1>
        </div>
        <div class="col-md-2"><a href="<?= URL ?>connexion/deconnexion"><button type="button" class="btn btn-outline-secondary">Se Deconnecter</button></a></div>
        <div class="col-md-1"><a href="<?= URL ?>accueil.php"><button type="button" class="btn btn-outline-secondary white">Accueil</button></a></div>
    </div>
    <div class="row">
        <h4 class="text-center">
            Vous pouvez consulter et modifier la base de données ci-dessous.
        </h4>
    </div>
</div>

<div class="container">
    <table class="table">
        <thead>
            <th>
                Table

            </th>
            <th>

            </th>
            <th>

            </th>

        </thead>
        <tbody>
            <tr>
                <td>
                    Missions
                </td>
                <td>
                    <a href="<?= URL ?>back/missions"><button class="btn btn-info">Voir</button></a>
                </td>
                <td>
                    <a href="<?= URL ?>back/missionsa"><button class="btn btn-success">Ajouter</button></a>
                </td>

            </tr>
            <tr>
                <td>
                    Agents
                </td>
                <td>
                    <a href="<?= URL ?>back/agents"><button class="btn btn-info">Voir</button></a>
                </td>
                <td>
                    <a href="<?= URL ?>back/agentsa"><button class="btn btn-success">Ajouter</button></a>
                </td>

            </tr>
            <tr>
                <td>
                    Cibles
                </td>
                <td>
                    <a href="<?= URL ?>back/cibles"><button class="btn btn-info">Voir</button></a>
                </td>
                <td>
                    <a href="<?= URL ?>back/ciblesa"><button class="btn btn-success">Ajouter</button></a>
                </td>

            </tr>
            <tr>
                <td>
                    Planques
                </td>
                <td>
                    <a href="<?= URL ?>back/planques"><button class="btn btn-info">Voir</button></a>
                </td>
                <td>
                    <a href="<?= URL ?>back/planquesa"><button class="btn btn-success">Ajouter</button></a>
                </td>

                </td>
            </tr>
            <tr>
                <td>
                    Contacts
                </td>
                <td>
                    <a href="<?= URL ?>back/contacts"><button class="btn btn-info">Voir</button></a>
                </td>
                <td>
                    <a href="<?= URL ?>back/contactsa"><button class="btn btn-success">Ajouter</button></a>
                </td>

            </tr>
        </tbody>

    </table>

</div>



<?php $corps = ob_get_clean(); ?>
<?php require('base.php'); ?>