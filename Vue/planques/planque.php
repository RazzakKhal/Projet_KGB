<?php



ob_start();


?>
<!-- code html qui ira dans la variable $corps -->
<div class="container-fluid violet">
    <div class="row w-100">
        <div class="col-md-9">
            <h1 class="text-center">Bienvenue sur le site du KGB</h1>
        </div>
        <div class="col-md-2"><a href="<?= URL ?>connexion/deconnexion"><button type="button" class="btn btn-outline-secondary">Se Deconnecter</button></a></div>
        <div class="col-md-1"><a href="<?= URL ?>accueil.php"><button type="button" class="btn btn-outline-secondary white">Accueil</button></a></div>
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
            Code de la planque
        </th>
        <th>
            Adresse de la planque
        </th>
        <th>
            Pays de la planque
        </th>
        <th>
            Type de planque
        </th>
        <th>
            Missions concernées
        </th>

        <th>

        </th>
        <th>

        </th>
    </thead>
    <!-- boucle pour le tableau -->
    <?php
    for ($i = 0; $i < count($mesplanques); $i++) :

    ?>
        <tbody>
            <tr>
                <td>
                    <?= $mesplanques[$i]->getCode(); ?>
                </td>
                <td>
                    <?= $mesplanques[$i]->getAdresse(); ?>
                </td>
                <td>
                    <?= $mesplanques[$i]->getPays(); ?>
                </td>
                <td>
                    <?= $mesplanques[$i]->getType(); ?>
                </td>
                <td>
                    <?= $mesplanques[$i]->getMission(); ?>
                </td>

                <td>
                    <a href="<?= URL ?>back/modplanque/<?= $mesplanques[$i]->getCode(); ?>"><button class="btn btn-warning">Modifier</button></a>
                </td>
                <td>
                    <form method="post" action="<?= URL ?>back/supplanque/<?= $mesplanques[$i]->getCode(); ?>">
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