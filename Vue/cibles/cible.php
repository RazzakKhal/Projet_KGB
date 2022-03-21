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
    for ($i = 0; $i < count($mescibles); $i++) :

    ?>
        <tbody>
            <tr>
                <td>
                    <?= $mescibles[$i]->getNom(); ?>
                </td>
                <td>
                    <?= $mescibles[$i]->getPrenom(); ?>
                </td>
                <td>
                    <?= date('d M Y', $mescibles[$i]->getDate()); ?>
                </td>
                <td>
                    <?= $mescibles[$i]->getNomcode(); ?>
                </td>
                <td>
                    <?= $mescibles[$i]->getNationalite(); ?>
                </td>
                <td>
                    <?= $mescibles[$i]->getMission(); ?>
                </td>
                <td>
                    <a href="<?= URL ?>back/modcible/<?= $mescibles[$i]->getId(); ?>"><button class="btn btn-warning">Modifier</button></a>
                </td>
                <td>
                    <form method="post" action="<?= URL ?>back/supcible/<?= $mescibles[$i]->getId(); ?>" onsubmit="return confirm('voulez vous vraiment supprimer cet item ?');">
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