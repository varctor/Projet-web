<?php

class statutDB extends statut {

    private $_db;

    //private $_utilisateurArray = array();

    public function __construct($db) {
        $this->_db = $db;
    }
    
    public function cherche (){
        $i=0;
        $_utilisateurArray= array();
        try{
            $query ="select * from statut";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();}
        catch(PDOException $e) {
            print $e->getMessage();
        }
            while($data = $resultset->fetch()){
                $_utilisateurArray[$i]["statut"] = utf8_encode($data["statut"]);
                $_utilisateurArray[$i]["nom_user"] = utf8_encode($data["nom_user"]);
                $i++;
            }
     return $_utilisateurArray;
    }

}
