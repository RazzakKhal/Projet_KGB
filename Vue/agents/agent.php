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
            Code de l'agent
        </th>
        <th>
            Nom
        </th>
        <th>
            Prénom
        </th>
        <th>
            Date de naissance
        </th>
        <th>
            Nationalité
        </th>
        <th>
            Mission affectée
        </th>
        <th>
            Spécialités
        </th>

        <th>

        </th>
        <th>

        </th>
    </thead>
    <!-- boucle pour le tableau -->
    <?php
    for ($i = 0; $i < count($mesagents); $i++) :

    ?>
        <tbody>
            <tr>
                <td>
                    <?= $mesagents[$i]->getCode(); ?>
                </td>
                <td>
                    <?= $mesagents[$i]->getNom(); ?>
                </td>
                <td>
                    <?= $mesagents[$i]->getPrenom(); ?>
                </td>
                <td>
                    <?= date('d M Y', $mesagents[$i]->getDate()); ?>
                </td>
                <td>
                    <?= $mesagents[$i]->getNationalite(); ?>
                </td>
                <td>
                    <?= $mesagents[$i]->getMission(); ?>
                </td>
                <td>
                    <?php foreach ($mesagents[$i]->getSpecialites() as $agents) {
                        foreach ($agents as $agent) {
                            echo $agent . ' / ';
                        }
                    }
                    ?>
                </td>

                <td>
                    <a href="<?= URL ?>back/modagent/<?= $mesagents[$i]->getCode(); ?>"><button class="btn btn-warning">Modifier</button></a>
                </td>
                <td>
                    <form method="post" action="<?= URL ?>back/supagent/<?= $mesagents[$i]->getCode(); ?>">
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