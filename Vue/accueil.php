<?php


$titre = 'Projet KGB';
ob_start();


?>
<!-- code html qui ira dans la variable $corps -->
<div class="container-fluid violet">
    <div class="row">
        <div class="col-md-11">
            <h1 class="text-center blanc">Bienvenue sur le site du KGB</h1>
        </div>
        <div class="col-md-1"><button type="button" class="btn btn-outline-secondary white">Se connecter</button></div>

    </div>
    <div class="row">
        <h4 class="text-center blanc mod1">
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

                            <a href="detail">Details</a>

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