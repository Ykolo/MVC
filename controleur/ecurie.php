<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.ecurie.inc.php";

$page = 'ecurie';
$data['pageClass'] = $page . '-page';

$lesEcuries = getEcurie();

$titre = "Ecurie";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueEcurie.php";
include "$racine/vue/pied.html.php";