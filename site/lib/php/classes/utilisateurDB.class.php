<?php

class utilisateurDB extends utilisateur{
    
    private $_db;
    //private $_utilisateurArray = array();
        
    public function __construct($db) {
        $this->_db = $db;
    }
    
    
    public function connection (){
        
        try{
            $query ="select * from utilisateur where pseudo='".$this->_pseudo."' and password = '".$this->_password."'";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            while($data = $resultset->fetch()){
                $this->_pseudo=$data["pseudo"];
                $this->_nom=$data["nom"];
                $this->_prenom=$data["prenom"];
                $this->_email=$data["email"];
                $this->_password=$data["password"];
                $this->_id_user=$data["id_user"];
            }
        } catch (Exception $ex) {
            echo "Echec de la requête: ".$e->getMessage();

        }
    }
    
        public function cherche (){
        
        try{
            $query ="select * from utilisateur where pseudo='".$this->_pseudo."'";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            while($data = $resultset->fetch()){
                $this->_pseudo=$data["pseudo"];
                $this->_nom=$data["nom"];
                $this->_prenom=$data["prenom"];
                $this->_email=$data["email"];
                $this->_password=$data["password"];
                $this->_id_user=$data["id_user"];
            }
        } catch (Exception $ex) {
            echo "Echec de la requête: ".$e->getMessage();

        }
    }
    
    public function getnewcontact (){
        $i=0;
        $_utilisateurArray= array();
        try{
           $query ="select id_user,pseudo from utilisateur";
           $resultset = $this->_db->prepare($query);
           $resultset->execute();
        }
        catch(PDOException $e) {
            print $e->getMessage();
        }
        while($data = $resultset->fetch()) {
           $_utilisateurArray[$i]["id_user"] = utf8_encode($data["id_user"]);
           $_utilisateurArray[$i]["pseudo"] = utf8_encode($data["pseudo"]);
           $i++;
        }
        return $_utilisateurArray;
    }
    
        public function getamis (){
        $i=0;
        $_utilisateurArray= array();
        try{
           $query ="select pseudo from utilisateur where id_user=blablabla";
           $resultset = $this->_db->prepare($query);
           $resultset->execute();
        }
        catch(PDOException $e) {
            print $e->getMessage();
        }
        while($data = $resultset->fetch()) {
           $_utilisateurArray[$i]["pseudo"] = utf8_encode($data["pseudo"]);
           $i++;
        }
        return $_utilisateurArray;
    }
    
}
