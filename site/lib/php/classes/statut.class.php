<?php

class statut {
    
    public $_id_statut = -1;
    public $_statut;
    public $_nom_user;
    
    function setALL($_id_statut, $_statut, $_nom_user) {
        $this->_id_statut = $_id_statut;
        $this->_statut = $_statut;
        $this->_nom_user = $_nom_user;
    }

    public function get_id_statut() {
        return $this->_id_statut;
    }

    public function get_statut() {
        return $this->_statut;
    }

    public function get_nom_user() {
        return $this->_nom_user;
    }

    public function set_id_statut($_id_statut) {
        $this->_id_statut = $_id_statut;
    }

    public function set_statut($_statut) {
        $this->_statut = $_statut;
    }

    public function set_nom_user($_nom_user) {
        $this->_nom_user = $_nom_user;
    }


    
}
