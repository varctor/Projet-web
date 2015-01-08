<?php
header('Content-Type: application/json');
//indique que le retour doit $etre traité en json
require './liste_include_ajax.php';
require '../classes/connexion.class.php';
require '../classes/utilisateur.class.php';
require '../classes/utilisateurDB.class.php';

$db = Connexion::getInstance($dsn,$user,$pass);

try{
    $mg = new UtilisateurDB($db);
    $retour=$mg->addUtilisateur($_GET);
    print json_encode(array('retour' => $retour)); 
}
catch(PDOException $e){}
?>
