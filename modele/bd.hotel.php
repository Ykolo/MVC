<?php
include "bd.inc.php";

function getHotel()
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from hotel;");
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getHotelByNom($NomH){
    $resultat = array();
    try{
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from hotel where NomH like ':NomH %'");
        $req->bindValue(':NomH',$NomH,PDO::PARAM_STR);
        $req->execute();
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function addHotel($NomH, $Adresse, $Description,$NbrChambreDispo)
{
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("insert into hotel (NomH, Adresse, Description,NbrChambreDispo) values(:NomH,:Adresse,:Description,:NbrChambreDispo)");
        $req->bindValue(':NomH', $NomH, PDO::PARAM_STR);
        $req->bindValue(':Adresse', $Adresse, PDO::PARAM_STR);
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

        $req = $cnx->prepare("update hotel set Dec$Description=:Dec$Description where Nom$NomH=:Nom$NomH");
        $req->bindValue(':Nom$NomH', $NomH, PDO::PARAM_STR);
        $req->bindValue(':Dec$Description', $Description, PDO::PARAM_STR);

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
        $req = $cnx->prepare("delete from hotel where Nom$NomH=:Nom$NomH");
        $req->bindValue(':Nom$NomH', $NomH, PDO::PARAM_STR);
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !:" . $e->getMessage();
        die();
    }
    return $resultat;
}
