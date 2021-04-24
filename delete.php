<?php
//supprimer etudiant



include_once 'autoload.php';

$bdd = connexionBD::getInstance();

if(isset($_GET['delete'])) {
    $requete = $bdd->prepare("DELETE FROM etudiant WHERE CIN=?");
    $requete->execute(array($_GET['delete']));
    $req = $bdd->prepare("insert into  historique values user=? , modification=? , date=?");
    $req->execute(array($_SESSION['user'],"suppression de l'etudiant de CIN: ".$_GET['delete'],date('d-m-y h:i:s')));

}