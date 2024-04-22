
<?php
include_once "bd.utilisateur.inc.php";
ini_set('display_errors', 0);

function login($mailU, $mdpU)
{
    if (!isset($_SESSION)) {
        session_start();
    }

    $util = getUtilisateurByMailU($mailU);
    $mdpBD = $util["MDP"];

    if (trim($mdpBD) == trim(crypt($mdpU, $mdpBD))) {
        // le mot de passe est celui de l'utilisateur dans la base de données
        $_SESSION["Email"] = $mailU;
        $_SESSION["MDP"] = $mdpBD;
    }
}

function logout()
{
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["Email"]);
    unset($_SESSION["MDP"]);
}

function getMailULoggedOn()
{
    if (isLoggedOn()) {
        $ret = $_SESSION["Email"];
    } else {
        $ret = "";
    }
    return $ret;
}

function isLoggedOn()
{
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;

    if (isset($_SESSION["Email"]) && isset($_SESSION["MDP"])) {
        $util = getUtilisateurByMailU($_SESSION["Email"]);
        if ($util["Email"] == $_SESSION["Email"] && $util["MDP"] == $_SESSION["MDP"]) {
            $ret = true;
        }
    }
    return $ret;
}

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // programme principal de test
    header('Content-Type:text/plain');

    // test de connexion
    login("john@example.com", "mot_de_passe_123");
    if (isLoggedOn()) {
        echo "logged";
    } else {
        echo "not logged";
    }

    // déconnexion
    logout();
}
?>
