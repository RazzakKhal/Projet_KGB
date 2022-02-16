<?php

ob_start();

?>

<!-- Corps html de la page detail -->
<div class="container-fluid violet">
    <div class="row">
        <div class="col-md-10">
            <h1 class="text-center">Bienvenue sur le site du KGB</h1>
        </div>
        <div class="col-md-1"><a href="<?= URL ?>connexion"><button type="button" class="btn btn-outline-secondary">Connexion</button></a></div>
        <div class="col-md-1"><a href="<?= URL ?>accueil"><button type="button" class="btn btn-outline-secondary">Accueil</button></a></div>
    </div>
    <div class="row">
        <h4 class="text-center col-md-10">
            Vous pouvez consulter les details de votre mission ci-dessous.
        </h4>
    </div>
</div>

<div class="container">
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
                Codes Agents
            </th>
            <th>
                Contacts
            </th>

        </thead>
        <tbody>
            <td>
                <?= $mission->getTitre(); ?>
            </td>
            <td>
                <?= $mission->getDescription(); ?>
            </td>
            <td>
                <?= $mission->getNomcode(); ?>
            </td>
            <td>
                <?= $mission->getPays(); ?>
            </td>
            <td>

                <?php // Pour chaque chaque agent je récupere le code agent ($mission->getAgent renvoi un tableau d'agent)
                for ($m = 0; $m < count($mission->getAgent()); $m++) {
                    echo ($mission->getAgent()[$m]['code_agent'] . " / ");
                } ?>
            </td>
            <td>
                <?php for ($m = 0; $m < count($mission->getContact()); $m++) {
                    echo ($mission->getContact()[$m]['nomcode_contact'] . " / ");
                } ?>
            </td>

        </tbody>
    </table>
    <table class="table">
        <thead>
            <th>
                Planques
            </th>
            <th>
                Cibles
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
        </thead>
        <tbody>
            <td>
                <?php for ($m = 0; $m < count($mission->getPlanque()); $m++) {
                    echo ($mission->getPlanque()[$m]['code_planque'] . " / ");
                } ?>
            </td>
            <td>
                <?php for ($m = 0; $m < count($mission->getCible()); $m++) {
                    echo ($mission->getCible()[$m]['nomcode_cible'] . " / ");
                } ?>
            </td>
            <td>
                <?= $mission->getType(); ?>
            </td>
            <td>
                <?= $mission->getStatut(); ?>
            </td>
            <td>
                <?= $mission->getSpecialite(); ?>
            </td>
            <td>
                <?= date('d M Y', $mission->getDatedebut()); ?>
            </td>
            <td>
                <?= date('d M Y', $mission->getDatefin()); // à modifier car affiche date actuelle 
                ?>
            </td>

        </tbody>
    </table>
</div>

<?php
$corps = ob_get_clean();
$titre = 'Projet KGB';
require('base.php');
?>