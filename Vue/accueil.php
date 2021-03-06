<?php



ob_start();


?>
<!-- code html qui ira dans la variable $corps -->
<div class="container-fluid violet">
    <div class="row w-100">
        <div class="col-md-10">
            <h1 class="text-center">Bienvenue sur le site du KGB</h1>
        </div>
        <div class="col-md-2"><a href="<?= URL ?>connexion"><button type="button" class="btn btn-outline-secondary">Connexion/ Back-Office</button></a></div>

    </div>
    <div class="row w-100">
        <h4 class="text-center">
            Vous pouvez consulter les missions et leurs details juste en dessous.
        </h4>
    </div>
</div>

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>
                    Identifiant de la Mission
                </th>
                <th>
                    Mission
                </th>
                <th>
                    Description
                </th>
                <th>
                    Details
                </th>

            </tr>

        </thead>
        <?php
        for ($i = 0; $i < count($mission); $i++) :

        ?><tbody>
                <tr>
                    <td>
                        <?= $mission[$i]->getId(); ?>
                    </td>
                    <td>
                        <?= $mission[$i]->getTitre(); ?>
                    </td>
                    <td>
                        <?= $mission[$i]->getDescription(); ?>
                    </td>
                    <td>

                        <button class="btn btn-info">

                            <a href="<?= URL ?>detail/<?= $mission[$i]->getId(); ?>">Details</a>

                        </button>
                    </td>


                </tr>


            </tbody>
        <?php endfor;
        ?>

    </table>
</div>

<?php
$corps = ob_get_clean();
$titre = 'Projet KGB';
require('base.php');

?>