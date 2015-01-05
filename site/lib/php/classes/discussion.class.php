<?php

class discussion {
    
    public $_id_message = -1;
    public $_message;
    public $_id_user_envoi;
    public $_id_user_reception;
    
    function setALL($_id_message, $_message, $_id_user_envoi, $_id_user_reception) {
        $this->_id_message = $_id_message;
        $this->_message = $_message;
        $this->_id_user_envoi = $_id_user_envoi;
        $this->_id_user_reception = $_id_user_reception;
    }
    
    public function get_id_message() {
        return $this->_id_message;
    }

    public function get_message() {
        return $this->_message;
    }

    public function get_id_user_envoi() {
        return $this->_id_user_envoi;
    }

    public function get_id_user_reception() {
        return $this->_id_user_reception;
    }

    public function set_id_message($_id_message) {
        $this->_id_message = $_id_message;
    }

    public function set_message($_message) {
        $this->_message = $_message;
    }

    public function set_id_user_envoi($_id_user_envoi) {
        $this->_id_user_envoi = $_id_user_envoi;
    }

    public function set_id_user_reception($_id_user_reception) {
        $this->_id_user_reception = $_id_user_reception;
    }



}
