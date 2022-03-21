<?php



ob_start();


?>
<!-- code html qui ira dans la variable $corps -->
<div class="container-fluid violet">
    <div class="row w-100">
        <div class="col-md-11">
            <h1 class="text-center">Bienvenue sur le site du KGB</h1>
        </div>
        <div class="col-md-1"><a href="<?= URL ?>connexion/deconnexion"><button type="button" class="btn btn-outline-secondary">Se Deconnecter</button></a></div>

    </div>
    <div class="row w-100">
        <h4 class="text-center">
            Vous pouvez consulter les missions et leurs details juste en dessous.
        </h4>
    </div>
</div>


<table class="table">
    <thead>
        <th>
            Nom
        </th>
        <th>
            Prenom
        </th>
        <th>
            Date de naissance
        </th>
        <th>
            Nom de code
        </th>
        <th>
            Nationalité
        </th>
        <th>
            Mission concernée
        </th>

        <th>

        </th>
        <th>

        </th>

    </thead>
    <!-- boucle pour le tableau -->
    <?php
    for ($i = 0; $i < count($mescontacts); $i++) :

    ?>
        <tbody>
            <tr>
                <td>
                    <?= $mescontacts[$i]->getNom(); ?>
                </td>
                <td>
                    <?= $mescontacts[$i]->getPrenom(); ?>
                </td>
                <td>
                    <?= date('d M Y', $mescontacts[$i]->getDate()); ?>
                </td>
                <td>
                    <?= $mescontacts[$i]->getNomcode(); ?>
                </td>
                <td>
                    <?= $mescontacts[$i]->getNationalite(); ?>
                </td>
                <td>
                    <?= $mescontacts[$i]->getMission(); ?>
                </td>
                <td>
                    <a href="<?= URL ?>back/modcontact/<?= $mescontacts[$i]->getId(); ?>"><button class="btn btn-warning">Modifier</button></a>
                </td>
                <td>
                    <form method="post" action="<?= URL ?>back/supcontact/<?= $mescontacts[$i]->getId(); ?>">
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                    </form>
                </td>

            </tr>
        </tbody>
    <?php
    endfor;

    ?>
</table>

<?php
$corps = ob_get_clean();
$titre = 'Projet KGB';
require('Vue/base.php');

?>