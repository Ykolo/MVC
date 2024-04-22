<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/authentification.inc.php";
include_once "$racine/modele/bd.utilisateur.inc.php";
$page = 'login';
$data['pageClass'] = $page . '-page';
// creation du menu burger
$menuBurger = array();
$menuBurger[] = array("url" => "./?action=profil", "label" => "Consulter mon profil");
$menuBurger[] = array("url" => "./?action=updProfil", "label" => "Modifier mon profil");

// init messages 
$messageMdp = "";

// recuperation des donnees GET, POST, et SESSION
if (isLoggedOn()) {
    $mailU = getMailULoggedOn();
    $util = getUtilisateurByMailU($mailU);
    // traitement si necessaire des donnees recuperees

    if (isset($_POST["pseudoU"])) {
        $pseudoU = $_POST["pseudoU"];
        if ($pseudoU != "") {
            updtPseudoUtilisateur($mailU, $pseudoU);
        }
    }

    if (isset($_POST["mdpU"]) && isset($_POST["mdpU2"])) {
        if ($_POST["mdpU"] != "") {
            if (($_POST["mdpU"] == $_POST["mdpU2"])) {
                updtMdpUtilisateur($mailU, $_POST["mdpU"]);
            } else {
                $messageMdp = "erreur de saisie du mot de passe";
            }
        }
    }

    $titre = "Mon profil";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueUpdProfil.php";
    include "$racine/vue/pied.html.php";
} else {
    $titre = "Mon profil";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueMonProfil.php";
    include "$racine/vue/pied.html.php";
}
