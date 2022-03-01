<?php



ob_start();


?>
<!-- code html qui ira dans la variable $corps -->
<div class="container-fluid violet">
    <div class="row w-100">
        <div class="col-md-11">
            <h1 class="text-center">Bienvenue sur le site du KGB</h1>
        </div>
        <div class="col-md-1"><a href="<?= URL ?>connexion"><button type="button" class="btn btn-outline-secondary">Se connecter</button></a></div>

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
                    <button class="btn btn-warning">Modifier</button>
                </td>
                <td>
                    <button class="btn btn-danger">Supprimer</button>
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