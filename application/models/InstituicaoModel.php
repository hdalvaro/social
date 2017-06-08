<?php

class InstituicaoModel extends CI_Model {
    
    public $idinstituicao;
    public $descricao;
    public $sigla;

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert() {
        return $this->db->insert('instituicao', $this);
    }

    public function update() {
        $this->db->where('idinstituicao', $this->idinstituicao);
        $this->db->update('instituicao', $this);
    }

    public function all() {
        return $this->db->query("SELECT * FROM instituicao ORDER BY descricao")->result();
    }
}
