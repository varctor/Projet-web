<?php

class contact {
    
    public $_id_amis =-1;
    public $_id_user1;
    public $_id_user2;
    public $_en_attente;
    
    function setALL($_id_amis, $_id_user1, $_id_user2, $_en_attente) {
        $this->_id_amis = $_id_amis;
        $this->_id_user1 = $_id_user1;
        $this->_id_user2 = $_id_user2;
        $this->_en_attente = $_en_attente;
    }

    public function get_id_amis() {
        return $this->_id_amis;
    }

    public function get_id_user1() {
        return $this->_id_user1;
    }

    public function get_id_user2() {
        return $this->_id_user2;
    }

    public function get_en_attente() {
        return $this->_en_attente;
    }

    public function set_id_amis($_id_amis) {
        $this->_id_amis = $_id_amis;
    }

    public function set_id_user1($_id_user1) {
        $this->_id_user1 = $_id_user1;
    }

    public function set_id_user2($_id_user2) {
        $this->_id_user2 = $_id_user2;
    }

    public function set_en_attente($_en_attente) {
        $this->_en_attente = $_en_attente;
    }

}