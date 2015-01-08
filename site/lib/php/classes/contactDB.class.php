<?php

class contactDB extends contact {

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
            $query ="select * from contact";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();}
        catch(PDOException $e) {
            print $e->getMessage();
        }
            while($data = $resultset->fetch()){
                $_utilisateurArray[$i]["id_user1"] = utf8_encode($data["id_user1"]);
                $_utilisateurArray[$i]["id_user2"] = utf8_encode($data["id_user2"]);
                $i++;
            }
     return $_utilisateurArray;
    }

}
