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
    
    
        public function addUtilisateur(array $data) {
        //var_dump($data);
        $query="select add_inscription (:nom,:email,:prenom,:password,:pseudo) as retour" ;
        try {
            $id=null;
            $statement = $this->_db->prepare($query);		
            $statement->bindValue(1, $data['nom'], PDO::PARAM_STR);
            $statement->bindValue(2, $data['email'], PDO::PARAM_STR);
            $statement->bindValue(3, $data['prenom'], PDO::PARAM_STR);
            $statement->bindValue(4, $data['password'], PDO::PARAM_INT);
            $statement->bindValue(5, $data['pseudo'], PDO::PARAM_STR);
            
            //ajouter le paramètre type_animal
           
           
            $statement->execute();
            $retour = $statement->fetchColumn(0);
            return $retour;
        } 
        catch(PDOException $e) {
            print "Echec de l'insertion : ".$e;
            $retour=0;
            return $retour;
        }   
    }
    
}
