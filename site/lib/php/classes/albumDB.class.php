<?php

class albumDB extends album {

    private $_db;

    //private $_utilisateurArray = array();

    public function __construct($db) {
        $this->_db = $db;
    }
    
    public function cherche (){
        $i=0;
        $_utilisateurArray= array();
        try{
            $query ="select * from album";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();}
        catch(PDOException $e) {
            print $e->getMessage();
        }
            while($data = $resultset->fetch()){
                $_utilisateurArray[$i]["nom_album"] = utf8_encode($data["nom_album"]);
                $_utilisateurArray[$i]["nom_user"] = utf8_encode($data["nom_user"]);
                $i++;
            }
     return $_utilisateurArray;
    }

}
