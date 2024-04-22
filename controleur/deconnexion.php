<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

logout();

$titre = "connexion";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueConnexion.php";
include "$racine/vue/pied.html.php";


?>