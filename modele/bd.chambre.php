<?php
include "bd.inc.php";

function getChambre()
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from chambre;");
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getChambreByType($TypeC){
    $resultat = array();
    try{
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from chambre where TypeC like ':TypeC %'");
        $req->bindValue(':TypeC',$TypeC,PDO::PARAM_STR);
        $req->execute();
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function addChambre($TypeC, $Numero, $Prix_nuit,$IDH)
{
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("insert into chambre (TypeC, Numero, Prix_nuit,IDH) values(:TypeC,:Numero,:Prix_nuit,:IDH)");
        $req->bindValue(':TypeC', $TypeC, PDO::PARAM_STR);
        $req->bindValue(':Numero', $Numero, PDO::PARAM_STR);
        $req->bindValue(':Prix_nuit', $Prix_nuit, PDO::PARAM_STR);
        $req->bindValue(':IDH', $IDH, PDO::PARAM_STR);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
function updtPrix($IDC, $Prix_nuit)
{
    $resultat = -1;
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("update chambre set Dec$Prix_nuit=:Dec$Prix_nuit where Nom$IDC=:Nom$IDC");
        $req->bindValue(':Nom$IDC', $IDC, PDO::PARAM_STR);
        $req->bindValue(':Dec$Prix_nuit', $Prix_nuit, PDO::PARAM_STR);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
function removeHotel($IDC)
{
    $resultat = -1;
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("delete from chambre where Nom$IDC=:Nom$IDC");
        $req->bindValue(':Nom$IDC', $IDC, PDO::PARAM_STR);
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !:" . $e->getMessage();
        die();
    }
    return $resultat;
}
