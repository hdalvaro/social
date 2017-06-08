<?php

class BairroModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('crud');
    }

    public function insert($valores = array()) {
        return $this->db->insert('bairro', $valores);
    }

    public function all() {
        return $this->db->query("SELECT * FROM bairro ORDER BY descricao")->result();
    }
}
