<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.pilote.inc.php";

$page = 'pilote';
$data['pageClass'] = $page . '-page';

$lesPilotes = getPilotes();

$titre = "Pilotes";
include "$racine/vue/entete.html.php";
include "$racine/vue/vuePilote.php";
include "$racine/vue/pied.html.php";