<?php


$titre = 'Projet KGB';
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

<div class="container">
    <table class="table">
        <thead>
            <tr>
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

<?php $corps = ob_get_clean(); ?>
<?php require('base.php'); ?>