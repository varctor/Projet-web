<?php


class utilisateur {
    
    public $_id_user = -1;
    public $_nom;
    public $_prenom;
    public $_email;
    public $_pseudo;
    public $_password;
    
    function setALL($_nom, $_prenom, $_email, $_pseudo, $_password) {
        $this->_nom = $_nom;
        $this->_prenom = $_prenom;
        $this->_email = $_email;
        $this->_pseudo = $_pseudo;
        $this->_password = $_password;
    }
    
    public function get_id_user() {
        return $this->_id_user;
    }

    public function get_nom() {
        return $this->_nom;
    }

    public function get_prenom() {
        return $this->_prenom;
    }

    public function get_email() {
        return $this->_email;
    }

    public function get_pseudo() {
        return $this->_pseudo;
    }

    public function get_password() {
        return $this->_password;
    }

    public function set_id_user($_id_user) {
        $this->_id_user = $_id_user;
    }

    public function set_nom($_nom) {
        $this->_nom = $_nom;
    }

    public function set_prenom($_prenom) {
        $this->_prenom = $_prenom;
    }

    public function set_email($_email) {
        $this->_email = $_email;
    }

    public function set_pseudo($_pseudo) {
        $this->_pseudo = $_pseudo;
    }

    public function set_password($_password) {
        $this->_password = $_password;
    }



    
}
