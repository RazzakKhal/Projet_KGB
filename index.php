<?php

// definition de la const URL qui permet d'accéder à ttes les ressources depuis la racine
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once('Controlleur/AccueilController.php');
require_once('Controlleur/BackController.php');
require_once('Controlleur/ConnexionController.php');
require_once('Modèle/ManageConnexion.php');
$AccueilControl = new AccueilController();
$BackControl = new BackController();
$ConnexionControl = new ConnexionController();

// demarrage d'une session

session_start();

// Routeur sous forme de switch
try {
    if (empty($_GET['action'])) {
        $AccueilControl->afficherAccueil();
    } else {
        $url = explode("/", filter_var($_GET['action'], FILTER_SANITIZE_URL));
        // si mon premier mot dans mon url est back, detail, connexion ou autre
        switch ($url[0]) {
            case 'back':
                if (empty($_SESSION['username'])) {
                    $AccueilControl->afficherAccueil();
                } else if (empty($url[1])) {
                    $BackControl->afficherBack();
                } else if ($url[1] === "missions") { // Voir missions
                    $BackControl->afficherMissions();
                } else if ($url[1] === "contacts") {  // Voir contacts
                    $BackControl->afficherContacts();
                } else if ($url[1] === "agents") {  // Voir agents
                    $BackControl->afficherAgents();
                } else if ($url[1] === "cibles") {   // Voir cibles
                    $BackControl->afficherCibles();
                } else if ($url[1] === "planques") {  // Voir planques
                    $BackControl->afficherPlanques();
                } else if ($url[1] === "missionsa") { //Formulaire ajout missions
                    $BackControl->ajouterMissions();
                } else if ($url[1] === "contactsa") {  //Formulaire ajout contacts
                    $BackControl->ajouterContacts();
                } else if ($url[1] === "agentsa") {  //Formulaire ajout agents
                    $BackControl->ajouterAgents();
                } else if ($url[1] === "ciblesa") {   //Formulaire ajout cibles
                    $BackControl->ajouterCibles();
                } else if ($url[1] === "planquesa") {  //Formulaire ajout planques
                    $BackControl->ajouterPlanques();
                } else if ($url[1] === "missionsaa") { //Ajout missions bdd
                    $BackControl->ajouterMissionsbdd();
                } else if ($url[1] === "contactsaa") {  //Ajout contacts bdd
                    $BackControl->ajouterContactsbdd();
                } else if ($url[1] === "agentsaa") {  //Ajout agents bdd
                    $BackControl->ajouterAgentsbdd();
                } else if ($url[1] === "ciblesaa") {   //Ajout cibles bdd
                    $BackControl->ajouterCiblesbdd();
                } else if ($url[1] === "planquesaa") {  //Ajout planques bdd
                    $BackControl->ajouterPlanquesbdd();
                } else if ($url[1] === "supmission") { // suppression mission
                    $BackControl->suppressionMissionbdd($url[2]);
                } else if ($url[1] === "supcontact") { // suppression contact
                    $BackControl->suppressionContactbdd($url[2]);
                } else if ($url[1] === "supplanque") {  // suppression planque
                    $BackControl->suppressionPlanquebdd($url[2]);
                } else if ($url[1] === "supcible") {    //suppression cible
                    $BackControl->suppressionCiblebdd($url[2]);
                } else if ($url[1] === "supagent") {     // suppression agent
                    $BackControl->suppressionAgentbdd($url[2]);
                } else if ($url[1] === "modagent") {     // Formulaire modification agent
                    $BackControl->modificationAgent((int)$url[2]);
                } else if ($url[1] === "modmission") {     // Formulaire modification mission
                    $BackControl->modificationMission((int)$url[2]);
                } else if ($url[1] === "modcontact") {     // Formulaire modification contact
                    $BackControl->modificationContact((int)$url[2]);
                } else if ($url[1] === "modplanque") {     // Formulaire modification planque
                    $BackControl->modificationPlanque((int)$url[2]);
                } else if ($url[1] === "modcible") {     // Formulaire modification cible
                    $BackControl->modificationCible((int)$url[2]);
                } else if ($url[1] === "modagentv") {     // Validation formulaire modification agent
                    $BackControl->modificationAgentv((int)$url[2]);
                } else if ($url[1] === "modmissionv") {     // Validation formulaire modification mission
                    $BackControl->modificationMissionv((int)$url[2]);
                } else if ($url[1] === "modcontactv") {     // Validation formulaire modification contact
                    $BackControl->modificationContactv((int)$url[2]);
                } else if ($url[1] === "modplanquev") {     // Validation formulaire modification planque
                    $BackControl->modificationPlanquev((int)$url[2]);
                } else if ($url[1] === "modciblev") {     // Validation formulaire modification cible
                    $BackControl->modificationCiblev((int)$url[2]);
                } else {
                    throw new Exception("la page n'existe pas");
                }
                break;

            case 'detail':
                if (empty($url[1])) {
                    $AccueilControl->afficherAccueil();
                } else {
                    $url = (int)$url[1]; // fonction ci dessous fonctionne uniquement avec un int donc je converti 
                    //car correspond à un id de mission
                    $AccueilControl->afficherMissionDetail($url);
                }
                break;

            case 'connexion':
                if (empty($url[1])) {
                    $ConnexionControl->afficherConnexion(); // formulaire de connexion
                } else if ($url[1] === 'traitement') {
                    $ConnexionControl->traitementFormulaire(); // traitement du formulaire de connexion
                } else if ($url[1] === 'deconnexion') {
                    $ConnexionControl->deconnexion();
                } else {
                }
                break;

            default:
                $AccueilControl->afficherAccueil();
        }
    }
} catch (Exception $e) {
    $msg = $e->getMessage();
    require_once('Vue/erreurs.php');
}
