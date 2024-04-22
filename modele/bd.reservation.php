<?php
include "bd.inc.php";

function getReservation()
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from reservation;");
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getReservationByClient($IDU){
    $resultat = array();
    try{
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from reservation where IDU =:IDU");
        $req->bindValue(':IDU',$IDU,PDO::PARAM_STR);
        $req->execute();
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
function getReservationByHotel($IDC){
    $resultat = array();
    try{
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from reservation where IDC =:IDC");
        $req->bindValue(':IDC',$IDC,PDO::PARAM_STR);
        $req->execute();
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function addReservation($IDC, $IDU, $Description,$NbrChambreDispo)
{
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("insert into reservation (IDC, IDU, Description,NbrChambreDispo) values(:IDC,:IDU,:Description,:NbrChambreDispo)");
        $req->bindValue(':IDC', $IDC, PDO::PARAM_STR);
        $req->bindValue(':IDU', $IDU, PDO::PARAM_STR);
        $req->bindValue(':Description', $Description, PDO::PARAM_STR);
        $req->bindValue(':NbrChambreDispo', $NbrChambreDispo, PDO::PARAM_STR);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
function updtDescription($NomH, $Description)
{
    $resultat = -1;
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("update reservation set Dec$Description=:Dec$Description where Nom$NomH=:Nom$NomH");
        $req->bindValue(':$NomH', $NomH, PDO::PARAM_STR);
        $req->bindValue(':Description', $Description, PDO::PARAM_STR);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
function removeHotel($NomH)
{
    $resultat = -1;
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("delete from reservation where Nom$NomH=:Nom$NomH");
        $req->bindValue(':$NomH', $NomH, PDO::PARAM_STR);
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !:" . $e->getMessage();
        die();
    }
    return $resultat;
}
