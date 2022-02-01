<?php
$titre = 'Projet KGB';
ob_start();
require_once('Modèle/Mission.php');
require_once('Modèle/ManageMission.php');

$m1 = new Mission(1, 'Tuer Kenny', 'Votre mission consistera à tuer Mr Kenny', 'malware', 'France', [1], [1], [1], 'assasinat', 'en cours', ['assassinat'], 123, 1422, []);
$m2 = new Mission(1, 'Surveiller Laden', 'Votre mission consistera à Surveiller Ben Laden', 'malware', 'France', [1], [1], [1], 'assasinat', 'en cours', ['assassinat'], 123, 1422, []);
$m3 = new Mission(1, 'infiltrer maison blanche', 'Votre mission consistera à inflitrer la maison blanche', 'malware', 'France', [1], [1], [1], 'assasinat', 'en cours', ['assassinat'], 123, 1422, []);
$manager = new ManageMission();
$manager->setMission($m1);
$manager->setMission($m2);
$manager->setMission($m3);
$mission = $manager->getMission();
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
                            Details

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