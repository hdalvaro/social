<?php

class LogradouroModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('crud');
    }

    public function insert($valores = array()) {
        $this->db->insert('logradouro', $valores);
    }

    public function all() {
        return $this->db->query("SELECT * FROM logradouro ORDER by descricao")->result();
    }
}
