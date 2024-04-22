<?php

include_once "bd.inc.php";

function getUtilisateurs()
{
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from utilisateur");
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getUtilisateurByMailU($Email)
{
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from utilisateur where Email=:Email");
        $req->bindValue(':Email', $Email, PDO::PARAM_STR);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function addUtilisateur($Email, $MDP, $NomU)
{
    try {
        $cnx = connexionPDO();

        $mdpUCrypt = crypt($MDP, "sel");
        $req = $cnx->prepare("insert into utilisateur (Email, MDP, NomU) values(:Email,:MDP,:NomU)");
        $req->bindValue(':Email', $Email, PDO::PARAM_STR);
        $req->bindValue(':MDP', $mdpUCrypt, PDO::PARAM_STR);
        $req->bindValue(':NomU', $NomU, PDO::PARAM_STR);

        $resultat = $req->execute();
        return $resultat;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function updtMdpUtilisateur($Email, $MDP)
{
    $resultat = -1;
    try {
        $cnx = connexionPDO();

        $mdpUCrypt = crypt($MDP, "sel");
        $req = $cnx->prepare("update utilisateur set MDP=:MDP where Email=:Email");
        $req->bindValue(':Email', $Email, PDO::PARAM_STR);
        $req->bindValue(':MDP', $mdpUCrypt, PDO::PARAM_STR);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function updtPseudoUtilisateur($Email, $NomU)
{
    $resultat = -1;
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("update utilisateur set NomU=:NomU where Email=:Email");
        $req->bindValue(':Email', $Email, PDO::PARAM_STR);
        $req->bindValue(':NomU', $NomU, PDO::PARAM_STR);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
function removeUtilisateur($Email)
{
    $resultat = -1;
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("delete from utilisateur where Email=:Email");
        $req->bindValue(':Email', $Email, PDO::PARAM_STR);
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !:" . $e->getMessage();
        die();
    }
    return $resultat;
}
