<?php

class album {
    
    public $_id_album =-1;
    public $_nom_album;
    public $_nom_user;
    
    function setALL($_id_album, $_nom_album, $_nom_user) {
        $this->_id_album = $_id_album;
        $this->_nom_album = $_nom_album;
        $this->_nom_user = $_nom_user;
    }

    public function get_id_album() {
        return $this->_id_album;
    }

    public function get_nom_album() {
        return $this->_nom_album;
    }

    public function get_nom_user() {
        return $this->_nom_user;
    }

    public function set_id_album($_id_album) {
        $this->_id_album = $_id_album;
    }

    public function set_nom_album($_nom_album) {
        $this->_nom_album = $_nom_album;
    }

    public function set_nom_user($_nom_user) {
        $this->_nom_user = $_nom_user;
    }


}
