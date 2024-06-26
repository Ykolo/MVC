<?php
function controleurPrincipal($action)
{
    $lesActions = array();
    $lesActions["defaut"] = "accueil.php";
    $lesActions["accueil"] = "accueil.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["inscription"] = "inscription.php";
    $lesActions["oublie"] = "oublie.php";
    $lesActions["hotel"] = "hotel.php";
    $lesActions["supprimerC"] = "supprimerCompte.php";
    $lesActions["profil"] = "monProfil.php";
    $lesActions["deconnexion"] = "deconnexion.php";
    $lesActions["update"] = "updProfil.php";
    $lesActions["pilote"] = "pilote.php";
    $lesActions["ecurie"] = "ecurie.php";

     
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }
}
