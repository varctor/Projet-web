<?php

class photo {
    
    public $_id_photo = -1;
    public $_photo;
    public $_nom;
    public $_id_album;
    
    function setALL($_id_photo, $_photo, $_id_album) {
        $this->_id_photo = $_id_photo;
        $this->_photo = $_photo;
        $this->_nom = $_nom;
        $this->_id_album = $_id_album;
    }

    
    public function get_id_photo() {
        return $this->_id_photo;
    }

    public function get_photo() {
        return $this->_photo;
    }

    public function get_id_album() {
        return $this->_id_album;
    }

    public function set_id_photo($_id_photo) {
        $this->_id_photo = $_id_photo;
    }

    public function set_photo($_photo) {
        $this->_photo = $_photo;
    }

    public function set_id_album($_id_album) {
        $this->_id_album = $_id_album;
    }

    public function get_nom() {
        return $this->_nom;
    }

    public function set_nom($_nom) {
        $this->_nom = $_nom;
    }


    
}
