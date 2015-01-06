<?php

class photoDB extends photo {

    private $_db;

    //private $_utilisateurArray = array();

    public function __construct($db) {
        $this->_db = $db;
    }
        public function cherche ()
    {
        $i=0;
        $_utilisateurArray= array();
        try{
            $query ="select * from photo";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();}
        catch(PDOException $e) {
            print $e->getMessage();
        }
            while($data = $resultset->fetch()){
                $_utilisateurArray[$i]["photo"] = utf8_encode($data["photo"]);
                $_utilisateurArray[$i]["nom"] = utf8_encode($data["nom"]);
                $i++;
            }
     return $_utilisateurArray;
    }

}
