<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
$titre = "Connexion";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueOublie.php";
include "$racine/vue/pied.html.php";

?>