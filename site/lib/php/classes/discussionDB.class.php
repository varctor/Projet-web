<?php

class discussionDB extends discussion {

    private $_db;

    //private $_utilisateurArray = array();

    public function __construct($db) {
        $this->_db = $db;
    }
        public function affichage ()
    {
        $i=0;
        $_utilisateurArray= array();
        try{
            $query ="select * from discussion";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();}
        catch(PDOException $e) {
            print $e->getMessage();
        }
            while($data = $resultset->fetch()){
                $_utilisateurArray[$i]["message"] = utf8_encode($data["message"]);
                $_utilisateurArray[$i]["id_user_envoi"] = utf8_encode($data["id_user_envoi"]);
                $_utilisateurArray[$i]["id_user_reception"] = utf8_encode($data["id_user_reception"]);
                $i++;
            }
     return $_utilisateurArray;
    }

}
