<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/authentification.inc.php";

// création du menu burger
$menuBurger = array();
$menuBurger[] = Array("url" => "./?action=connexion", "label" => "Connexion");
$menuBurger[] = Array("url" => "./?action=inscription", "label" => "Inscription");

// récupération des données GET, POST, et SESSION
if (!isset($_POST["mailU"]) || !isset($_POST["mdpU"])) {
    // on affiche le formulaire de connexion
    $titre = "authentification";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueConnexion.php";
    include "$racine/vue/pied.html.php";
} else {
    $mailU = $_POST["mailU"];
    $mdpU = $_POST["mdpU"];

    login($mailU, $mdpU);

    if (isLoggedOn()) {
        // si l'utilisateur est connecté, on redirige vers le contrôleur monProfil
        include "$racine/controleur/monProfil.php";
    } else {
        // l'utilisateur n'est pas connecté, on affiche le formulaire de connexion
        $titre = "authentification";
        include "$racine/vue/entete.html.php";
        include "$racine/vue/vueConnexion.php";
        include "$racine/vue/pied.html.php";
    }
}
?>