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
            Titre
        </th>
        <th>
            Description
        </th>
        <th>
            Nom de code
        </th>
        <th>
            Pays
        </th>
        <th>
            Type
        </th>
        <th>
            Statut
        </th>
        <th>
            Spécialité requise
        </th>
        <th>
            Date de début
        </th>
        <th>
            Date de fin
        </th>

        <th>

        </th>
        <th>

        </th>
    </thead>
    <!-- boucle pour le tableau -->
    <?php
    for ($i = 0; $i < count($mesmissions); $i++) :

    ?>
        <tbody>
            <tr>
                <td>
                    <?= $mesmissions[$i]->getTitre(); ?>
                </td>
                <td>
                    <?= $mesmissions[$i]->getDescription(); ?>
                </td>
                <td>
                    <?= $mesmissions[$i]->getNomcode(); ?>
                </td>
                <td>
                    <?= $mesmissions[$i]->getPays(); ?>
                </td>
                <td>
                    <?= $mesmissions[$i]->getType(); ?>
                </td>
                <td>
                    <?= $mesmissions[$i]->getStatut(); ?>
                </td>
                <td>
                    <?= $mesmissions[$i]->getSpecialite(); ?>
                </td>
                <td>
                    <?= date('d M Y', $mesmissions[$i]->getDatedebut()); ?>
                </td>
                <td>
                    <?= date('d M Y', $mesmissions[$i]->getDatefin());
                    // s'affiche meme si null 
                    ?>
                </td>

                <td>
                    <a href="<?= URL ?>back/modmission/<?= $mesmissions[$i]->getId(); ?>"><button class="btn btn-warning">Modifier</button></a>
                </td>
                <td>
                    <form method="post" action="<?= URL ?>back/supmission/<?= $mesmissions[$i]->getId(); ?>" onsubmit="return confirm('voulez vous vraiment supprimer cet item ?');">
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                    </form>
                </td>

            </tr>
        </tbody>
    <?php endfor;
    ?>
</table>

<?php
$corps = ob_get_clean();
$titre = 'Projet KGB';
require('Vue/base.php');

?>