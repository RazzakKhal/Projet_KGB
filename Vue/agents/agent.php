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
    <tbody>
        <tr>
            <td>

            </td>
            <td>

            </td>
            <td>

            </td>
            <td>

            </td>
            <td>

            </td>
            <td>

            </td>
            <td>

            </td>

            <td>
                <button class="btn btn-warning">Modifier</button>
            </td>
            <td>
                <button class="btn btn-danger">Supprimer</button>
            </td>

        </tr>
    </tbody>
</table>

<?php
$corps = ob_get_clean();
$titre = 'Projet KGB';
require('Vue/base.php');

?>